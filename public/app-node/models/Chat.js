'use strict'

const connection = require('../core/connection')
const moment = require('moment')

function saveMessage(req, res){
  let db = connection.connections()
  console.log(JSON.stringify(req))
  let sql = `INSERT INTO messages (chat_id, message, user_id) VALUES (?, ?, ?)`

  let sql_2 = `SELECT * 
                FROM messages 
                INNER JOIN users ON messages.user_id = users.id WHERE messages.id = ?`

    let sql_3 = `UPDATE chats SET updated_at = ? WHERE id = ? `

  db.query(sql, [req.chat_id, req.message, req.user_id], (err, result) => {
    if (err) return res(err)

        db.query(sql_3,[moment().format('YYYY-MM-DD h:mm:ss'), req.chat_id])
        db.query(sql_2,[result.insertId],(err,result1)=>{
            if (err) return res(err)
            // db.end()
            return res(err, result1)
        })
  })
}


function listMessages(req, res){
    console.log(1)
  let db = connection.connections()
  let sql = `SELECT mensajes.* FROM mensajes
  			 	WHERE (remitente = ? 
  			 		AND destinatario = ?) 
  			 			OR (remitente = ? 
  			 				AND destinatario = ?)`

  let sql_upd = `UPDATE mensajes SET 
  					seend = ?, 
  							WHERE seend = null 
  								AND remitente = ? 
  									AND destinatario = ?`

  db.query(sql_upd,[moment().format('YYYY-MM-DD h:mm:ss'),req.user2, req.user1],(err,result)=>{
    if (err) return res(err)
        db.query(sql, [req.user1, req.user2, req.user2, req.user1], (err, result) => {
            if (err) return res(err)
            db.end()
            return res(err, result)
        })
  })
}

function getUnseenMessages(req, res){
    let db = connection.connections()
    let sql = `select count(messages.id) as cant FROM messages 
                INNER JOIN chats ON (chats.id = messages.chat_id) 
                WHERE (chats.transmitter_id = ? or chats.receiver_id = ?) 
                AND messages.seen IS null 
                AND messages.deleted_at IS NULL 
                AND messages.user_id != ?
                AND chats.deleted_at IS NULL
                AND chats.status = '1'`;
    db.query(sql, [req.id, req.id, req.id], (err, result) => {
        if (err) return res(err)
            db.end()
            return res(err,result)
        })

}
module.exports={
    saveMessage,
    listMessages,
    getUnseenMessages
}
