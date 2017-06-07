
<?php
  $link = mysqli_connect('localhost','root','123456','lottery') // 連資料庫
			or die("error".mysqli_connect_error());
  mysqli_query($link,"set names utf8");
  
  $todate=date("Y-m-d");     //今天日期
  $tomorrow = date('Y-m-d',strtotime($todate."+1 days")); //明天
  
  $sql = "select * from game where date >= '".$todate."'"; //抓今天以後的資料
  
  $result = mysqli_query($link,$sql);//查詢判斷重複 
  
  $row = mysqli_fetch_array($result);//資料存到$rowarry陣列
  do{
		$rowarray[] = $row;
	}
	while ( $row = mysqli_fetch_assoc($result));{
		
	}
  
  mysqli_close($link); 
  
  $count = count($rowarray); //計算有幾筆資料

  for($i=0;$i<$count;$i++){             // 計算第幾筆資料換天
    if($rowarray[$i]["date"] == $todate){
      $change = $i;
    }
    if($rowarray[$i]["date"] == $tomorrow){
      $change1 = $i;
    }
  }   
  
  $change++;  //第幾筆資料換天
  $change1++;
  $info ="";
  $more = 0;
  
  for($i=0;$i<$count;$i++){
    if($i == 0 || $i == $change || $i == $change1){
      $more++;
      $info .= '<tr class="more expanded" id="more'. $more .'" style="border-top: 0;">
                  <td colspan="6" class = "pointer">'. $rowarray[$i]["date"] .' 每次竞猜选择一个选项下注</td>
                </tr>
               ';
      
    }
    $info .= '
              <tr class="moreContent more'. $more .'" style="display: table-row">
                <td><span class="leagueName" style="background-color: #336699; color: #ffffff">'. $rowarray[$i]["race"] .'</span></td>
                <td class="name"><span class="ht">'. $rowarray[$i]["host"] .' </span>
                                 <span class="vs">vs</span>
                                 <span class="at">'. $rowarray[$i]["visite"] .'</span>
                </td>
                <td ><span class="time">'. $rowarray[$i]["time"] .'</span></td>
                <td>
                                  
                  <span class="rq1">0</span>
                                  
                  <span class="rq2" style="color: green">'. $rowarray[$i]["concede"] .'</span>
                                  
                </td>
                <td class="odds" width="300">
                                  
                  <span>胜 '. $rowarray[$i]["victory1"] .'</span>
                  <span>平 '. $rowarray[$i]["draw1"] .'</span>
                  <span>负 '. $rowarray[$i]["defeat1"] .'</span>
                                  
                  <span>胜 '. $rowarray[$i]["victory"] .'</span>
                  <span>平 '. $rowarray[$i]["draw"] .' </span>
                  <span>负 '. $rowarray[$i]["defeat"] .'</span>
                                  
                </td>
                <td class="num">'. $rowarray[$i]["num"] .'人竞猜</td>
              </tr>
             ';
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
</body>
</html>
<script>
$(document).ready(function(){
    $("#more1").click(function(){
        $(".more1").toggle();
    });
    
    $("#more2").click(function(){
        $(".more2").toggle();
    });
    
    $("#more3").click(function(){
        $(".more3").toggle();
    });
    
});
</script>

