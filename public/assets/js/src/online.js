const onlinen = new Vue({
  el: '#online',
  data: {
    online: []
  },
  filters: {
    showImage (image) {
      return axios.defaults.baseURL + '/storage/' + image
    }
  },
  getOrCreate() {

  },
  mounted () {
  	socket.on('users-online', (users) => {
      this.online = users
    })
  }
});