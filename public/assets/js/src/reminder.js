const reminder = new Vue({
  el: '#reminders',
  data: {
    reminders: [],
    title: ''
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
    }
  },
  mounted () {
    this.getReminders()
  }
})