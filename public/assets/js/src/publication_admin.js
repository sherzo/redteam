const publication = new Vue({
   el: '#publications',
   data: {
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
   }
});