const ranking = new Vue({
  el: '#ranking',
    data: {
    selected: {},
    employees: [],
    success: false,
    loading: false
  },
  methods: {
    getEmployees() {
      console.log('hola hola hola')
      axios.get('admin/ranking/all')
        .then(res => {
          this.employees = res.data
        })
        .catch(err => {
          console.log(err)
        })
    }
  },
  mounted () {
    this.getEmployees()
  }
})