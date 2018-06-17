const chat = new Vue({
   el: '#chats',
   data: {
      description: '',
      chats: [],
      messages: [],
      chat: {},
      emergency: false,
      featured: false,
      comment: '',
      file: [],
      image: '',
      success: false,
      user_id: 0
   },
   methods: {
    getChats () {
      axios.get('chats/all')
        .then(res => {
          this.chats = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    selectChat(i) {
      this.chat = this.chats[i];

      this.getMessages(this.chat.id)
    },
    getMessages(id) {
      axios.get(`chats/${id}/get-messages`)
        .then(res => {
          this.messages = res.data
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
    deleteChat (i) {
      console.log('Delete chat ' + i)
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
    this.getChats()
   }
});