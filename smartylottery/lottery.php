
<?php
  require "main.php";
  include('./modules/catchdata.php');
  include('./modules/dbtool.php');
  
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
                     'J2联赛'=>'#22C126',
                     '亚洲杯预' => '#37BE5A',
                     '美公开杯' => '#B00900',
                     '联合会杯' => '#FF9900',
                     '欧青赛' => '#1b5a89',
                     '挪超' => '#CC631D',
                     '阿甲' => '#0CB9E4',
                     '日天皇杯' => '#003306',
                     'K联赛' => '#15DBAE',
                     '美职' => '#7D3052',
                     );
 
  $data=array();
  $dataitem =array();
  $resultdata=[];
  while($row = mysqli_fetch_array($result)) {
    array_push($dataitem,$row);
    $data["item"]=$dataitem;
    
    if($nowPrintDate == "" || $nowPrintDate != $row["date"]){
      $more++;
      $nowPrintDate = $row["date"];
      $data["date"]=$row["date"]; 
      $data["raceColor"]=$raceColor;
      $data["more"]=$more;
      
      array_push($resultdata,$data);
    }
    
  }
  //print_r($resultdata);
  mysqli_close($link); 
  $tpl->assign("forum", $resultdata);
  $tpl->display("lottery.html");
  
?>

