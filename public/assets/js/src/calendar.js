const publication = new Vue({
  el: '#calendar',
  data: {
    month: '',
    title: '',
    calendar: [],
    events: [],
    description: '',
    emergency: false,
    featured: false,
    comment: '',
    file: [],
    image: '',
    success: false,
    user_id: 0,
    date: moment()
  },
  filters: {
    showDay(date) {
      return moment(date).format('DD')
    }
  },
  methods: {
    getCalendar() {
      let date = this.date.format('YYYY-MM-DD')

      axios.get(`calendar/${date}/render`)
        .then(res => {
          this.month = res.data.month
          this.calendar = res.data.calendar
        })
        .catch(err => {
          console.log(err)
        })
    },
    prevMonth () {
      this.date = this.date.subtract(1, 'months')
      this.getCalendar()
      this.getEventsMonth()
    },
    nextMonth () {
      this.date = this.date.add(1, 'months')
      this.getCalendar()
      this.getEventsMonth()
    },
    showEvents (i) {
      this.calendar[i].show = !this.calendar[i].show;
    },
    getEventsMonth() {
      let date = this.date.format('YYYY-MM-DD')

      axios.get(`calendar/${date}/events`)
        .then(res => {
          this.events = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    addEvent () {
      let day = document.getElementById('day').value
      let event = {
        title: this.title,
        day: day
      }

      this.calendar.forEach(e => {
        if(e.day == day) {
          e.events.push(event)
        }
      })

      this.title = ''
      document.getElementById('day').value = ''

      axios.post('calendar/store', event) 
        .then(res => {
          this.getEventsMonth()
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
      /*
      $('#myModal').modal('hide')
      $('body').removeClass('modal-open');
      $('.modal-backdrop').remove();
      */
      axios.post('publications', form)
        .then(res => {
          this.success = true
          window.location = axios.defaults.baseURL + '/admin/home';
         
        })
        .catch(err => {
          console.log(err)
        })
    },
    setPopup () {
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
  },
  mounted() {
moment.locale('es')
    this.getEventsMonth()
    this.getCalendar()
    setTimeout(() => {
      $('#sandbox-container .input-daterange').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
      });
    }, 100) 
  }
});