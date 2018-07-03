const galery = new Vue({
  el: '#galeries',
  data: {
    galeries: [],
    modal: {
      photo: ''
    }
  },
  filters: {
    showImage (image) {
      return axios.defaults.baseURL + '/storage/' + image
    }
  },
  methods: {
    getGaleries (id) {
      console.log(id)
      axios.get(`galeries/${id}`)
        .then(res => {
          this.galeries = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    viewPhoto (p) {
      this.modal.photo = p
    }
  },
  mounted () {
  	//this.getGaleries()
  }
});