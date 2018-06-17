const publication = new Vue({
   el: '#publications',
   data: {
      publications: [],
      description: '',
      emergency: false,
      featured: false,
      comment: '',
      file: [],
      image: '',
      success: false,
      user_id: 0
   },
   filters: {
    humanize(d) {
      moment.locale('es')
      return moment(d).fromNow()
    },
    profileUrl(username) {
      return axios.defaults.baseURL + '/profile/' + username
    } 
   },
   methods: {
    getPublications () {
      axios.get('publications')
        .then(res => {
          this.publications = res.data
          this.publications.forEach(e => {
            Vue.set(e, 'comment', '')
          })
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
      //$('#myModal').modal('hide')
      //$('body').removeClass('modal-open');
      //$('.modal-backdrop').remove();
      document.getElementById('close-modal').click()
      axios.post('publications', form)
        .then(res => {
          this.success = true
          this.publications.unshift(res.data)
          setTimeout(() => {
            this.success = false
          },3000)
        })
        .catch(err => {
          console.log(err)
        })
    },
    addComment (publication_id, i) {
      let comment = {
        description: this.publications[i].comment,
        publication_id
      }
      this.publications[i].comment = ''
      axios.post('publications/comment', comment)
        .then(res => {
          this.publications[i].comments.push(res.data)
        })
          .catch(err => {
            console.log(err)
        })
    },
    like (publication) {
      publication_id = publication.id

      publication.likes.push({
        publication_id: publication_id,
        user_id: this.user_id
      });

      axios.post('publications/like', { publication_id })
        .then(res => {
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
    }
   },
   mounted() {
    this.getPublications()
   } 
});