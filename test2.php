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

		//抓賽事
		preg_match_all('/color: #FFFFFF\'>(.*?)<\/span><\/td>/',$game[1][$i],$race,PREG_PATTERN_ORDER);
		//echo $race[1][0].",";
		$data[$d][$i]["race"]=$race[1][0];
		//echo $data[$d][$i]["race"].",";
		
		//抓主隊
		preg_match_all('/<span class="ht">(.*)<\/span>vs/',$game[1][$i],$host,PREG_PATTERN_ORDER);
		//echo $host[1][0].",";
		$data[$d][$i]["host"]=$host[1][0];
		//echo $data[$d][$i]["host"].",";
	

		//抓客隊
		preg_match_all('/<span class="at">(.*?)<\/span>/',$game[1][$i],$visite,PREG_PATTERN_ORDER);
		//echo $visite[1][0].",";
		$data[$d][$i]["visite"]=$visite[1][0];
		//echo $data[$d][$i]["visite"].",";
	

		//抓時間
		preg_match_all('/<td class="time">(.*?)<\/td>/',$game[1][$i],$time,PREG_PATTERN_ORDER);
		//echo $time[1][0].",";
		$data[$d][$i]["time"]=$time[1][0];
		//echo $data[$d][$i]["time"].",";
		
		//抓讓球.盤口
		preg_match_all('/<span class="rq2".*?>(.*?)<\/span>/',$game[1][$i],$concede,PREG_PATTERN_ORDER);
		//echo $concede[1][0].",";
		$data[$d][$i]["concede"]=$concede[1][0];		
		//echo $data[$d][$i]["concede"].",";

		//抓勝
		preg_match_all('/<span>胜(.*?)<input/',$game[1][$i],$victory,PREG_PATTERN_ORDER);
		
		$counter=count($victory[1]);

		if($counter>1){
			$data[$d][$i]["victory"]=$victory[1][0];
			$data[$d][$i]["victory1"]=$victory[1][1];
		}
		else{
			$data[$d][$i]["victory"]="";
			$data[$d][$i]["victory1"]=$victory[1][0];
		}
		//echo "勝".$data[$d][$i]["victory"].","."勝".$data[$d][$i]["victory1"];
		
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
		//echo "平".$data[$d][$i]["draw"].","."平".$data[$d][$i]["draw1"];

		
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
		//echo "负".$data[$d][$i]["defeat"].","."负".$data[$d][$i]["defeat1"];

		//抓人數
		preg_match_all('/<td class="num">(.*?)<\/td>/',$game[1][$i],$num,PREG_PATTERN_ORDER);
		$data[$d][$i]["num"]=$num[1][0];
		//echo $data[$d][$i]["num"]."<br>";
		//echo $num[1][0]."<br>";
			
	}
			
  $link = mysqli_connect('localhost','root','123456','lottery') // 連資料庫
			or die("error".mysqli_connect_error());
  mysqli_query($link,"set names utf8");

 
                                     // 查詢判斷重複
  $sql_insert = "INSERT INTO game (date, race, host, visite, time, concede, victory, victory1, draw, draw1, defeat, defeat1, num) VALUES ";
	 
	foreach($data as $d => $v) {
    	
    	foreach($v as $i => $v2) {
               
        $sql = "select * from game where date = ".$date[1][$d]." and      
                                   race =".$data[$d][$i]["race"]." and
                                   host =".$data[$d][$i]["host"]." and
                                   visite =".$data[$d][$i]["visite"]." and
                                   time =".$data[$d][$i]["time"];
        
        $result = mysqli_query($link,$sql);//查詢判斷重複 

        //把資料存到rowarry陣列
        $row[] = mysqli_fetch_assoc($result); 
        
         if($result){
            
            echo "a";
           // $sql_update = "UPDATE game SET num=".$data[$d][$i]['num']." WHERE id=."$rowarray[$j]['id'];
           // mysqli_query($link, $sql_update);
            
          }// end if
          else{
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
       //substr($query, 0, -1);

    	}//end foreach $v
  	}//end foreach $data 
    $sql_insert = substr($sql_insert, 0, -1);    
    echo $sql_insert."<br>";
    //echo $sql_update."<br>";
    mysqli_query($link, $sql_insert);
    
   mysqli_close($link);
}//end fouction


/*
echo $data[$d][$i]["race"].",";
    		echo $data[$d][$i]["host"].",";
    		echo $data[$d][$i]["visite"].",";
    		echo $data[$d][$i]["time"].",";
    		echo $data[$d][$i]["concede"].",";
    		echo "勝".$data[$d][$i]["victory"].",";
    		echo "勝".$data[$d][$i]["victory1"].",";
    		echo "平".$data[$d][$i]["draw"].",";
    		echo "平".$data[$d][$i]["draw1"].",";
    		echo "负".$data[$d][$i]["defeat"].",";
    		echo "负".$data[$d][$i]["defeat1"].",";
    		echo $data[$d][$i]["num"]."<br>";
        
        
        $rowarray[$j]["time"] != $data[$d][$i]["time"] &&
             $rowarray[$j]["concede"] != $data[$d][$i]["concede"] &&
             $rowarray[$j]["victory"] != $data[$d][$i]["victory"] &&
             $rowarray[$j]["victory1"] != $data[$d][$i]["victory1"] &&
             $rowarray[$j]["draw"] != $data[$d][$i]["draw"] &&
             $rowarray[$j]["draw1"] != $data[$d][$i]["draw1"] &&
             $rowarray[$j]["defeat"] != $data[$d][$i]["defeat"] &&
             $rowarray[$j]["defeat1"] != $data[$d][$i]["defeat1"] &&
             $rowarray[$j]["num"] != $data[$d][$i]["num"] 
             */
             
   
?>
