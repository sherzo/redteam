const history = new Vue({
  el: '#history',
  data: {
    assistances: [],
    index: null,
    modal: {
      avatar: '',
      name: '',
      id: '',
      complete: false,
    },
    photo: '',
    stars: [1,2,3,4,5]
  },
  filters: {
    showTime(time) {
      return moment(time).format('H:m a')
    }
  },
  methods: {
    individual (id) {
      window.location = axios.defaults.baseURL + '/admin/assistances/'+ id +'/individual'
    },
    getAssitances(){
      axios.get('admin/assistances/all')
        .then(res => {
          this.assistances = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    modalADP (i, user, id) {
      this.index = i
      console.log(user)
      this.modal.id = id
      this.modal.name = user.name
      this.modal.avatar = user.avatar
    },
    addADP () {
      axios.post('admin/assistances/adp', { id: this.modal.id })  
        .then(res => {
          this.modal.complete = true
          this.assistances[this.index].adp = true
          setTimeout(() => {
            document.getElementById('didmis').click()
          },3000)
        })
        .catch(err => {
          console.log(err)
        })

    },
    showPhoto (p) {
      this.photo = p.photo 
    }
  },
  mounted () {
    this.getAssitances()
  }
})