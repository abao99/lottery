var http =  require('http');
var io = require('socket.io'); // 加入 Socket.IO

//建立伺服器
var server = http.createServer(function(request, response) {
  console.log('Connection listen*8001');
});
server.listen(8001);  //指定port

//連線資料
var mysql = require('mysql');
var con = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '123456',
  database : 'lottery'
});

//連線資料庫
  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
  }); 

var serv_io = io.listen(server);  // 開啟 Socket.IO 的 listener

serv_io.on('connection',function(socket){
  
    qry(socket);
  
});    
  
function qry(socket){
  //計算今天日期
  var today ="";
  var d = new Date();
  var day = d.getMonth()+1;
  today = d.getFullYear()+"-"+"0"+day+"-"+d.getDate();
    
  //搜尋資料
  var sql = "";
  var row = {};
      sql = "SELECT "+
               "* "+ 
            "FROM "+
               "game "+
            "where "+
               "date >='"+today+"'"+
            " ORDER BY "+
               "date , time;";
                
  con.query(sql, function (err, result) {
      if (err) throw err;
      
    for(i = 0; i <result.length ; i++){
      row[i] = result[i]; 
    } 

    socket.emit('qry',row);
  });        
} 
