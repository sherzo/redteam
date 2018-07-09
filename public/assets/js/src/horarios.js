const schedule = new Vue({
  el: '#schedules',
  data: {
    schedules: [{entry: '', exit: ''}, {entry: '', exit:''}, {entry: '', exit: ''}],
    selectC: [],
    selectM: [],
    actived: 0,
    errors: [{ active: false }, { active: false }, { active: false },],
    completes: [
      {  
        days: [{ value: false }, { value: false }, { value: false }, { value: false }, { value: false }, { value: false }, { value: false }],
        display: ['D','L', 'M', 'M', 'J', 'V', 'S'],
        show: true
      },
      {  
        days: [{ value: false }, { value: false }, { value: false }, { value: false }, { value: false }, { value: false }, { value: false }],
        display: ['D','L', 'M', 'M', 'J', 'V', 'S'],
        show: false
      },
      {  
        days: [{ value: false }, { value: false }, { value: false }, { value: false }, { value: false }, { value: false }, { value: false }],
        display: ['D','L', 'M', 'M', 'J', 'V', 'S'],
        show: false
      }
    ]
  },
  computed: {
   
  },
  methods: {
    save (e) {

      e.preventDefault()
      
      let data = {
        times: this.schedules,
        days: this.selectC
      }

      this.$refs.myForm.submit()
    },
    showSchedule() {
      this.actived++
      this.completes[this.actived].show = true
    },
    dayOccuped(j) {
      
      let exists = false
      this.selectC.forEach((e, index) => {
        if(e.day == j) {
          exists = true
        }
      })

      return exists
    },
    toggleDay(i, j) {
      if(!this.schedules[i].entry || !this.schedules[i].exit) {
        this.errors[i].active = true
        setTimeout(() => {
          this.errors[i].active = false
        }, 3000)
        return
      }

      this.completes[i].days[j].value = !this.completes[i].days[j].value
      
      if (this.completes[i].days[j].value) {
        let exists = false
        this.selectC.forEach((e, index) => {
          if(e.day == j) {
            exists = true
          }
        })

        if(!exists) {
          let data = {
            day: j,
            complete: i
          }

          this.selectC.push(data)
        }

      } else {
        let idx;
        this.selectC.forEach((e, index) => {
          if(e.day == j) {
            idx = index
          }
        })

        this.selectC.splice(idx, 1)
      }

      console.log(this.selectC)
    }
  },
  mounted () {
    const self = this

    $('.clockpickerentry0').clockpicker()
        .find('input').change(function() {
        self.schedules[0].entry = this.value
        console.log(this.value);
    });

    $('.clockpickerexit0').clockpicker()
      .find('input').change(function() {
        self.schedules[0].exit = this.value
        console.log(this.value);
    });

    $('.clockpickerentry1').clockpicker()
        .find('input').change(function() {
        self.schedules[1].entry = this.value
        console.log(this.value);
    });

    $('.clockpickerexit1').clockpicker()
      .find('input').change(function() {
        self.schedules[1].exit = this.value
        console.log(this.value);
    });
    

    $('.clockpickerentry2').clockpicker()
        .find('input').change(function() {
        self.schedules[2].entry = this.value

        console.log(this.value);
    });

    $('.clockpickerexit2').clockpicker()
      .find('input').change(function() {
        self.schedules[2].exit = this.value
        console.log(this.value);
    });
 
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
  }
})