<?php
  include('catch.php');
  include('./dbtool/dbtool.php');
  
  $link = connection(); //資料庫連線
  
  $data =lottery($link);//抓資料
  
  $alz = alz($data,$link);
  
  //存賽事顏色
  $raceColor = array('阿根廷杯'=>'#336699',
                     '国际赛'=> '#327E7C',
                     '世界杯预'=>'#336600',
                     '巴西甲'=>'#336699',
                     '世青赛'=>'#C58788',
                     'J2联赛'=>'#22C126',
                     );
  $update_str = ""; 
  $insert_str = "";
  $totale_str = "";
  
 
  
  $update_str = update($alz,$link,$raceColor);
 if(isset($alz["insertNumber"][0]))
  $insert_str = insert($alz,$link,$raceColor);
  
  $totale_str = $update_str.$insert_str;
  
  mysqli_close($link); 

function insert($alz,$link,$raceColor){
  $more=0;
  $insert_str="";
  $sql_insert= "select 
                  * 
                from 
                  game 
                ORDER BY 
                  id
                  DESC
                limit
                  ".$alz["insertNumber"][0].";";
  $result = mysqli_query($link,$sql_insert);
  while($row = mysqli_fetch_array($result)){
    $insert_str  .= $row["date"].",".
                   $row["race"].",".
                   $row["host"].",".
                   $row["visite"].",".
                   $row["time"].",".
                   $row["concede"].",".
                   $row["victory"].",".
                   $row["victory1"].",".
                   $row["draw"].",".
                   $row["draw1"].",".
                   $row["defeat"].",".
                   $row["defeat1"].",".
                   $row["num"].";";
  }
  return $insert_str;
}

//印更新資料  
function update($alz,$link,$raceColor){
  $count = count($alz["updateId"])-1;
  $more=1;
  $update_str="";
  $sql_update= "select 
                  * 
                from 
                  game 
                where 
                  id >= '".$alz["updateId"][0]."'and
                  id <= '".$alz["updateId"][$count]."'
                ORDER BY 
                  date , time;";
  $result = mysqli_query($link,$sql_update);
  
  while($row = mysqli_fetch_array($result)) {
  
    $update_str  .= $row["date"].",".
                   $row["race"].",".
                   $row["host"].",".
                   $row["visite"].",".
                   $row["time"].",".
                   $row["concede"].",".
                   $row["victory"].",".
                   $row["victory1"].",".
                   $row["draw"].",".
                   $row["draw1"].",".
                   $row["defeat"].",".
                   $row["defeat1"].",".
                   $row["num"].";";
  } 
  
  return $update_str;
}
?>
<html>
<head>
	<title>足球天天竞猜 - 参加足球竞猜游戏赢好礼 | 酷发巴巴彩票网</title>
  
<body onload="Submit();">
  <form action="./index.php" id="alz" method="POST">
    <input type="hidden" name="alzstr" value='<?php echo $totale_str;?>'>
    <input type="hidden" name="hide" value="a">
    <input type="submit" id="alz" value="Submit">
  </form>
</body>
</html>
<script>
  function Submit() {
    document.getElementById("alz").submit();
}
</script>