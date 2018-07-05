const reminder = new Vue({
  el: '#reminders',
  data: {
    reminders: [],
    title: '',
    activated: 0
  }, 
  methods: {
    getReminders () {
      axios.get('admin/reminders')
        .then(res => {
          this.reminders = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    store () {
      axios.post('admin/reminders/store')
        .then(res => {
          this.reminders.push(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    markAsCompleted (i) {
      let id = this.reminders[i].id
      axios.post('admin/mark-as-completed', { id })
        then(res => {
          this.reminders[i] = res.data.completed
        })
        .catch(err => {
          console.log(err)
        })
    },
    getPhotoStatus () {
      axios.get(`configs/capturePhoto/get`)
        .then(res => {
          this.activated = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    markStatusPhoto () {
      this.activated = !this.activated

      axios.post('configs/set', { type: 'capturePhoto' , value: this.activated })
        .then(res => {

        })
        .catch(err => {
          console.log(err)
        })
    }
  },
  mounted () {
    this.getReminders()
    this.getPhotoStatus()
  }
})