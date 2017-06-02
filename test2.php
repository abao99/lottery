<?php

$url = "http://www.kufa88.com/Promotion/jingcai";
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
echo $date[1][0];	

//抓第一天賽事
preg_match_all('/<tr class="moreContent more1" style="display: table-row">(.*?)<\/tr>/',$tbody[0][0],$day1,PREG_PATTERN_ORDER);
//echo $day1[1][1]."<br>";

$count =count($day1[1]);
for($i=0;$i<$count;$i++){

	//抓賽事
	preg_match_all("/color: #ffffff'>(.*?)<\/span><\/td>/",$day1[1][$i],$race,PREG_PATTERN_ORDER);
	echo $race[1][0]."<br>";

	//抓主隊
	preg_match_all('/<span class="ht">(.*)<\/span>vs/',$day1[1][$i],$host,PREG_PATTERN_ORDER);
	echo $host[1][0]."<br>";

	//抓客隊
	preg_match_all('/<span class="at">(.*?)<\/span>/',$day1[1][$i],$visite,PREG_PATTERN_ORDER);
	echo $visite[1][0]."<br>";

	//抓時間
	preg_match_all('/<td class="time">(.*?)<\/td>/',$day1[1][$i],$time,PREG_PATTERN_ORDER);
	echo $time[1][0]."<br>";

	//抓讓球
	preg_match_all('/<span class="rq2"(.*?)<\/span>/',$day1[1][$i],$concede,PREG_PATTERN_ORDER);
	echo $concede[0][0]."<br>";

	//抓勝
	preg_match_all('/<span>胜(.*?)<input/',$day1[1][$i],$victory,PREG_PATTERN_ORDER);
	echo $victory[1][0]."<br>";

	//抓平
	preg_match_all('/<span>平(.*?)<input/',$day1[1][$i],$draw,PREG_PATTERN_ORDER);
	echo $draw[1][0]."<br>";

	//抓负
	preg_match_all('/<span>负(.*?)<input/',$day1[1][$i],$defeat,PREG_PATTERN_ORDER);
	echo $defeat[1][0]."<br>";

	//抓人數
	preg_match_all('/<td class="num">(.*?)<\/td>/',$day1[1][$i],$num,PREG_PATTERN_ORDER);
	echo $num[1][0]."<br>";
}


?>