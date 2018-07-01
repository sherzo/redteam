'use strict'

const connection = require('../core/connection')
const moment = require('moment')

function saveNotification(req, res){

  let db = connection.connections()

  let now = moment().format('YYYY-MM-DD h:mm:ss')

  let sql = `INSERT INTO notifications (user_id, data, type, created_at, updated_at) VALUES (?, ?, ?, ?, ?)`

  let sql_2 = `SELECT * 
                FROM notifications 
                WHERE notifications.id = ?`

  db.query(sql, [req.user_id, req.data, req.type, now, now], (err, result) => {
    if (err) return res(err)
      db.query(sql_2,[result.insertId],(err,result1)=>{
          if (err) return res(err)
          // db.end()
          //console.log(result1)
          return res(err, result1)
      })
  })
}

function markAsRead(req, res) {

  let db = connection.connections()

  let now = moment().format('YYYY-MM-DD h:mm:ss')

  let sql = "INSERT INTO notification_user (user_id, notification_id) VALUES (?, ?)"

  db.query(sql, [req.user_id, req.notification_id], (err, result) => {
    if(err) return res(err)

    return res(result)
  })
}

module.exports = {
  saveNotification,
  markAsRead
}