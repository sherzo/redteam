const myPublication = new Vue({
  el: '#myPublications',
  data: {
    publications: [],
  },
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
    } 
  },
  methods: {
    profileID (id) {
      this.getMyPublications(id)
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
    getMyPublications (id) {
      axios.get(`profile/${id}/my-publications`)
        .then(res => {
          this.publications = res.data
          this.publications.forEach(e => {
            e.comment = ''
          })
        })
        .catch(err => {
          console.log(err)
        })
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
  },
  mounted () {
  }
});