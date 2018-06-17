const evaluation = new Vue({
   el: '#evaluations',
   data: {
      description: '',
      emergency: false,
      featured: false,
      comment: '',
      evaluated: {},
      file: [],
      image: '',
      finalized: false,
      error: false,
      success: false,
      user_id: 0,
      employees: [],
      stars: [1,2,3,4,5],
      employee: {},
      questions: [{ question: '¿Cómo califica el orden y limpieza del área de trabajo?', answer: null},
                  { question: '¿Cómo califica el trabajo en equipo de %s?', answer: null},
                  { question: '¿Cumple con los tiempos establecidos en la entrega de proyectos?', answer: null},
                  { question: '¿Cómo considera la proactividad de %s?', answer: null},
                  { question: '¿Cuál es el nivel de actitud de %s ante los problemas, estrés ó dificultades?', answer: null},
                  { question: '¿Cómo califica la puntualidad en los horarios de entrada, almuerzo y salida?', answer: null},
                  { question: '¿Cómo califica el nivel de evolución y desempeño de %s?', answer: null},
                  { question: '¿Considera que tiene los conocimientos necesarios en cuanto a su área compete?', answer: null},
                  { question: '¿Considera que la imagen personal y higiene de %s es la correcta?', answer: null},
                  { question: '¿Cómo califica el lenguaje verbal de %s?', answer: null}],
      options: [{icon: 'images/icons/ico-excelent.png', display: 'EXCELENTE', value: 10}, 
                {icon: 'images/icons/ico-muybueno.png', display: 'MUY BUENO', value: 7}, 
                {icon: 'images/icons/ico-regular.png', display: 'REGULAR', value: 4}, 
                {icon: 'images/icons/ico-malo.png', display: 'MALO', value: 0}],
      selectedIcon: 'images/icons/selectActiveAdmin.png',
      inEvaluation: false
   },
   filters: {
    urlImage (img) {
      return axios.defaults.baseURL + '/assets/' + img
    }
   },
   methods: {
    saveEvaluation () {
      let error = false
      let answers = []
      let score = 0
      this.questions.forEach((e,i) => {
        if(e.answer === null) {
          error = true
          return
        }
        answers.push(e.answer)
        score += e.answer
      })

      this.error = error
      if(this.error) {
        setTimeout(() => {
          this.error = false
        }, 4000)
        return
      }
      
      let data = {
        id: this.employee.id,
        score,
        answers
      }

      console.log(data)
      axios.post('evaluations/store', data)
        .then(res => {
          //this.getEmployees()
          this.employees.forEach((e,i) => {
            if(e.id == this.employee.id) {
              this.employees.splice(i, 1)
            }
          })
          this.evaluated = res.data
          this.inEvaluation = false
          this.employee = {}
          this.questions.forEach(e => {
            e.answer = null
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    selectecAnswer (i, value) {
      this.questions[i].answer = value
    },
    replaceName(question) {
      let name = this.employee.name
      let newQuestion = question.replace('%s', name)
      return newQuestion
    },
    startEvaluation(e) {
      if(e.evaluated) {
        return
      }
      window.scrollTo(0,0)
      this.evaluated = {}
      this.employee = e 
      console.log(this.employee)
      this.inEvaluation = true
      /*
      * Traigo empleados para renovar la lista total
      */
      this.getEmployees()
    },
    getEmployees () {
      axios.get('evaluations/employees')
        .then(res => {
         
          this.employees = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    addPublication () {
      let form = new FormData()
      form.append('description', this.description)
      form.append('image', this.image)
      form.append('file', this.file)
      form.append('featured', this.featured)
      form.append('emergency', this.emergency)
      this.description = ''
      axios.post('publications', form)
        .then(res => {
          this.success = true
          window.location = axios.defaults.baseURL + '/home';
         
        })
        .catch(err => {
          console.log(err)
        })
    },
    getUser(user_id){
      this.user_id = user_id
    },
    getFile () {
      this.file = this.$refs.myFile.files[0]
    },
    getImage () {
      this.image = this.$refs.myImage.files[0]
    },
    selectFeatured () {
      console.log(this.featured)
      this.featured = !this.featured

      if (this.featured) {
        this.emergency = false
      }
    },
    selectEmergency () {
      this.emergency = !this.emergency

      if (this.emergency) {
        this.featured = false
      }
    },
   },
   mounted () {
    this.getEmployees()
   }
});