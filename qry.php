<?php
  include('catch.php');
  include('./dbtool/dbtool.php');
  
  $link = connection(); //資料庫連線
  
  $raceColor = array('阿根廷杯'=>'#336699',
                     '国际赛'=> '#327E7C',
                     '世界杯预'=>'#336600',
                     '巴西甲'=>'#336699',
                     '世青赛'=>'#C58788',
                     'J2联赛'=>'#22C126',
                     );
  
  $sql = "";
  $sql.= "select 
            * 
          from 
            game 
          where";
          if($_POST["dateStart"] != "" and $_POST["dateEnd"] == ""){
            $sql.=" date = '".$_POST["dateStart"]."' and";
          }
          if($_POST["dateStart"] == "" and $_POST["dateEnd"] != ""){
            $sql.=" date = '".$_POST["dateEnd"]."' and";
          }
          if($_POST["dateStart"] != "" and $_POST["dateEnd"] != ""){
            $sql.=" date >= '".$_POST["dateStart"]."' and
                    date <= '".$_POST["dateEnd"]."' and";
          }
          if($_POST["race"] !=""){
            $sql.=" race = '".$_POST["race"]."' and";
          }
          if($_POST["host"] !=""){
            $sql.=" host = '".$_POST["host"]."' and";
          }
          if($_POST["visite"] != ""){
            $sql.=" visite = '".$_POST["visite"]."' and";
          }
  $sql = substr($sql, 0, -3); //刪掉,  
   
  $result = mysqli_query($link,$sql);//查詢判斷重複 
  
  $more=0;
  $search_str="";
  $nowPrintDate = '';//判斷印到哪天
  
  while($row = mysqli_fetch_array($result)){
  
    $search_str  .= $row["date"].",".
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
  
?>
<html>
<head>
	<title>足球天天竞猜 - 参加足球竞猜游戏赢好礼 | 酷发巴巴彩票网</title>
  
<body onload="Submit();">
  <form action="./index.php" id="qry" method="POST">
    <input type="hidden" name="search_str" value='<?php echo $search_str;?>'>
    <input type="hidden" name="hide" value="q">
    <input type="submit"  value="Submit">
  </form>
</body>
</html>
<script>
  function Submit() {
    document.getElementById("qry").submit();
}
</script>