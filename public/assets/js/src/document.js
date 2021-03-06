const documents = new Vue({
  el: '#documents',
  data: {
    selected: {},
    documents: [],
    subdocuments: [],
    subdocumetsTwo: [],
    message: '',
    breadcrumbs: [{name:'Inicio', id: 0}],
    success: false,
    loading: false
  },
  watch: {
    selected (selected) {
      if(selected) {
        this.getSubdocuments(selected.id)
      }
    }
  },
  methods: {
    open(d) {
      if(!d.type) {
        this.selected = d

        this.breadcrumbs.push({ name: d.name, id: d.id })

        this.documents.forEach(e => {
          e.active = false
        })
      }
    },
    getBreadcrumsSubdocuments(id) {
      if(id != 0) { // Quitar breadcrums innecesarios
        let indexDelete = 0
        this.breadcrumbs.forEach((e, i) => {
          if(e.id == id) {
            indexDelete = i
          } 
        })
        let last = this.breadcrumbs.length - 1
        this.breadcrumbs.splice(indexDelete + 1, last)
      }
      
      this.getSubdocuments(id) 
    },
    getSubdocuments (id) {
      if(id == 0) {
        this.getDocuments()
        this.breadcrumbs = [{id: 0, name: 'Inicio'}]
        return
      }

      axios.get(`admin/documents/${id}/subdocuments`)  
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
    getAll (id) {
      if(this.selected.id == id) {
        return
      }
      axios.get(`admin/documents/${id}/all`)
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