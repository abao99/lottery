....
....
fs
time
mysql

....


function do_a(callback){
  setTimeout( function(){
    console.log( '`do_a`: 這個需要的時間比 `do_b` 長' );
    callback();
  }, 1000 );
  return 87;
}

function do_b(){
  console.log( '`do_b`: 跟著才是這個' );
}

do_c() {
  
}

do_a(function() {
  do_b(function() {
    do_c();
  });
});


function add(arg1, arg2, callback) {
  var rst = arg1 + arg2;
  callback(rst);
}

add(8,9,function(v){
  consloe.log(v);
});





