const documents = new Vue({
  el: '#documents',
  data: {
    selected: {},
    documents: [],
    subdocuments: [],
    subdocumetsTwo: [],
    message: '',
    breadcrumbs: [{ id: 1, name: 'Documents'},{ id: 2, name: 'Imagnees'}],
    success: false,
    loading: false
  },
  methods: {
    open(d) {
      alert(d.name)
    },
    create () {

    },
    selectDocument (d) {
      if(!d.type) {
        if(this.selected.id == d.id) {
          this.selected = {}
        }else {
          this.selected = d
        }
        this.documents.forEach(e => {
          e.active = false
        })
      }
    },
    deletes () {

    },
    upload () {

    },
    uploadFile () {
      this.loading = true

      this.file = this.$refs.myFile.files[0]

      let formData = new FormData();

      formData.append('file', this.file)
      if(this.selected.id) {
        formData.append('parent_id', this.selected.id)
      }
      this.message = 'Se guardo el documento'
      axios.post('admin/documents', formData)
        .then(res => {
          this.loading = false
          this.success = true
          this.documents.push(res.data)
          setTimeout(() => {
            this.success = false
          }, 2000)
        })
        .catch(err => {
          console.log(err)
        })
    },
    getDocuments() {
      axios.get('admin/documents/all')
        .then(res => {
          this.documents = res.data
          this.documents.forEach(e => {
            Vue.set(e, 'active', false)
            Vue.set(e, 'selected', false)
          })
        })
        .catch(err => {
          console.log(err)
        })
    },
    addFolder () {
      var name = prompt("Escribe nombre de la carpeta");
      
      if(!name) {
        return
      }

      let data = {
        parent_id: this.selected.id,
        name: name
      }
      
      axios.post('admin/documents/add-folder', data)
        .then(res => {
          this.documents.push(res.data)
        })
        .catch(err => {
          console.log(err)
        })
    },
    actived(i) {
      this.documents[i].active = !this.documents[i].active
    }
  },
  mounted () {
    this.getDocuments()
  }
})