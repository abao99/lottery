var http = require('http');
var url = require('url');
var fs = require('fs');
var io = require('socket.io'); // 加入 Socket.IO

var server = http.createServer(function(request, response) {
  console.log('Connection ion ion....');
  
  var path = url.parse(request.url).pathname;

  switch (path) {
    case '/':
      response.writeHead(200, {'Content-Type': 'text/html'});
      response.write('Hello, Kitty.');
      response.end();
      break;
    case '/socket.html':
      fs.readFile(__dirname + path, function(error, data) {
        if (error){
          response.writeHead(404);
          response.write("opps this doesn't exist - 404");
        } else {
          response.writeHead(200, {"Content-Type": "text/html"});
          response.write(data, "utf8");
        }
        response.end();
        
      });
      break;
    default:
      response.writeHead(404);
      response.write("opps this doesn't exist - 404");
      response.end();
      break;
  }
});

server.listen(8001);  //port

var serv_io = io.listen(server);  // 開啟 Socket.IO 的 listener

serv_io.sockets.on('connection', function(socket) {
    socket.emit('message', {'msg': 'doraremon'});
    
    socket.on('cli',function(data) {
      console.log(data.aaa);
    });
});







