
<?php
  include('catchdata.php');
  include('./dbtool/dbtool.php');
  
  $link = connection(); //資料庫連線
  
  lottery($link);//抓資料
  
  date_default_timezone_set('Asia/Taipei');//設定地點為台北時區
  $todate=date("Y-m-d");     //今天日期

  $sql = "select 
            * 
          from 
            game 
          where 
            date >='".$todate."' 
          ORDER BY 
            date , time;"; 
  $result = mysqli_query($link,$sql);//抓今天以後的資料
  
  $info ="";  //印資料字串
  $more = 0;  //id 
  $nowPrintDate = '';//判斷印到哪天
  
  //存賽事顏色
  $raceColor = array('阿根廷杯'=>'#336699',
                     '国际赛'=> '#327E7C',
                     '世界杯预'=>'#336600',
                     '巴西甲'=>'#336699',
                     '世青赛'=>'#C58788',
                     );
  
  while($row = mysqli_fetch_array($result)) {
  
    if($nowPrintDate == "" || $nowPrintDate != $row["date"]){
      $more++;
      $info .= '<tr class="more expanded" id="more'. $more .'" style="border-top: 0;" onclick="clickMore('. $more .')">
                  <td colspan="6" class = "pointer">
                  <span id="arrow'. $more .'" class="arrow">
                  </span>
                    '. $row["date"] .' 每次竞猜选择一个选项下注
                  </td>
                </tr>
               ';
      $nowPrintDate = $row["date"];  
    }
    $info .= '
              <tr class="moreContent more'. $more .'" style="display: table-row">
                <td><span class="leagueName" style="background-color: '.$raceColor[$row["race"]] .'; color: #ffffff">'. $row["race"] .'</span></td>
                <td class="name"><span class="ht">'. $row["host"] .' </span>
                                 <span class="vs">vs</span>
                                 <span class="at">'. $row["visite"] .'</span>
                </td>
                <td ><span class="time">'. $row["time"] .'</span></td>
                <td>
                                  
                  <span class="rq1">0</span>
                                  
                  <span class="rq2" style="color:'; 
    
    if($row["concede"] > 0){     //判斷讓分正負顏色
      $info .= ' green ';
    }              
    else{
      $info .= ' #ed3a37 ';
    }
    
    $info .= '">'. $row["concede"] .'</span>                
                </td>
                <td class="odds" width="300">';
    
    if($row["victory"] != " "){
      $info .='
                  <span>胜 '. $row["victory"] .'</span>
                  <span>平 '. $row["draw"] .'</span>
                  <span>负 '. $row["defeat"] .'</span>';
    }
    $info .='                      
              <span>胜 '. $row["victory1"] .'</span>
              <span>平 '. $row["draw1"] .' </span>
              <span>负 '. $row["defeat1"] .'</span>
                                  
             </td>
             <td class="num">'. $row["num"] .'人竞猜</td>
            </tr>
           ';    
  } 
  mysqli_close($link); 
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
    function clickMore(id){
      $(".more"+id).toggle( );
      $( "#arrow"+id).toggleClass( "arrow1" ); 
    }   
</script>

