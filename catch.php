<?php
//抓資料
function lottery($link){	//$link:連線資料
  
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

  //抓日期資料
  preg_match_all('/<td colspan="6"><span class="moreIcon"><\/span>(.*?)每次竞猜选择一个选项下注/',$tbody[0][0],$date,PREG_PATTERN_ORDER);

  //抓一天賽事
  for($i=1; $i<=count($date[1]); $i++) {
    preg_match_all('/<tr class="moreContent more'.$i.'" style="display: table-row">(.*?)<\/tr>/',$tbody[0][0],$day,PREG_PATTERN_ORDER);
    $data[$date[1][$i-1]] = game($day,$i,$date,$link);	//抓資料存資料庫	tbodydata: 原始要分析的html資料 , $d: 第幾天 , $date:日期資料 ,$link:連線資料
  }
  return $data;//回傳抓到的資料
} 

//抓資料存資料庫	
function game($tbodydata,$d,$date,$link){    //$tbodydata: 原始要分析的html資料 , $d: 第幾天 , $date:日期資料 ,$link:連線資料
  $count1 =count($tbodydata[1]);  //計算那天有幾場賽事
  $d=$d-1;					
	$data = array();

	for($i=0;$i<$count1;$i++){	//$i 第幾場賽事
     
    $data[$d][$i]["date"] = $date[1][$d]; // 存時間到date
    
		//抓賽事,存到 data[] 
		preg_match_all('/color: #ffffff\'>(.*?)<\/span><\/td>/',$tbodydata[1][$i],$race,PREG_PATTERN_ORDER);
    if(isset($race[1][0])){
      $data[$d][$i]["race"]=$race[1][0];
    }
    else{
      preg_match_all('/color: #FFFFFF\'>(.*?)<\/span><\/td>/',$tbodydata[1][$i],$race,PREG_PATTERN_ORDER);
      $data[$d][$i]["race"]=$race[1][0];
    }
    
		//抓主隊
		preg_match_all('/<span class="ht">(.*)<\/span>vs/',$tbodydata[1][$i],$host,PREG_PATTERN_ORDER);
		$data[$d][$i]["host"]=$host[1][0];

		//抓客隊
		preg_match_all('/<span class="at">(.*?)<\/span>/',$tbodydata[1][$i],$visite,PREG_PATTERN_ORDER);
		$data[$d][$i]["visite"]=$visite[1][0];
	
		//抓時間
		preg_match_all('/<td class="time">(.*?)<\/td>/',$tbodydata[1][$i],$time,PREG_PATTERN_ORDER);
		$data[$d][$i]["time"]=$time[1][0];
		
		//抓讓球.盤口
		preg_match_all('/<span class="rq2".*?>(.*?)<\/span>/',$tbodydata[1][$i],$concede,PREG_PATTERN_ORDER);
		$data[$d][$i]["concede"]=$concede[1][0];		

		//抓勝
		preg_match_all('/<span>胜(.*?)<input/',$tbodydata[1][$i],$victory,PREG_PATTERN_ORDER);
		
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
		preg_match_all('/<span>平 (.*?)<input/',$tbodydata[1][$i],$draw,PREG_PATTERN_ORDER);
		
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
		preg_match_all('/<span>负(.*?)<input/',$tbodydata[1][$i],$defeat,PREG_PATTERN_ORDER);
		
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
		preg_match_all('/<td class="num">(.*?)人竞猜<\/td>/',$tbodydata[1][$i],$num,PREG_PATTERN_ORDER);
		$data[$d][$i]["num"]=$num[1][0];
	}//end for
  return $data; //回傳抓到的資料
}//end fouction	

?>