'use strict'

const Chat = require('../models/Chat')

function storeMessage(data,callback){
  Chat.saveMessage(data, (err, Chat) => {
    if (err) return console.log(`ocurrio un error: ${err}`)
    callback(Chat)
  })
  return { result: true }
}

function listMessages(data, callback){
  Chat.listMessages(data, (err, Chat) => {
    if (err) return console.log(`ocurrio un error: ${err}`)
    callback(Chat)
  })
}

function cantMensajes(data,callback){
  Chat.getUnseenMessages(data,(err,chat)=>{
    if (err) return console.log(`ocurrio un error: ${err}`)
    callback(chat)
  })
}

function getUsersOnline(data,callback){
  Chat.getUsersOnline(data,(err,Chat)=>{
    if (err) return console.log(`ocurrio un error: ${err}`)
    callback(Chat)
  })
}

module.exports={
  storeMessage,
  listMessages,
  cantMensajes,
  getUsersOnline
}
