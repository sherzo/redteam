const schedule = new Vue({
  el: '#schedules',
  data: {
    complete: true,
    complete2: false,
    complete3: false,
    midday: false,
    complete5: false,
    show6: false,
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
  methods: {
    toggleDay(i, j) {
      console.log(i, j)
      this.completes[i].days[j].value = !this.completes[i].days[j].value
    }
  },
  mounted () {
    $('.clockpicker').clockpicker()
        .find('input').change(function() {
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