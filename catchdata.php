<?php
$url = "http://www.kufa88.com/Promotion/jingcai"; //足球
//$url = "http://localhost/source3.html"; //NBA
//$url = "http://localhost/source4.html"; //足球
$arr= file_get_contents($url); //抓網站內容到變數

//取消換行
$str = $arr;
$order   = array("\r\n", "\n", "\r");
$replace = "";
$newarr = str_replace($order, $replace, $str);

//抓tbody內容
preg_match_all('/<tbody>(.*)<\/tbody>/',$newarr,$tbody,PREG_PATTERN_ORDER);
//echo $tbody[1][0];

//抓日期資料
preg_match_all('/<td colspan="6"><span class="moreIcon"><\/span>(.*?)每次竞猜选择一个选项下注/',$tbody[0][0],$date,PREG_PATTERN_ORDER);
//echo $date[1][0]."<br>";

//抓一天賽事
for($i=1; $i<=count($date[1]); $i++) {
  preg_match_all('/<tr class="moreContent more'.$i.'" style="display: table-row">(.*?)<\/tr>/',$tbody[0][0],$day,PREG_PATTERN_ORDER);
 
  echo $date[1][$i-1]."<br>";
  game($day,$i);		

}

function game($game,$d){
		$count1 =count($game[1]);
    $count2 = $count1-1;
		$d=$d-1;					//$d 第幾天
		$data = array();
    global $date;



	for($i=0;$i<$count1;$i++){	//$i 第幾場賽事
    
		//抓賽事,存到 data[] 
		preg_match_all('/color: #ffffff\'>(.*?)<\/span><\/td>/',$game[1][$i],$race,PREG_PATTERN_ORDER);
    if(isset($race[1][0])){
      $data[$d][$i]["race"]=$race[1][0];
    }
    else{
      preg_match_all('/color: #FFFFFF\'>(.*?)<\/span><\/td>/',$game[1][$i],$race,PREG_PATTERN_ORDER);
      $data[$d][$i]["race"]=$race[1][0];
    }
		
		
		//抓主隊
		preg_match_all('/<span class="ht">(.*)<\/span>vs/',$game[1][$i],$host,PREG_PATTERN_ORDER);
		$data[$d][$i]["host"]=$host[1][0];

		//抓客隊
		preg_match_all('/<span class="at">(.*?)<\/span>/',$game[1][$i],$visite,PREG_PATTERN_ORDER);
		$data[$d][$i]["visite"]=$visite[1][0];
	
		//抓時間
		preg_match_all('/<td class="time">(.*?)<\/td>/',$game[1][$i],$time,PREG_PATTERN_ORDER);
		$data[$d][$i]["time"]=$time[1][0];
		
		//抓讓球.盤口
		preg_match_all('/<span class="rq2".*?>(.*?)<\/span>/',$game[1][$i],$concede,PREG_PATTERN_ORDER);
		$data[$d][$i]["concede"]=$concede[1][0];		

		//抓勝
		preg_match_all('/<span>胜(.*?)<input/',$game[1][$i],$victory,PREG_PATTERN_ORDER);
		
      $counter=count($victory[1]);//判斷有幾筆資料

      if($counter>1){           
        $data[$d][$i]["victory"]=$victory[1][0];
        $data[$d][$i]["victory1"]=$victory[1][1];
      }
      else{
        $data[$d][$i]["victory"]=" ";
        $data[$d][$i]["victory1"]=$victory[1][0];
      }
		
		//抓平
		preg_match_all('/<span>平 (.*?)<input/',$game[1][$i],$draw,PREG_PATTERN_ORDER);
		
      $counter=count($draw[1]);

      if($counter>1){
        $data[$d][$i]["draw"]=$draw[1][0];
        $data[$d][$i]["draw1"]=$draw[1][1];
      }
      else{
        $data[$d][$i]["draw"]="";
        $data[$d][$i]["draw1"]=$draw[1][0];
      }

		//抓负
		preg_match_all('/<span>负(.*?)<input/',$game[1][$i],$defeat,PREG_PATTERN_ORDER);
		
      $counter=count($defeat[1]);

      if($counter>1){
        $data[$d][$i]["defeat"]=$defeat[1][0];
        $data[$d][$i]["defeat1"]=$defeat[1][1];
      }
      else{
        $data[$d][$i]["defeat"]="";
        $data[$d][$i]["defeat1"]=$defeat[1][0];
      }

		//抓人數
		preg_match_all('/<td class="num">(.*?)<\/td>/',$game[1][$i],$num,PREG_PATTERN_ORDER);
		$data[$d][$i]["num"]=$num[1][0];
	}//end for
			
  $link = mysqli_connect('localhost','root','123456','lottery') // 連資料庫
			or die("error".mysqli_connect_error());
  mysqli_query($link,"set names utf8");

  $sql_insert = "INSERT INTO game (date, race, host, visite, time, concede, victory, victory1, draw, draw1, defeat, defeat1, num) VALUES ";
	 
	foreach($data as $d => $v) {  //$d日期
    	
    	foreach($v as $i => $v2) {  //$i那天第幾場賽事資料
           
           
        $sql = "select * from game where date = '".$date[1][$d]."' and      
                                   race = '".$data[$d][$i]["race"]."' and
                                   host ='".$data[$d][$i]["host"]."' and
                                   visite ='".$data[$d][$i]["visite"]."';";
        
        $result = mysqli_query($link,$sql);//查詢判斷重複 
        $row = mysqli_fetch_array($result);
        $rowarray[0] = $row;      //資料存到$rowarry陣列
        //print_r($row);
        
         if($rowarray[0] != null){  //資料存在，更新
           
            $sql_update = "UPDATE game SET num='".$data[$d][$i]['num']."' WHERE id='".$rowarray[0]['id']."'"; //更新競猜人數
            mysqli_query($link, $sql_update);
            
          }
          else{       //資料不存在，新增
            $sql_insert .= "('".$date[1][$d]."',
                               '".$data[$d][$i]["race"]."',
                               '".$data[$d][$i]["host"]."',
                               '".$data[$d][$i]["visite"]."',
                               '".$data[$d][$i]["time"]."',
                               '".$data[$d][$i]["concede"]."',
                               '".$data[$d][$i]["victory"]."',
                               '".$data[$d][$i]["victory1"]."',
                               '".$data[$d][$i]["draw"]."',
                               '".$data[$d][$i]["draw1"]."',
                               '".$data[$d][$i]["defeat"]."',
                               '".$data[$d][$i]["defeat1"]."',
                               '".$data[$d][$i]["num"]."'
                              ),";
          }//end else
    	}//end foreach $v
  	}//end foreach $data 
    
    $sql_insert = substr($sql_insert, 0, -1); //刪掉,  
    mysqli_query($link, $sql_insert); //新增資料
    
   mysqli_close($link);
}//end fouction

?>
