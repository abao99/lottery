<?php
$url="http://www.kufa88.com/Promotion/jingcai"; //您想抓取的網址
$buffer = file($url); //將網址讀入buffer變數
	for($i=0;$i<sizeof($buffer);$i++) {//將每段文字讀出來,以換行為單位,sizeof會傳回共有幾筆
		
		$d=strpos($buffer[$i],"每次竞猜选择一个选项下注"); //檢查要找的字,是否存在跟位置
		if($d !== false){

			$date[]=substr($buffer[$i],$d-11,11); //11是日期的長度
			//utf-8 轉 big5
			//$title=iconv("UTF-8","big5",$title);	
		}
			
	}
	echo $date[1]."<br>";
	
?>