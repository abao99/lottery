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
    $data[$date[1][$i-1]]=game($day,$i,$date,$link);	//抓資料存資料庫	
  }
  return $data;
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
		preg_match_all('/<td class="num">(.*?)<\/td>/',$tbodydata[1][$i],$num,PREG_PATTERN_ORDER);
		$data[$d][$i]["num"]=$num[1][0];
	}//end for
  return $data;
}//end fouction	

//更新&新增資料
function alz($data,$link){	 //$data:資料 $link:連線資料
  $sql_insert = "INSERT INTO game (date, race, host, visite, time, concede, victory, victory1, draw, draw1, defeat, defeat1, num) 
                 VALUES ";
	 
  $flag = 0; //判斷資料有沒有新增
  $count =0;// 新增幾筆資料
  $alz = array();
  foreach($data as $k => $v){   //哪一天 
    foreach($v as $d => $v1) {  //$d日期
        
      foreach($v1 as $i => $v2) {  //$i那天第幾場賽事資料

        $sql = "select 
                  * 
                from 
                  game 
                where 
                  date = '".$data[$k][$d][$i]["date"]."' and      
                  race = '".$data[$k][$d][$i]["race"]."' and
                  host ='".$data[$k][$d][$i]["host"]."' and
                  visite ='".$data[$k][$d][$i]["visite"]."';";
          
        $result = mysqli_query($link,$sql);//查詢判斷重複 
        $row = mysqli_fetch_array($result);//資料存到$row陣列
        $total_records = mysqli_num_rows($result);     
          
        if($row != null){  //資料存在，更新
          if($row["num"] != $data[$k][$d][$i]["num"]){
            $sql_update = "UPDATE 
                            game 
                          SET 
                            num='".$data[$k][$d][$i]['num']."' 
                          WHERE 
                            id='".$row['id']."'"; //更新競猜人數
               
            mysqli_query($link, $sql_update);
            $alz["updateId"][]= $row["id"];
          }
        }
        else{       //資料不存在，新增
          $flag = 1;
          $count++;
          $sql_insert .= "('".$data[$k][$d][$i]["date"]."',
                          '".$data[$k][$d][$i]["race"]."',
                          '".$data[$k][$d][$i]["host"]."',
                          '".$data[$k][$d][$i]["visite"]."',
                          '".$data[$k][$d][$i]["time"]."',
                          '".$data[$k][$d][$i]["concede"]."',
                          '".$data[$k][$d][$i]["victory"]."',
                          '".$data[$k][$d][$i]["victory1"]."',
                          '".$data[$k][$d][$i]["draw"]."',
                          '".$data[$k][$d][$i]["draw1"]."',
                          '".$data[$k][$d][$i]["defeat"]."',
                          '".$data[$k][$d][$i]["defeat1"]."',
                          '".$data[$k][$d][$i]["num"]."'
                         ),";
        }//end else
      }//end foreach $v
    }//end foreach $data 
  }
    if($flag == 1){
      $sql_insert = substr($sql_insert, 0, -1); //刪掉,  
      mysqli_query($link, $sql_insert); //新增資料
      
      $total_records += $count;
      $alz["insertNumber"][] = $total_records;
    }
  return $alz;
}//end fouction

?>