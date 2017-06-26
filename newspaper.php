<?php
  interface observer{
    public function Update();
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
      $index = array_search($name,$this->Observer);
      unset($this->Observer[$name]);
    }
    public function notify(){
      foreach($this->Observer as $name){
          $name-> Update();
      }  
    }
  }
  
  class customer implements observer{
    private $Cname;
    
    function __construct($name){
      $this->Cname = $name;
    }
    
    public function Update(){
      echo $this->Cname." update News<br>";
    }
  }
  
  $office = new newspaper();
  
  $lin = new customer("lin");
  $office->register($lin);
  $office->notify();
  
  $abao = new customer("abao");
  $office->register($abao);
  $office->notify();
?>