const assistance = new Vue({
  el: '#gn-menuData',
  data: {
    isWorking: null,
    sizes: {
      width: 200,
      height: 0
    },
    capture: 0
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
    initWebCam () {

      option = {
        "video": true,
        "audio": false
      }
      var streaming = false,
          video        = document.querySelector('#video'),
          canvas       = document.querySelector('#canvas'),
          photo        = document.querySelector('#photo');


      navigator.getMedia = ( navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia);

      function initCam (stream) {
        
        if(navigator.mozGetUserMedia) {
          video.mozSrcObject = stream
        } else {
          var vendorURL = window.URL || window.webkitURL
          try {
            video.srcObject = new MediaSource()
          } catch (err) {
            console.log(err)
            video.src = vendorURL.createObjectURL(stream)
          }

        }
        video.play()
      }

      var errBack = function(err) {
        console.log('An error occured! ' + err)
      }
      
      navigator.getMedia(option, initCam, errBack)

      video.addEventListener('canplay', (ev) => {
        if (!streaming) {
          this.sizes.height = video.videoHeight / (video.videoWidth/this.sizes.width);
          video.setAttribute('width', this.sizes.width);
          video.setAttribute('height', this.sizes.height);
          canvas.setAttribute('width', this.sizes.width);
          canvas.setAttribute('height', this.sizes.height);
          streaming = true;
        }
      }, false);
    },
    takePicture () {
      canvas.width = this.sizes.width;
      canvas.height = this.sizes.height;
      canvas.getContext('2d').drawImage(video, 0, 0, this.sizes.width, this.sizes.height);
      var data = canvas.toDataURL('image/png');
      //photo.setAttribute('src', data);

      return data;
    },
    dataURLtoFile () {

    },
    markEntry () {
      console.log(this.capture)
      if(this.capture == 1) {
        var foto = this.takePicture() 
      }else {
        var foto = null
      }

      this.isWorking = true

      const data = new FormData()
      data.append('photo', foto)

      publication.success = '¡Bienvenido! se marco su entrada correctamente, recuerde marcar su salida'
      setTimeout(() => {
        publication.success = ''
      }, 4000)
      
      axios.post('mark-entry', data)  
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

    },
  },
  mounted () {
    axios.get('admin/configs/capturePhoto/get')
      .then(res => {
        this.capture = res.data
        if(res.data == 1) {
          this.initWebCam()
        }
      })
      .catch(err => {
        console.log(err)
      })
    this.getWorkStatus()
    $("#gn-menuData").click(function(e){
        e.stopPropagation();
        $("nav.gn-menu-wrapper").toggleClass("gn-open-all");
        $("a.gn-icon.gn-icon-menu").toggleClass("gn-selected");
    });

    $('body').click(function() {
      $("nav.gn-menu-wrapper").removeClass("gn-open-all");
      $("a.gn-icon.gn-icon-menu").removeClass("gn-selected");
      
    })
  }
})