<?php
  if($_POST["hide"] !=""){
    if($_POST["hide"] == "a"){
      $info = $_POST["alzstr"];
    }
    if($_POST["hide"] == "q"){
      $info = $_POST["search_str"];
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>足球天天竞猜 - 参加足球竞猜游戏赢好礼 | 酷发巴巴彩票网</title>
  <link rel="stylesheet" type="text/css" href="./mycss.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <div class="contentWrap">
    <form action="./qry.php" id="qry" method="POST">
      日期(起):
        <input type="date" name="dateStart">&nbsp;&nbsp;~
      日期(迄):
        <input type="date" name="dateEnd"><br>
      賽事:
        <select name="race">
          <option value="">---請選擇---</option>
          <option value="阿根廷杯">阿根廷杯</option>
          <option value="国际赛">国际赛</option>
          <option value="世界杯预">世界杯预</option>
          <option value="巴西甲">巴西甲</option>
          <option value="世青赛">世青赛</option>
          <option value="J2联赛">J2联赛</option>
        </select>&nbsp;&nbsp;
      主隊:
        <input type="text" name="host">&nbsp;&nbsp;
      客隊:
        <input type="text" name="visite">&nbsp;&nbsp;
      <input type="submit" value="搜尋">&nbsp;
      <button type="button"><a href="./alz.php">分析</a></button>
    </form> 
    <table class="gameTable">
      <thead>
        <tr>
          <th width="100" class="bl3">赛事</th>
          <th width="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主队&nbsp;&nbsp;&nbsp;vs&nbsp;&nbsp;&nbsp;客队&nbsp;&nbsp;</th>
          <th width="80">截止</th>
          <th>让球</th>
          <th width="300">主胜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平局&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;客胜</th>
          <th width="150" class="br3">竞猜人数</th>
        </tr>
     </thead>
      <tbody>
        <?php echo $info; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
<script>
    function clickMore(id){
      $(".more"+id).toggle( );
      $("#arrow"+id).toggleClass( "arrow1" ); 
    }   
</script>