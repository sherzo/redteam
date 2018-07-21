const application = new Vue({
   el: '#applications',
   data: {
      complete: '',
      modal: {
        user: { avat: '', name: '' },
        status: true,
        discount: true
      },
      error: false,
      message: '',
      discount: '',
      checkAll: false,
      checkeds: [],
      reason: '',
      applications: [],
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
        this.applications.forEach(e => {
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
    aceptOrDenied (i, status) {
      id = this.applications[i].id
      this.modal.status = status
      this.modal.user = this.applications[i].user
      this.modal.discount = this.applications[i].discount

      let res = status ? 'Han aceptado' : 'Han rechazado'

      let notify = `Han ${res} tu <span class='typeAccionNotifi'>solicitud</span>`
      let notification = {
        user_id: this.applications[i].user.id,
        type: 15,
        data: notify,
        propetary_id: authId
      }
      socket.emit('sendNotification', notification)

      axios.post('applications/acept-or-denied', { id, status})
        .then(res => {
          this.applications.splice(i, 1)
        })
        .catch(err => {
          console.log(err)
        })
    },
    markAsRead () {
      this.message = 'Se marcaron las solicitudes como leidas'
      this.success = true
      console.log(this.checkeds)
      let data = { 
        applications_ids: this.checkeds 
      }

      axios.post('applications/mark-as-read', data)
        .then(res => {
          console.log(res)
          this.getApplications()
          setTimeout(() => {
            this.success = false
          }, 3000)
      })
      .catch(err => {
        console.log(err)
      })
    },
    addApplication () {

      if(this.complete === '') {
        this.message = 'Seleccione la hora'
        setTimeout(() => {
          this.error = false
        }, 3000)
        return
      }
      
      if(this.discount === '') {
        this.message = 'Seleccione un día de descuento'
        this.error = true
        setTimeout(() => {
          this.error = false
        }, 3000)
        return
      }

      this.success = true
      var fechasSelecCita = $('div#datetimepicker12>div.timepicker-sbs>div>div.datepicker>div.datepicker-days>table.table-condensed>tbody>tr>td.active').data('day');
      let date = moment(fechasSelecCita)
      let now = moment()
      let subdate = date.subtract(5, 'days');
      let posible = now.isSameOrBefore(subdate)

      if(!posible) {
        this.message = 'La solicitud del permiso debe tener 5 días de anticipación'
        this.error = true
        setTimeout(() => {
          this.error = false
        }, 3000)
        return
      }

      date = date.format('YYYY-MM-DD') 
      let data = {
        date,
        description: this.reason,
        complete: this.complete,
        discount: this.discount,
      }   
      $('.selecDatTime').removeClass('slectccionadoAction')
      this.discount = ''
      this.complete = ''
      console.log(data);
      this.reason = ''
      axios.post('applications', data)
        .then(res => {
          setTimeout(() => {
            this.success = false
          }, 3000)
        })
        .catch(err => {
          console.log(err)
        })
    },
    getApplications () {
      axios.get('admin/all/applications')
        .then(res => {
          this.applications = res.data
          this.applications.forEach(e => {
            Vue.set(e, 'accordion', false)
            Vue.set(e, 'send', false)
            Vue.set(e, 'discussion', '')
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    addDiscussion (i) {
      let description = this.applications[i].discussion

      if(!description) {
        return
      }      
      let formData = new FormData()
      formData.append('description', description) 
      formData.append('id', this.applications[i].id) 
      
      this.applications[i].discussion = ''

      this.applications[i].discussion = ''
      
      let notify = `Han repondido a tu <span class='typeAccionNotifi'>solicitud</span>`
      let notification = {
        user_id: this.applications[i].user.id,
        type: 15,
        data: notify,
        propetary_id: authId
      }
      socket.emit('sendNotification', notification)

      axios.post('applications/discussion', formData)
        .then(res => {
          this.applications[i].discussions.push(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    toggleAccordion (i) {
      this.applications[i].accordion = !this.applications[i].accordion
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
    this.getApplications()
    $(function () {
      $('#datetimepicker12').datetimepicker({
          format: "yyyy-mm-dd", 
          inline: true,
          sideBySide: true,
      });
    });

   }
});