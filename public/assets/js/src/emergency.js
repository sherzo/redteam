const emergency = new Vue({
   el: '#emergencies',
   data: {
      modal: { image: '' },
      checkAll: false,
      checkeds: [],
      message: '',
      reason: '',
      emergencies: [],
      emergencyFile: '',
      emergencyImage: '',    
      description: '',
      emergency: false,
      featured: false,
      comment: '',
      file: [],
      image: '',
      success: false,
      user_id: 0,
   },
   watch: {
    checkAll (all) {
      if(all) {
        this.emergencies.forEach(e => {
          this.checkeds.push(e.id);
        })
      }else {
        this.checkeds = []
      }
    }
   },
   computed: {
    isChecked () {
      if(this.checkAll) {
        return true
      }

      return this.checkeds.length > 0
    }
   },
   methods: {
    showImage (image) {
      this.modal.image = image
    },
    markAsRead () {
      this.message = 'Se marcaron las sugerencias como leidas'
      this.success = true
      console.log(this.checkeds)
      let data = { 
        emergencies_ids: this.checkeds 
      }

      axios.post('emergencies/mark-as-read', data)
        .then(res => {
          console.log(res)
          this.getEmergencies()
          setTimeout(() => {
            this.success = false
          }, 3000)
      })
      .catch(err => {
        console.log(err)
      })
    },
    addEmergency () {
      this.success = true
      
      let formData = new FormData()

      formData.append('description', this.reason) 
      formData.append('file', this.emergencyFile) 
      formData.append('image', this.emergencyImage) 
      
      this.emergencyImage = ''
      this.emergencyFile = ''
      this.reason = ''
      axios.post('emergencies', formData)
        .then(res => {

          //this.emergencies.push(res.data)

          setTimeout(() => {
            this.success = false
          }, 2500)
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
    addDiscussion (i) {
      let description = this.emergencies[i].discussion

      if(!description) {
        return
      }

      this.success = true
      
      let formData = new FormData()
      formData.append('description', description) 
      formData.append('file', this.emergencyFile) 
      formData.append('image', this.emergencyImage) 
      formData.append('id', this.emergencies[i].id) 
      
      this.emergencyImage = ''
      this.emergencyFile = ''
      this.emergencies[i].discussion = ''

      axios.post('emergencies/discussion', formData)
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
      this.file = ''
      this.image = ''
      /*
      $('#myModal').modal('hide')
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
      */
      axios.post('publications', form)
        .then(res => {
          window.location = axios.defaults.baseURL + '/admin/board';
         
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
    getEmergencyFile () {
      this.emergencyFile = this.$refs.emergencyFile.files[0]
    },
    getEmergencyImage () {
      console.log('iMagen')
      this.emergencyImage = this.$refs.emergecyImageE.files[0]
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