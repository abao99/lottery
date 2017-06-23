<?php
  interface observer{
    public function Update($msg);
  }
  
  abstract class Subject{
    public function register(observer $name){}
    public function remove(observer $name){}
    public function notify(){}
  }
  
  class newspaper extends Subject{
    private $Observer=[];
   
    
    public function register(observer $name){
      $this->Observer[] = $name;
      print_r($this->Observer);
    }
    public function remove(observer $name){
      unset($this->Observer[$name]);
    }
    public function notify(observer $name){
      $name-> Update("new one...");
    }
  }
  
  class customer implements observer{
    private $Cname;
    
    function __construct($name){
      $this->Cname = $name;
    }
    
    public function Update($msg){
      echo $this->Cname." update News ".$msg."<br>";
    }
  }
  
  $office = new newspaper();
  
  $lin = new customer("lin");
  $office->register($lin);
  $office->notify();
?>