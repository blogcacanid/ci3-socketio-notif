var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

io.on('connection', function(socket){
  socket.on("reload-table", function(){
    socket.broadcast.emit("reload");
  });

  console.log('a user connected');
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });
});

http.listen(3000, '0.0.0.0' ,function(){
  console.log('listening on *:3000');
});