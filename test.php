<?php
$url="http://www.kufa88.com/Promotion/jingcai"; //您想抓取的網址
$buffer = file($url); //將網址讀入buffer變數
	for($i=0;$i<sizeof($buffer);$i++) {//將每段文字讀出來,以換行為單位,sizeof會傳回共有幾筆
		
		//抓日期資料
		$d=strpos($buffer[$i],"每次竞猜选择一个选项下注"); //檢查要找的字,是否存在跟位置，判斷在哪一行
		if($d !== false){

			$date[]=substr($buffer[$i],$d-11,11); //11是日期的長度
		}

		//抓賽事
		$r=strpos($buffer[$i],"color: #ffffff"); //檢查要找的字,是否存在跟位置
		if($r !== false){
			$r1=strpos($buffer[$i],"</span>");//找結束位置
			$race[]=substr($buffer[$i],$r+16,$r1-($r+16)); 
		}

		//抓主隊
		$h=strpos($buffer[$i],'class="ht"'); //檢查要找的字,是否存在跟位置
		if($h !== false){
			$h1=strpos($buffer[$i],"</span>vs");//找結束位置
			$host[]=substr($buffer[$i],$h+11,$h1-($h+11)); 
		}
		
		//抓客隊
		$v=strpos($buffer[$i],'class="at"'); //檢查要找的字,是否存在跟位置
		if($v !== false){
			$v1=strpos($buffer[$i],"</span>");//找結束位置
			$visite[]=substr($buffer[$i],$v+11,$v1-($v+7)); //
		}

		//抓時間
		$t=strpos($buffer[$i],'class="time"'); //檢查要找的字,是否存在跟位置
		if($t !== false){
			
			$time[]=substr($buffer[$i],$t+13,5); //
		}

		//抓讓球
		$c=strpos($buffer[$i],'class="rq2"'); //檢查要找的字,是否存在跟位置
		if($c !== false){
			$c1=strpos($buffer[$i],'">');//找開始位置
			
			$concede[]=substr($buffer[$i],$c1+2,2); //
		}
		
	}
	echo $concede[1]."<br>";
	
?>