const sugerency = new Vue({
   el: '#suggestions',
   data: {
      checkAll: false,
      message: '',
      checkeds: [],
      sugerency: '',
      acordion: '',
      suggestions: [],    
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
        this.suggestions.forEach(e => {
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
    deletes () {
      this.message = 'Se eliminaron sugerencias correctamente'
      this.success = true
      console.log(this.checkeds)
      let data = { 
        suggestions_ids: this.checkeds 
      }
      axios.delete('suggestions', data)
        .then(res => {
          console.log(res)
          this.getSuggestions()

      })
      .catch(err => {
        console.log(err)
      })
    },
    markAsRead () {
      this.message = 'Se marcaron las sugerencias como leidas'
      this.success = true
      console.log(this.checkeds)
      let data = { 
        suggestions_ids: this.checkeds 
      }
      axios.post('suggestions/mark-as-read', data)
        .then(res => {
          console.log(res)
          this.getSuggestions()
          
          setTimeout(() => {
            this.success = false
          }, 1800)
      })
      .catch(err => {
        console.log(err)
      })
    },
    addSugerency () {
      this.success = true

      let sugerency = {
        description: this.sugerency
      }

      this.sugerency = ''
      axios.post('suggestions', sugerency)
        .then(res => {

          //this.sugerencies.push(res.data)

          setTimeout(() => {
            this.success = false
          }, 2000)
        })
    },
    getSuggestions() {
      axios.get('admin/all/suggestions')
        .then(res => {
          this.suggestions = res.data
          this.suggestions.forEach(e => {
            Vue.set(e, 'accordion', false)
            Vue.set(e, 'discussion', '')
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    addDiscussion (i) {
      let description = this.suggestions[i].discussion

      if(!description) {
        return
      }

      let data = {
        description: description,
        suggestion_id: this.suggestions[i].id 
      }
      this.suggestions[i].discussion = ''

      axios.post('suggestions/discussion', data)
        .then(res => {
          console.log(res.data)
          this.suggestions[i].discussions.push(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    toggleAccordion (i) {
      this.suggestions[i].accordion = !this.suggestions[i].accordion
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
    this.getSuggestions()
   }
});