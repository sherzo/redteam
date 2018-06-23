const request = new Vue({
   el: '#requests',
   data: {
      modal: { image: '' },
      message: '',
      checkeds: [],
      suggestions: [],    
      applications: [],    
      emergencies: [],    
      description: '',
      emergency: false,
      featured: false,
      comment: '',
      file: [],
      image: '',
      success: false,
   },
   methods: {
    showImage(image) {
      this.modal.image = image
    },
    addDiscussion (i, el) {
      let description = this[el][i].discussion

      if(!description) {
        return
      }      

      let formData = new FormData()

      formData.append('description', description) 
      formData.append('id', this[el][i].id) 
      
      this[el][i].discussion = ''

      axios.post(el + '/discussion', formData)
        .then(res => {
          this[el][i].discussions.push(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    getSuggestions () {
      axios.get('get-suggestions')
        .then(res => {
          this.suggestions = res.data
          this.suggestions.forEach(e => {
            Vue.set(e, 'accordion', false)
            Vue.set(e, 'send', false)
            Vue.set(e, 'discussion', '')
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    toggleAccordion (i, el) {
      this[el][i].accordion = !this[el][i].accordion
    },
    getEmergencies () {
      axios.get('get-emergencies')
        .then(res => {
          this.emergencies = res.data
          this.emergencies.forEach(e => {
            Vue.set(e, 'accordion', false)
            Vue.set(e, 'send', false)
            Vue.set(e, 'discussion', '')
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    getApplications() {
      axios.get('get-applications')
        .then(res => {
          this.applications = res.data
          this.applications.forEach(e => {
            Vue.set(e, 'accordion', false)
            Vue.set(e, 'send', false)
            Vue.set(e, 'discussion', '')
          })
        })
        .catch(err => {
          console.log(err)
        })
    }
   },
   mounted () {
    this.getSuggestions()
    this.getApplications()
    this.getEmergencies()
   }
});