const schedule = new Vue({
   el: '#schedule',
   data: {
      completes: [],
      midday: [],
      active: 'DaySelectActiveEdit',
      user: {},
      days: ['d', 'l', 'm', 'm' ,'j', 'v', 's'],
      occupied: [false, false, false, false, false, false, false]
   },
   methods: {
    initClock () {
      $('.clockpicker').clockpicker()
        .find('input').change(function() {
      });
      var input = $('#single-input').clockpicker({
          placement: 'bottom',
          align: 'left',
          autoclose: true,
          'default': 'now'
      });  
    },
    getUser (user_id) {
      this.user_id = user_id;
      let daysSelected  = [false, false, false, false, false, false, false];

      axios.get(`admin/users/${this.user_id}/get-schedules`)
        .then(res => {
          this.completes = res.data.completes
          this.midday = res.data.midday

          this.completes.forEach(e => {
            daysSelected  = [false, false, false, false, false, false, false];

            e.days.forEach(d => {
              daysSelected[d.day] = true
              //this.occupied[d.day] = true
            })
         
            this.$set(e, 'daysSelected', daysSelected)

          })

          setTimeout(() => {
            this.initClock()
          }, 500)
        })
        .catch(err => {
          console.log(err)
        })
    },
    select(index, i) {
      let value = this.completes[index].daysSelected[i] 
      this.completes[index].daysSelected[i] = !value
      console.log(this.completes[index].daysSelected)
    },
    addClass(selected, i) {
      if(selected) {
        return 'DaySelectActiveEdit'
      }else {
        if(this.occupied[i]) {
          return 'disabledbutton'
        }else {
          return ''
        }
      }
    },
    schedulesComplete(completes) {
      this.completes = completes
      console.log(this.completes)
    },
    schedulesMidday(midday) {
      this.midday = midday
    }
   },
   mounted() {
   } 
});