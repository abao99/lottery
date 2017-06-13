<?php
  include('./dbtool/dbtool.php');
  
  $link = connection(); //資料庫連線

  $sql = "";  //存搜尋字串
  $sql_sub = "";//存搜尋條件字串
  
  if(empty($_POST["hide"] )){ //判斷是不是第一次執行
    $todate=date("Y-m-d");     //今天日期

    $sql = "select 
              * 
            from 
              game 
            where 
              date >='".$todate."' 
            ORDER BY 
              date , time;"; 
              
    $result = mysqli_query($link,$sql);//查詢 
  }
  else{
              
    $sql.= "select 
              * 
            from 
              game 
            where";
            if($_POST["dateStart"] != "" and $_POST["dateEnd"] == ""){
              $sql_sub.=" date = '".$_POST["dateStart"]."' and";
            }
            else if($_POST["dateStart"] == "" and $_POST["dateEnd"] != ""){
              $sql_sub.=" date = '".$_POST["dateEnd"]."' and";
            }
            else if($_POST["dateStart"] != "" and $_POST["dateEnd"] != ""){
              $sql_sub.=" date >= '".$_POST["dateStart"]."' and
                      date <= '".$_POST["dateEnd"]."' and";
            }
            if($_POST["race"] !=""){
              $sql_sub.=" race = '".$_POST["race"]."' and";
            }
            if($_POST["host"] !=""){
              $sql_sub.=" host = '".$_POST["host"]."' and";
            }
            if($_POST["visite"] != ""){
              $sql_sub.=" visite = '".$_POST["visite"]."' and";
            }

    $sql_sub = substr($sql_sub, 0, -3); //刪掉and  
    
    $sql .= $sql_sub;
    $sql .="ORDER BY 
              date , time;"; 
    
    if($sql_sub != "")
      $result = mysqli_query($link,$sql);//查詢
  } 

  while( $row = mysqli_fetch_assoc($result)){
    $rowarray[] = $row; 
  }
      
  echo json_encode($rowarray);
  
  mysqli_close($link);  
?>
