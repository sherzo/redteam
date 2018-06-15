const evaluation = new Vue({
   el: '#evaluations',
   data: {
      description: '',
      emergency: false,
      featured: false,
      comment: '',
      file: [],
      image: '',
      success: false,
      user_id: 0,
      employees: [],
      stars: [1,2,3,4,5],
      employee: {},
      questions: [{ question: '¿Cómo califica el orden y limpieza del área de trabajo?'},
                  { question: '¿Cómo califica el trabajo en equipo de %s?'},
                  { question: '¿Cumple con los tiempos establecidos en la entrega de proyectos?'},
                  { question: '¿Cómo considera la proactividad de %s?'},
                  { question: '¿Cuál es el nivel de actitud de %s ante los problemas, estrés ó dificultades?'},
                  { question: '¿Cómo califica la puntualidad en los horarios de entrada, almuerzo y salida?'},
                  { question: '¿Cómo califica el nivel de evolución y desempeño de %s?'},
                  { question: '¿Considera que tiene los conocimientos necesarios en cuanto a su área compete?'},
                  { question: '¿Considera que la imagen personal y higiene de %s es la correcta?'},
                  { question: '¿Cómo califica el lenguaje verbal de %s?'}],
      answers: [0,0,0,0,0,0,0,0,0,0],
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
    },
    replaceName (question) {
      if(this.employee) {

      let name = this.employee.name
      question.replace('%s', name)
      }
      return question
    }
   },
   methods: {
    startEvaluation(e) {
      this.employee = e 
      this.inEvaluation = true
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
          window.location = axios.defaults.baseURL + '/admin/home';
         
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