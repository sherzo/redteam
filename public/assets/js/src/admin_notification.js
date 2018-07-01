const adminNotification = new Vue({
  el: '#myModalNotifications',
  data: {
    notifications: [],
    showColor: '',
    color: '',
    desc: '',
    title: '',
    id_notification: '',
    addNew: false,
    err: '',
    success: ''
  },
  watch: {
    id_notification() {
      this.notifications.forEach(e => {
        if(e.id == this.id_notification) {
          this.showColor = e.color
        }
      })
    }
  },
  methods: {  
    newNotification () {
      if (!this.desc || !this.color || !this.title) {
        
        this.err = 'Profavor llene todos los campos'
        setTimeout(() => {
          this.err = ''
        }, 2000)
        return 
      }

      let data = {
        description: this.desc,
        color: this.color,
        title: this.title
      }
      
      this.color = ''
      this.title = ''
      this.desc = ''
      this.addNew = false
      
      axios.post('admin/admin-notification/store', data)
        .then(res => {
          this.notifications.push(res.data)
          this.success = 'Se ha registrado la notificacion, para utilizarla haga clic en enviar'
          this.id_notification = res.data.id
          setTimeout(() => {
            this.success = ''
          }, 4000)
        })
        .catch(err => {
          console.log(err)
        })
    },
    sendNotification () {
      if(!this.id_notification) {
        return
      }

      axios.post('admin/admin-notification/send', {id: this.id_notification})  
        .then(res => {
          this.id_notification = ''
          this.showColor = ''
          this.success = 'Se ha registrado la notificacion correctamente'
          window.location = axios.defaults.baseURL + '/admin/board'
          this.setTimeout(() => {
            this.success = ''
          }, 2000)          
        })
        .catch(err => {
          console.log(err)
        })    
    },
    getNotifications () {
      axios.get('admin/admin-notification')  
        .then(res => {
          this.notifications = res.data
        })
        .catch(err => {
          console.log(err)
        })
    }
  },
  mounted (){
    this.getNotifications()
    $("#showPaletteOnly").spectrum({
        allowEmpty:true,
        showInitial: true,
        showInput: true,
        showPaletteOnly: true,
        change: (color) => {
            this.color = color.toHexString();
        },
        palette: [
            ["00a89c", "22b473", "d3145a","ea5b3a"],
            ["ffd249", "e0629a", "89d085", "4caad8"],
            ["662d90", "faaf3b", "f05a24", "f46851"],
            ["d8df21", "39b44a", "c59b6d", "2e3191"],
            ["0071bb", "ec1e79", "c0272d"]
        ]
    });
  }
});