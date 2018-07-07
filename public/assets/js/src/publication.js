const publication = new Vue({
   el: '#publications',
   data: {
      //Calendar
      month: '',
      title: '',
      calendar: [],
      date: moment(),
      events: [],

      // Publications
      count: 0,
      publicationsTwo: [],
      publications: [],
      description: '',
      emergency: false,
      featured: false,
      comment: '',
      file: '',
      image: '',
      success: '',
      user_id: 0,
      offset: 0,
      oldOffset: 0,
      offsetOld: 0,

      // Online
      online: []
  },
  directives: { infiniteScroll },
   filters: {
    humanize(d) {
      moment.locale('es')
      return moment(d).fromNow()
    },
    profileUrl(username) {
      return axios.defaults.baseURL + '/profile/' + username
    },
    showDay(date) {
      return moment(date).format('DD')
    },
    showImage (image) {
      return axios.defaults.baseURL + '/storage/' + image
    } 
   },
   methods: {
    getCalendar() {
      let date = this.date.format('YYYY-MM-DD')

      axios.get(`calendar/${date}/render`)
        .then(res => {
          this.month = res.data.month
          this.calendar = res.data.calendar
        })
        .catch(err => {
          console.log(err)
        })
    },
    prevMonth () {
      this.date = this.date.subtract(1, 'months')
      this.getCalendar()
      this.getEventsMonth()
    },
    nextMonth () {
      this.date = this.date.add(1, 'months')
      this.getCalendar()
      this.getEventsMonth()
    },
    showEvents (i) {
      this.calendar[i].show = !this.calendar[i].show;
    },
    getEventsMonth() {
      let date = this.date.format('YYYY-MM-DD')

      axios.get(`calendar/${date}/events`)
        .then(res => {
          this.events = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    addEvent () {
      let day = document.getElementById('day').value

      this.calendar.forEach(e => {
        if(e.day == day) {
          e.events.push(event)
        }
      })

      this.title = ''
      document.getElementById('day').value = ''

      axios.post('calendar/store', event) 
        .then(res => {

          this.getEventsMonth()
        })
        .catch(err => {
          console.log(err)
        })
    },
    getPublications () {
      axios.get(`publications?offset=${this.offset}`)
        .then(res => {
          //if(res.data.length > 0 && this.offset > 0) {
          if(this.offset > this.oldOffset || this.offset == 0) {

            res.data.forEach(e => {
              e.comment = ''
              if(this.count % 2 == 0) {
                this.publications.push(e)
              }else {
                this.publicationsTwo.push(e)
              }
              this.count++;
            })
            console.log('pasa')
            console.log(this.offset, this.oldOffset)
          }
          //}
          this.oldOffset = this.offset
          this.offset += 4
        })
        .catch(err => {
          console.log(err)
        })
    },
    addPublication () {
      let typeNotification = 0 
      if(this.image) {
        typeNotification = 2 // Imagen
      }else if(this.file){
        typeNotification = 3 // Documento
      }

      let form = new FormData()
      form.append('description', this.description)
      form.append('image', this.image)
      form.append('file', this.file)
      form.append('featured', this.featured)
      form.append('emergency', this.emergency)
      this.description = ''

      document.getElementById('close-modal').click()

      axios.post('publications', form)
        .then(res => {
          this.success = 'Se registro su publicación correctamente'
          this.publications.unshift(res.data)

          console.log(res.data)
  
          this.sendSocket(typeNotification, res.data.user)

          setTimeout(() => {
            this.success = ''
          },3000)
        })
        .catch(err => {
          console.log(err)
        })
    },
    sendSocket(typeNotification, user) {

      let data = `<strong class='nameUserNotifique'> ${user.name} </strong> Ha realizado una nueva <span class='typeAccionNotifi'>publicación</span>`

      let user_id = null
      if(typeNotification == 2) {
        data = `<strong class='nameUserNotifique'> ${user.name} </strong> Ha realizado publicado una nueva <span class='typeAccionNotifi'>foto</span>`
      } else if (typeNotification == 3) {
        data = `<strong class='nameUserNotifique'> ${user.name} </strong> Ha publicado una nuevo <span class='typeAccionNotifi'>documento</span>`
      } else if(typeNotification == 5) {
        user_id = authId
        data = `A ${user.name} </span> <span class='typeAccionNotifi'>les gusta tu publicación</span>`
      } else if (typeNotification == 6) {
        user_id = authId
        data = `<span class='typeAccionNotifi'> ${user.name} </span> comento tu publicacion`
      }

      let notification = {
        user_id: user_id,
        type: typeNotification,
        data: data,
        propetary_id: authId
      }
      console.log(notification)
  
      socket.emit('sendNotification', notification)
    },
    addComment (publication_id, i, type) {
      let comment = {
        description: this[type][i].comment,
        publication_id
      }
      
      this[type][i].comment = ''
      axios.post('publications/comment', comment)
        .then(res => {
          this[type][i].comments.push(res.data)
          
          this.sendSocket(6, this[type][i].user)

        })
          .catch(err => {
            console.log(err)
        })
    },
    like (publication) {
      publication_id = publication.id

      publication.likes.push({
        publication_id: publication_id,
        user_id: this.user_id
      });

      axios.post('publications/like', { publication_id })
        .then(res => {
          this.sendSocket(5, res.data) // Aqui ya va el user
        })
        .catch(err => {
            console.log(err)
        })
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
    }
   },
   mounted() {
    moment.locale('es')
    //this.getPublications()
    this.getEventsMonth()
    this.getCalendar()
    setTimeout(() => {
      $('#sandbox-container .input-daterange').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
      });
    }, 100) 
    socket.on('users-online', (users) => {
      this.online = users
    })
   } 
});