<?php
$url="http://www.kufa88.com/Promotion/jingcai"; //您想抓取的網址
$buffer = file($url); //將網址讀入buffer變數
	for($i=0;$i<sizeof($buffer);$i++) {//將每段文字讀出來,以換行為單位,sizeof會傳回共有幾筆
		
		//抓日期資料
		$d=strpos($buffer[$i],"每次竞猜选择一个选项下注"); //檢查要找的字,是否存在跟位置，判斷在哪一行
		if($d !== false){

			//$date[]=substr($buffer[$i],$d-11,11); 11是日期的長度
			preg_match_all("/<\/span>(.*)每次竞猜选择一个选项下注/",$buffer[$i],$date1,PREG_PATTERN_ORDER);
			$date[]=$date1[1][0];
		}

		//抓賽事
		$r=strpos($buffer[$i],"color: #ffffff"); //檢查要找的字,是否存在跟位置
		if($r !== false){
			/*$r1=strpos($buffer[$i],"</span>");//找結束位置
			$race[]=substr($buffer[$i],$r+16,$r1-($r+16)); */
			preg_match_all("/color: #ffffff'>(.*)<\/span>/",$buffer[$i],$r1,PREG_PATTERN_ORDER);
			$race[]=$r1[1][0];
		}

		//抓主隊VS客隊
		$h=strpos($buffer[$i],'class="ht"'); //檢查要找的字,是否存在跟位置
		if($h !== false){
			/*$h1=strpos($buffer[$i],"</span>vs");//找結束位置
			$host[]=substr($buffer[$i],$h+11,$h1-($h+11));*/
			preg_match_all('/<span class="ht">(.*)<\/span>/',$buffer[$i],$h1,PREG_PATTERN_ORDER);
			$host[]=$h1[1][0]; 
		}

		//抓時間
		$t=strpos($buffer[$i],'class="time"'); //檢查要找的字,是否存在跟位置
		if($t !== false){
			
			//$time[]=substr($buffer[$i],$t+13,5); 
			preg_match_all('/class="time">(.*)<\/td>/',$buffer[$i],$t1,PREG_PATTERN_ORDER);
			$time[]=$t1[1][0];
		}

		//抓讓球
		$c=strpos($buffer[$i],'class="rq2"'); //檢查要找的字,是否存在跟位置
		if($c !== false){
			/*
			$c1=strpos($buffer[$i],'">');//找開始位置
			$concede[]=substr($buffer[$i],$c1+2,2); //
			*/
			preg_match_all('/[0-9]/',$buffer[$i],$c1,PREG_PATTERN_ORDER);
			$concede[]=$c1[1][0];
		}

		//主勝
		$victory1=strpos($buffer[$i],'<span>胜'); //檢查要找的字,是否存在跟位置
		if($victory1 !== false){
			
			$victory[]=substr($buffer[$i],$victory1+9,5); //
		}

		//平局
		$draw1=strpos($buffer[$i],'<span>平'); //檢查要找的字,是否存在跟位置
		if($draw1 !== false){
			
			$draw[]=substr($buffer[$i],$draw1+9,5); //
		}

		//負
		$defeat1=strpos($buffer[$i],'<span>负'); //檢查要找的字,是否存在跟位置
		if($defeat1 !== false){
			
			$defeat[]=substr($buffer[$i],$defeat1+9,5); //
		}

		//競猜人數
		$num1=strpos($buffer[$i],'class="num"'); //檢查要找的字,是否存在跟位置
		if($num1 !== false){
			
			$num2=strpos($buffer[$i],'</td>');
			$num[]=substr($buffer[$i],$num1+12,$num2-($num1+10)); //
		}
		
	}
	echo $date[0]."<br>";
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>lottery</title>
</head>
<body>
	<table>
  		<tr>
		    <th>赛事</th>
		    <th> 主队   vs   客队</th>
		    <th>截止</th>
		    <th>让球</th>
		    <th>主胜</th>
		    <th>平局</th>
		    <th>客胜</th>
		    <th>竞猜人数</th>
  		</tr>
  		
	</table>
	<table>
		<tr>
    		<td colspan="8">
    			<?php echo $date[0]; ?>		
    		</td>
  		</tr>

		<tr>
			<td rowspan="2">
				<?php echo $race[0]; ?>
			</td>
			
			<td rowspan="2">
				<?php echo $host[0]  ?>
			</td>
			
			<td rowspan="2">
				<?php echo $time[0]; ?>
			</td>
					
			<td>
				0
			</td>
				
			<td>
				<?php echo "胜".$victory[0]; ?>
			</td>
			
			<td>
				<?php echo "平".$draw[0]; ?>
			</td>
			
			<td>
				<?php echo "负".$defeat[0]; ?>
			</td>
			
			<td rowspan="2">
				<?php echo $num[0]; ?>
			</td>
		</tr>

		<tr>
			<td>
				<?php echo $concede[0]; ?>
			</td>
			<td>
				<?php echo "胜".$visite[0]; ?>
			</td>
			<td>
				<?php echo "平".$draw[0]; ?>
			</td>
			<td>
				<?php echo "负".$defeat[0]; ?>
			</td>
		</tr>
	</table>

</body>
</html>