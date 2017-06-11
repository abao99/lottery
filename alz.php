<?php
  include('catch.php'); //抓資料
  include('./dbtool/dbtool.php'); //資料庫連線
  
  $link = connection(); //資料庫連線
  
  $data =lottery($link);//抓資料，$link:連線資料
  
  $alz=alz($data,$link);  //分析資料 $data:抓到的資料 $link:連線資料 $alz:紀錄更新資料的id & 新增幾筆資料

  if(isset($alz["updateId"][0])) {      //有更新資料 $alz["updateId"][0]:有更新資料的id
    $count = count($alz["updateId"]);   //更新幾筆資料
    
    //$sql_update:更新資料SQL字串
    $sql_update= "select 
                    * 
                  from 
                    game 
                  where";
    
    for($i=0; $i<$count;$i++){          //哪幾筆資料有更新
     if($i != ($count-1)){
      $sql_update.=" id = ".$alz["updateId"][$i]." or";
     }
     else{
      $sql_update.=" id = ".$alz["updateId"][$i]."";
     }
    }

    $sql_update.= " ORDER BY 
                     date , time;";

    $result = mysqli_query($link,$sql_update);
    $row = mysqli_fetch_assoc($result);   //把資料存成JASON格式
    do{
      $rowarray[] = $row;
    }
    while ( $row = mysqli_fetch_assoc($result));{
      echo json_encode($rowarray);
    }
  }

  if(isset($alz["insertNumber"][0])){ //判斷有沒有新增資料 $alz["insertNumber"][0]: 新增幾筆資料
    $sql_insert= "select 
                  * 
                from 
                  game 
                ORDER BY 
                  id
                  DESC
                limit
                  ".$alz["insertNumber"][0].";";

    $result1 = mysqli_query($link,$sql_insert);
   
    $row1 = mysqli_fetch_assoc($result1);
    do{
      $rowarray1[] = $row1;
    }
    while ( $row1 = mysqli_fetch_assoc($result1));{
      echo json_encode($rowarray1);
    }
  }
    mysqli_close($link); 

//更新&新增資料
function alz($data,$link){   //$data:資料 $link:連線資料
  $sql_insert = "INSERT INTO game (date, race, host, visite, time, concede, victory, victory1, draw, draw1, defeat, defeat1, num) 
                 VALUES ";
   
  $flag = 0; //判斷資料有沒有新增
  $count =0;  // 新增幾筆資料
  $alz = array(); //紀錄更新資料的id & 新增幾筆資料
  foreach($data as $k => $v){   
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
              
        if($row != null){  //資料存在，更新
          if($row["num"] != $data[$k][$d][$i]["num"]){
            $sql_update ="UPDATE 
                            game 
                          SET 
                            num='".$data[$k][$d][$i]['num']."' 
                          WHERE 
                            id='".$row['id']."'"; //更新競猜人數
               
            mysqli_query($link, $sql_update);
            
            $alz["updateId"][]= $row["id"]; //紀錄更新資料的id
          }
        }
        else{         //資料不存在，新增
          $flag = 1;  //判斷有沒有新增資料
          $count++;   //計算新增幾筆資料
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
    if($flag == 1){   //有新增資料
      $sql_insert = substr($sql_insert, 0, -1); //刪掉,  
      mysqli_query($link, $sql_insert); //新增資料

      $alz["insertNumber"][] = $count;  //記錄新增幾筆資料
    }
  return $alz; //回傳紀錄更新資料的id & 新增幾筆資料
}//end fouction
?>


