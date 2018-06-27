const history = new Vue({
  el: '#history',
  data: {
    assistances: [],
    modal: {
      avatar: '',
      name: '',
      complete: false,
      stars: [1,2,3,4,5]
    }
  },
  filters: {
    showTime(time) {
      return moment(time).format('H:m a')
    }
  },
  methods: {
    getAssitances(){
      axios.get('admin/assistances/all')
        .then(res => {
          this.assistances = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    addADP (user) {
      this.modal.name = user.name
      this.moda.avatar = user.avatar
    }
  },
  mounted () {
    this.getAssitances()
  }
})