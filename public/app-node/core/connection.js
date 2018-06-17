'use strict'

const mysql = require('mysql')
const config = require('../config')

function connections() {
  var connection = mysql.createConnection({
    host: config.host,
    user: config.user,
    password: config.password,
    database: config.database,
    port: config.port_db
  })

  connection.connect((err) => {
    if (err) return console.log(`Error al conctar a la BD: ${err}`)

    console.log('Conectado a la bd');
  })

  return connection
}

module.exports = { connections }
