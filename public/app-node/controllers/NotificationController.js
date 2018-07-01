'use strict'

const Notification = require('../models/Notification')

function storeNotification(data,callback){
  
  //console.log('controlador')

  Notification.saveNotification(data, (err, Chat) => {
    if (err) return console.log(`ocurrio un error: ${err}`)
    callback(Chat)
  })

  return { result: true }
}

function markAsRead(data, callback) {
	Notification.markAsRead(data, (err, notification) => {
		if (err) return console.log(`Ocurrio un error: ${err}`)

		callback(notification)
	})
}

module.exports={
  storeNotification,
  markAsRead
}
