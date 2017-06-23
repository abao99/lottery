<?php
  class car {
    //== 成員 ==
    //property 屬性 & method 方法
    
    //public 成員可以由所有使用物件的地方自由呼叫
    //private 成員則限制在類別中呼叫，也就是類別的成員才可以使用 private 成員
    //        使用 private 成員可達到把資料封裝 (encapsulation) 的目的，此為物件導向程式設計 (object-oriented programming) 的主要特性之一
    //protected 成員的使用範圍與 private 成員相同，但是 private 成員不能被繼承 (inheritance) ， protected 成員則可以被繼承。
    
    //property 屬性
    public $name;
    public $company;
    public $color;
    public $engine;
    public $oil;  //一公升油可跑的公里數
    
    //method 方法
    function __construct() {  //建構子
      $this->name = 'undefine';
      $this->company = 'undefine';
      $this->color = 'undefine';
      $this->engine = 0;
      $this->oil = 0;
    }
    
    function set($n,$cp,$co,$eg, $ol) {
      $this->name = $n;
      $this->company = $cp;
      $this->color = $co;
      $this->engine = $eg;
      $this->oil = $ol;
    }
    
    function get() {
      return array($this->name, $this->company, $this->color, $this->engine, $this->oil);
    }
    
    function toString() {
      return '車名:'.$this->name.', 廠牌:'.$this->company.', 顏色:'.$this->color.', cc數:'.$this->engine. ' 每公升跑'.$this->oil.'公里';
    }
    
    function oil($d) {  //要花費多少公升的油  $d: 公里數
      return '行駛'.$d.'公里要耗費 '.$d/$this->oil.'公升的油';
    }
  }
  
  $ms = new car();
  $ms->set('Levante','Maserati','白',3000,10);
  $bossCar = $ms->get();
  print_r($bossCar);
  echo '<hr>';
  echo $ms->toString().'<hr>';
  echo $ms->oil(50);
  
  //繼承
  class car_jp extends car { 
    function toString() {
      return 'name:'.$this->name.', company:'.$this->company.', color:'.$this->color.', cc:'.$this->engine. ' run:'.$this->oil.' km';
    }
  }
  
  $takumi = new car_jp();
  $takumi->set('AE86','Toyota','black&white',1600,6);
  echo '<hr>';
  echo $takumi->toString();

 ?>
