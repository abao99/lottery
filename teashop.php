<?php
  interface maketea{
    public function addmaterial();
    public function brew();
    public function pouredcup();
  }
  
  class redtea implements maketea{
    public function addmaterial(){
      echo "加料red<br>";
    }
    public function brew(){
      echo "沖泡red<br>";
    }
    public function pouredcup(){
      echo "裝杯red<br>";
    }
  }
  
  class milktea implements maketea{
    public function addmaterial(){
      echo "加料milk<br>";
    }
    public function brew(){
      echo "沖泡milk<br>";
    }
    public function pouredcup(){
      echo "裝杯milk<br>";
    }
  }
  
  class greentea implements maketea{
    public function addmaterial(){
      echo "加料green<br>";
    }
    public function brew(){
      echo "沖泡green<br>";
    }
    public function pouredcup(){
      echo "裝杯green<br>";
    }
  }
  
  class factory{
    public function partime($type){
      switch($type){
        case 'redtea':
          return new redtea();
          break;
        case 'greentea':
          return new greentea();
          break;
        case 'milktea':
          return new milktea();
          break;
      }
    }
  }
  
  class teashop{
    
    public function order($type){
      $teafactory = new factory();
      $ordertea = $teafactory->partime($type);
      $ordertea ->addmaterial();
      $ordertea ->brew();
      $ordertea ->pouredcup();
      
      echo $type."完成<br>";
    }
  }
  
  $teashop = new teashop;
  // 點餐
  $teashop->order('redtea');
  // 點餐
  $teashop->order('milktea');
?>