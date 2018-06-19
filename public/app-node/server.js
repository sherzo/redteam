'use strict'

const app = require('./app')
const config = require('./config')
const io = app.io
const server = app.server
const ChatController = require('./controllers/ChatController')
const sockets_on = [];

io.on('connection', (socket) => {

  console.log(`socket connection: ${eval(socket).id}`);
  socket.on('destroy', (object) => {
    io.emit('response_destroy', object)
  })

  socket.on('share', (data) => {
    console.log(data);
    io.emit('response_share', data)
  })

  socket.on('sendMessage',(data)=>{
      var receiver_id = data.receiver_id
      var socket_destino = '';

      ChatController.storeMessage(data,(mh)=>{

        sockets_on.forEach((el, i)=>{
            if(el.id == receiver_id){
                el.sockets.forEach((el,i)=>{
                    socket.broadcast.to(el).emit('message-notify',{ user_id: data.user_id, message: data.message })
                    socket.broadcast.to(el).emit('new-message', mh)
                })
            }
        })
        
        
      })
  })

  socket.on('listMessages',(data)=>{
    ChatController.listMessages(data,(mensajes)=>{
      io.emit('list-mensajes-app',mensajes)
    })
  })

  socket.on('conect-socket',(data)=>{
      let indice = true;
      sockets_on.forEach((elm,ind)=>{
        if(elm.id==data.id){
          elm.sockets.push(socket.id)
          indice = false;
        }
      })
      if(indice){
        sockets_on.push({id:data.id, sockets:[socket.id]})
      }
      console.log(sockets_on)
  })

  socket.on('desconectar',(data)=>{
    sockets_on.forEach((elm, ind)=>{
        if(elm.id == data.id){
            sockets_on.splice(ind,1)
        }
    })
  })
  
  socket.on('bloquear', data => 
    get_socket('bloquear-user', data.id, {})
  )
  
  socket.on('validar', d => {
    console.log('Socket Validar');
    get_socket('validar-user', d.id, {});
    }
  )
  
  socket.on('calificar', d => {
    console.log('calificar');
    console.log('data: '+JSON.stringify(d) )
    get_socket('cita-culminar', d.id, {}) 
  })

  socket.on('consultar_mensajes',(data)=>{
    console.log(JSON.stringify(data),'server')
    ChatController.cantMensajes(data,(mensajes)=>{
      
      get_socket('cant_mensajes',data.id,mensajes)
      sockets_on.forEach((el, i)=>{
        if(el.id == data.id){
            el.sockets.forEach((el,i)=>{
                io.to(el).emit('cant_mensajes',mensajes)
                // socket.broadcast.to(el).emit('cant_mensajes',mensajes)
            })
        }
      })
      
    })
  })

  function get_socket(channel, destinatario, parametros){
    
    console.log('  channel: '+channel);
    console.log('  destinatario: '+destinatario);
    console.log('  parametros: '+ JSON.stringify(parametros));
    console.log('  sockets_on.length: '+sockets_on.length);
    
    sockets_on.forEach( (elm, ind) => {
      if(elm.id == destinatario) {
        elm.sockets.forEach( (em, indd) => {
          io.to(em).emit(channel, parametros)
          console.log(em)
        })
      }
    })
  }

})
server.listen(config.port)
        