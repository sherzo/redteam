const emergency = new Vue({
   el: '#emergencies',
   data: {
      emergencies: [],    
      description: '',
      emergency: false,
      featured: false,
      comment: '',
      file: [],
      image: '',
      success: false,
      user_id: 0
   },
   methods: {
    addSugerency () {
      this.success = true

      let sugerency = {
        description: this.sugerency
      }

      this.sugerency = ''
      axios.post('emergencies', sugerency)
        .then(res => {

          this.sugerencies.push(res.data)

          setTimeout(() => {
            this.success = false
          }, 1500)
        })
    },
    getEmergencies() {
      axios.get('admin/all/emergencies')
        .then(res => {
          this.emergencies = res.data
          this.emergencies.forEach(e => {
            Vue.set(e, 'accordion', false)
            Vue.set(e, 'discussion', '')
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    markAsRead () {

    },
    addDiscussion (i) {
      let description = this.emergencies[i].discussion

      if(!description) {
        return
      }

      let data = {
        description: description,
        emergency_id: this.emergencies[i].id 
      }
      this.emergencies[i].discussion = ''

      axios.post('emergencies/discussion', data)
        .then(res => {
          console.log(res.data)
          this.emergencies[i].discussions.push(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    toggleAccordion (i) {
      this.emergencies[i].accordion = !this.emergencies[i].accordion
    },
    deleteSelected () {

    },
    addPublication () {
      let form = new FormData()
      form.append('description', this.description)
      form.append('image', this.image)
      form.append('file', this.file)
      form.append('featured', this.featured)
      form.append('emergency', this.emergency)
      this.description = ''
      /*
      $('#myModal').modal('hide')
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
      */
      axios.post('publications', form)
        .then(res => {
          this.success = true
          window.location = axios.defaults.baseURL + '/admin/home';
         
        })
        .catch(err => {
          console.log(err)
        })
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
    this.getEmergencies()
   }
});