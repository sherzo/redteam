const ranking = new Vue({
  el: '#ranking',
    data: {
    employees: [],
    first: {},
    selected: {},
    count: 0,
    select_adp: 0,
    adp_exito: false,
    puntos_exito: false,
    stars: [1,2,3,4,5]
  },
  filters: {
    showScore (score) {
      return parseInt(score) / 20
    },
    urlProfile (username) {
      return axios.defaults.baseURL + '/profile/' + username
    }
  },
  methods: {
    ranking () { // METODO QUE SE USA EN EL RANKING PUBLICO
      axios.get('ranking/employees')
        .then(res => {
          this.employees = res.data.employees
          this.first = res.data.first
          console.log(this.employees)
        })
        .catch(err => {
          console.log(err)
        })
    },
    getEmployees() {
      axios.get('admin/ranking/all')
        .then(res => {
          this.employees = res.data.employees
          this.employees.forEach(e => {
            e.index = this.employees.findIndex(x => x.id==e.id);
          })
          this.count = res.data.count
        })
        .catch(err => {
          console.log(err)
        })
    },
    enviar(id, select_user, index) {
      this.adp_exito = false
      this.puntos_exito = false
      if (select_user == "" || select_user == null || select_user == 0) {
        alert("Debe seleccionar un item de la lista")
        return
      }
      let data = {
        user_id: id,
        select: select_user
      }
      axios.post('admin/ranking/add', data)
        .then(res => {

          res.data.index = index
          res.data.select = ""
          if (select_user > 0) {
            this.puntos_exito = true
          } else {
            this.adp_exito = true
          }
          Vue.set(this.employees, index, res.data)
          setTimeout(()=>{
            this.adp_exito = false
            this.puntos_exito = false
            location.reload();
          }, 2000)
        })
    }
  },
  mounted () {
    this.getEmployees()
    this.ranking()
  }
})