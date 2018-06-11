const documents = new Vue({
  el: '#documents',
  data: {
    documents: []
  },
  methods: {
    create () {

    },
    deletes () {

    },
    upload () {

    },
    getDocuments() {
      axios.get('admin/documents/all')
        .then(res => {
          this.documents = res.data
        })
        .catch(err => {
          console.log(err)
        })
    },
    addFolder () {
      var name = prompt("Escribe nombre de la carpeta");
      
      axios.post('documents', {name})
        .then(res => {
          this.documents.push(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    }
  },
  mounted () {
    this.getDocuments()
  }
})