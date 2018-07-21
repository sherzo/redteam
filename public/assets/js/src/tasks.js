const task = new Vue({
  el: '#tasks',
  data: {
    success: '',
    employees: [],
    tasks: [],
    accordion: false
  },  
  methods: {
    getEmployees () {
      axios.get('tasks/employees')
      .then(res => {
        this.employees = res.data
      })
      .catch(err => {
        console.log(err)
      })
    },
    toggleAccordion (i) {
      this.employees[i].accordion = !this.employees[i].accordion
    },
    store (i) {
      axios.post('tasks', this.employees)
        .then(res => {
          console.log(res)
          this.employees[i].accordion = false
          this.success = 'Se actualizarón las tareas de los empleados';
          setTimeout(() => {
            this.success = ''
          },3000)
        })  
        .catch(err => {
          console.log(err)
        })
    },
    myTasks() {
      axios.get('my-tasks')
        .then(res => {
          this.tasks = res.data
        })
        .catch(err => {

        })
    },
    complete(i) {
      this.tasks[i].status = !this.tasks[i].status

      axios.post('tasks/complete', {id: this.tasks[i].id})  
        .then(res => {
          console.log(res)
        })  
        .catch(err => {
          console.log(err)
        })
    },
    toggleTasks () {
      this.accordion = !this.accordion
    },
    completeAll () {

    }
  },
  mounted () {
    this.getEmployees()
    this.myTasks()
  }
})