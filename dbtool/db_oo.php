<?php
class db{
  public $servername ="";
  public $username="";//root
  public $password="";
  public $database="";


  function __construct(){
    $this-> sql_connect();
    $this-> db_encode();
  }
  
  function sql_connect(){
    return mysqli_connect($this->servername,$this->username,$this->password,$this->database);
  }
  
  function db_encode(){
    return mysqli_query("set names utf8");
  }
  
  
}
?>