const home = new Vue({
  el: '#home',
  data: {
    messages: [],
    notifications: 0,
    lates: 0,
    emergencies: 0,
    applications: 0,
    success: '',
    checkeds: [],
    checkAll: false
  },
  watch: {
    checkAll (all) {
      if(all) {
        this.messages.forEach(e => {
          this.checkeds.push(e.id);
        })
      }else {
        this.checkeds = []
      }
    }
  },
  computed: {
    isChecked () {
      if(this.checkAll) {
        return true
      }

      return this.checkeds.length > 0
    }
  },
  methods: {  
    deletes () {

    },
    getDashboard () {
      axios.get('admin/dashboard')
        .then(res => {
          this.messages = res.data.messages
          this.notifications = res.data.notifications
          this.lates = res.data.lates,
          this.emergencies = res.data.emergencies
          this.applications = res.data.applications
        })
        .catch(err => {
          console.log(err)
        })
    },
    getYesterday(prop) {
      axios.get(`admin/yesterday/${prop}`)
        .then(res => {
          this[prop] = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    markAsRead () {
      this.success = 'Se marcaron los mensajes como leidas'
      console.log(this.checkeds)
      let data = { 
        ids: this.checkeds 
      }

      axios.post('admin/messages/mark-as-read', data)
        .then(res => {

          this.messages.forEach((m,i) => {
            this.checkeds.forEach(c => {
              if(m.id == c) {
                this.messages.splice(i, 1)
              }
            })
          })
          setTimeout(() => {
            this.success = ''
          }, 3000)
      })
      .catch(err => {
        console.log(err)
      })
    },
  },
  mounted (){
    this.getDashboard()
  }  
});