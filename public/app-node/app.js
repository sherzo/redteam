'use strict'

const express = require('express')
const bodyParser = require('body-parser')
const app = express()
const server = require('http').Server(app)
const io = require('socket.io')(server)
const api = require('./routes/web')

app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())
app.use('/app', api)

app.get('/',(req,res) => {
    res.redirect('http://127.0.0.1:8000')
})


module.exports = {
  app,
  server,
  io
}