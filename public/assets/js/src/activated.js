const activated = new Vue({
  el: '#activated',
  data: {
    activated: false
  },
  methods: {
    getPhotoStatus () {
      axios.get(`configs/capturePhoto/get`)
        .then(res => {
          this.activated = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    markStatusPhoto () {
      this.activated = !this.activated

      axios.post('configs/set', { type: 'capturePhoto' , value: this.activated })
        .then(res => {

        })
        .catch(err => {
          console.log(err)
        })
    }
  },
  mounted () {
    this.getPhotoStatus()
    alert('asd')
  }
});