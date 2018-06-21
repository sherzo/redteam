const chat = new Vue({
   el: '#chats',
   data: {
      online: [],
      description: '',
      showImage: '',
      chats: [],
      messages: [],
      users: [],
      chat: {},
      emergency: false,
      featured: false,
      comment: '',
      file: [],
      fileC: '',
      image: '',
      success: false,
      user_id: 0,
      content: '',
      uploadFile: 0
   },
   watch: {
    chat(chat) {
      this.getMessages(chat.id)
    }
   },
   methods: {
    cancelUpload () {
      this.fileC = ''
      this.showImage = ''
      this.uploadFile = 0
    },
    sendMessage () {
      let type = this.uploadFile // Lleva el tipo imagen, texto, archivo

      let receiver_id
      if(this.chat.transmitter_id == this.user_id) {
        receiver_id = this.chat.receiver_id
      }else {
        receiver_id = this.chat.transmitter_id
      }


      if(this.uploadFile != 0) {
        let form = new FormData()

        form.append('chat_id', this.chat.id)
        form.append('file', this.fileC)
        form.append('user_id', this.user_id)
        form.append('type', type)

        this.fileC = ''
        this.showImage = ''
        this.uploadFile = 0

        axios.post('chats/send-file', form)
          .then(res => {

            this.messages.push(res.data)
            this.scrollToBotton()

            /*Mesaje para la socket */
            let message = {
              id: res.data.id,
              chat_id: this.chat.id,
              content: res.data.content,
              user_id: this.user_id,
              receiver_id: receiver_id,
              type: type
            }

            socket.emit('sendMessage', message)

          })
          .catch(err => {
            console.log(err)
          })

      }else {

        if(!this.content) { // Si no hay mensaje
          return
        }


        let message = {
          chat_id: this.chat.id,
          content: this.content,
          user_id: this.user_id,
          receiver_id: receiver_id, // Asignado al principio
          type: type // 0 en este caso
        }

        this.content = ''
        this.messages.push(message)
        this.scrollToBotton()
        socket.emit('sendMessage', message)
      }


    },
    getOrCreate(id) {
      axios.get(`chats/${id}/get-or-create`)
        .then(res => {
          if(this.chat.id == res.data.id) { // Si el chat ya esta seleccionado
            console.log('ya esta seleccionado')
            return
          }

          let encontrado = false
          this.chats.forEach((e, i) => { // Verifico si el chat ya esta en lista
            if(res.data.id == e.id) {
              this.chat = e
              encontrado = true
            }
          })
          
          if(encontrado) { // Si estaba en la lista
            console.log('Ya esta en la lista')
            return
          }

          this.chat = res.data
          this.chats.unshift(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    getUsers () {
      axios.get('chats/users')
        .then(res => {
          this.users = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    getChats () {
      axios.get('chats/all')
        .then(res => {
          this.chats = res.data
          this.chats.forEach(e => {
            Vue.set(e, 'notRead', 0)
          })
          if(this.chats.length > 0) {
            this.chat = res.data[0]
          }
        })
        .catch(err => {
          console.log(err)
        })
    },
    selectChat(i) {
      this.chats[i].notRead = 0
      let chat = this.chats[i]

      if(this.chat.id == chat.id) {
        return
      }

      this.chat = this.chats[i];

      this.getMessages(this.chat.id)
    },
    getMessages(id) {
      axios.get(`chats/${id}/get-messages`)
        .then(res => {
          this.messages = res.data
          this.scrollToBotton()
        })
        .catch(err => {
          console.log(err)
        }) 
    },
    addPublication () {
      let form = new FormData()
      form.append('description', this.description)
      form.append('image', this.image)
      form.append('file', this.file)
      form.append('featured', this.featured)
      form.append('emergency', this.emergency)
      this.description = ''
      axios.post('publications', form)
        .then(res => {
          this.success = true
          window.location = axios.defaults.baseURL + '/home';
        })
        .catch(err => {
          console.log(err)
        })
    },
    getChatImage() {
      this.fileC = this.$refs.chatImage.files[0]
      this.showImage = URL.createObjectURL(this.fileC)
      this.uploadFile = 1
    },
    getChatFile() {
      this.fileC = this.$refs.chatFile.files[0]
      this.showImage = axios.defaults.baseURL + '/assets/images/icons/dcumento.png'      
      this.uploadFile = 2
    },
    deleteChat (i) {
      let id = this.chats[i].id

      if(this.chat && this.chat.id == id) {
        this.chat = {}
      }
      
      this.chats.splice(i, 1)

      axios.post('chats/delete', { id }) 
        .then(res => {
          console.log(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    scrollToBotton () {
      setTimeout(()=>{        
        let bandeja = this.$el.querySelector("#bandeja");
        bandeja.scrollTop = bandeja.scrollHeight;
      }, 1000)
    },
    getUser(user_id){
      this.user_id = user_id
    },
    getFile () {
      this.file = this.$refs.myFile.files[0]
    },
    getImage () {
      this.image = this.$refs.myImage.files[0]
    },
    selectFeatured () {
      console.log(this.featured)
      this.featured = !this.featured

      if (this.featured) {
        this.emergency = false
      }
    },
    selectEmergency () {
      this.emergency = !this.emergency

      if (this.emergency) {
        this.featured = false
      }
    },
   },
   mounted () {
    socket.on('users-online', (users) => {
      console.log(users)
    })

    socket.on('new-message', (message) => {
      console.log(message)
      let chat_id = message[0].chat_id 
      let content;

      if(message[0].type != 0) {
        content = axios.defaults.baseURL + '/storage/' + message[0].content
      }else {
        content = message[0].content
      }

      if(this.chat.id == chat_id) { // Si el mensaje va al chat abierto 
         let newMessage = {
          content: content,
          user_id: message[0].user_id,
          id: message[0].id,
          type: message[0].type
        }

        this.messages.push(newMessage)

        this.scrollToBotton()
      }else { // Va a otro chat

        let exists = null
        this.chats.forEach((e,i) => { // Lo busco entre los chats
          if(e.id == chat_id) {
            exists = i
          }
        })

        if(exists) { // Si existe
          console.log('asdasd')
          this.chats[exists].notRead++
        }else { // Sino lo creo

          console.log('Nuevo chat')
          let avatar = axios.defaults.baseURL + '/storage/' + message[0].avatar
          let newChat = {
            id: message[0].chat_id,
            transmitter_id: message[0].user_id,
            receiver_id: this.user_id,
            transmitter: {
              name: message[0].name,
              avatar: avatar
            },
            notRead: 1
          }

          this.scrollToBotton()
          this.chats.push(newChat)
        }
      }

    })

    this.getChats()
    this.getUsers()
   }
});