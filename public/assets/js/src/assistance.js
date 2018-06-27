const assistance = new Vue({
  el: '#gn-menuData',
  data: {
    isWorking: null
  },
  methods: {
    getWorkStatus () {
      axios.get('get-work-status')
        .then(res => {
          this.isWorking = res.data.isWorking
        })
        .catch(err => {
          console.log(err)
        })
    },
    markEntry () {
      this.isWorking = true

      publication.success = '¡Bienvenido! se marco su entrada correctamente, recuerde marcar su salida'
      setTimeout(() => {
        publication.success = ''
      }, 4000)
      axios.post('mark-entry')  
        .then(res => {
          console.log(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    markExit (){
      this.isWorking = false
      publication.success = '¡Hasta la próxima! se marco su salida correctamente'

      setTimeout(() => {
        publication.success = ''
      }, 4000)
      axios.post('mark-exit')  
        .then(res => {
          console.log(res.data)
        })
        .catch(err => {
          console.log(err)
        })

    }
  },
  mounted () {
    this.getWorkStatus()
    $("#gn-menuData").click(function(){
        $("nav.gn-menu-wrapper").toggleClass("gn-open-all");
        $("a.gn-icon.gn-icon-menu").toggleClass("gn-selected");
      });
  }
})