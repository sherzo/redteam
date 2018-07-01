const notification = new Vue({
  el: '#notifications',
  data: {
    notifications: [],
    toggle: false,
    clases: 'menu',
    display: 'none',
    unRead: 0
  },
  watch: {
    toggle (toggle) {
      if(!toggle && this.notifications.length > 0) {
        console.log('watch se marcaron')
      }
    }
  },
  methods: {
    getNotifications () {
      axios.get('notifications')
        .then(res => {
          this.notifications = res.data.notifications
          this.unRead = res.data.unRead
        })
        .catch(err => {
          console.log(err)
        })
    },
    markAsRead () {
      this.notifications.forEach(e => {
          if(!e.read) {

            let data = {
              user_id: authId,
              notification_id: e.id
            }
            socket.emit('markNotificationAsRead', data)
            Vue.set(e, 'read', true)
          }
      })
      this.unRead = 0
      //this.notifications = []
    },
    showNotifications () {
      if(this.toggle) {
        this.clases = 'menu transition visible animation drop out'
        
        setTimeout(() => {
          this.clases = 'menu transition hidden'
          this.display = 'none'
          this.toggle = false

        }, 200)
              
      }else {

        this.display = 'block'
        this.clases = 'menu transition animation drop in'
        setTimeout(() => {
          this.clases = 'menu transition visible'
          this.toggle = true
          this.markAsRead()
        }, 200)
      }
    }
  },
  mounted () {
    socket.on('show-notifications', (data) => {
      if(authId != data.propetary_id) {
        if(this.notifications.length > 8) { // Si hay muchas notificaciones
          this.notifications.pop()
        }

        this.notifications.unshift(data.notification[0]);
        if(!this.toggle) {
          this.unRead += 1
        }
      }
    })
    this.getNotifications()
  }
})