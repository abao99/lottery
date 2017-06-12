<?php
  include('./dbtool/dbtool.php');
  
  $link = connection(); //資料庫連線

  $sql = "";  //存搜尋字串
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
  }
  else{
    $sql.= "select 
              * 
            from 
              game 
            where";
            if($_POST["dateStart"] != "" and $_POST["dateEnd"] == ""){
              $sql.=" date = '".$_POST["dateStart"]."' and";
            }
            if($_POST["dateStart"] == "" and $_POST["dateEnd"] != ""){
              $sql.=" date = '".$_POST["dateEnd"]."' and";
            }
            if($_POST["dateStart"] != "" and $_POST["dateEnd"] != ""){
              $sql.=" date >= '".$_POST["dateStart"]."' and
                      date <= '".$_POST["dateEnd"]."' and";
            }
            if($_POST["race"] !=""){
              $sql.=" race = '".$_POST["race"]."' and";
            }
            if($_POST["host"] !=""){
              $sql.=" host = '".$_POST["host"]."' and";
            }
            if($_POST["visite"] != ""){
              $sql.=" visite = '".$_POST["visite"]."' and";
            }

    $sql = substr($sql, 0, -3); //刪掉and  
    
    $sql .="ORDER BY 
              date , time;"; 
    
  } 

  $result = mysqli_query($link,$sql);//查詢判斷重複 

  while( $row = mysqli_fetch_assoc($result)){
    $rowarray[] = $row;
  }
    
  echo json_encode($rowarray);
  
  mysqli_close($link);  
?>
