<?php
  interface material{
    public function addmaterial();
    public function getPrice();
  }
  
  abstract class Spaghetti implements material{
    protected $_material;
    public $_price;
    
    public function __construct(material $material){
      $this->_material = $material;
    }
    
    public function addmaterial(){
      $this->_material->addmaterial();
    }
    
    public function getPrice(){
      return $this->_price;
    }
  }
  
  class normalspaghetti implements material{
    public $_price=100;
    
    public function addmaterial(){
      echo "normal spaghetti";
    }
    
    public function getPrice(){
      return $this->_price;
    }
  }
  
  class egg extends Spaghetti{
    public $price = 10;
    
    public function __construct(material $material){
      parent::__construct($material);
    }
    
    public function addmaterial(){      
      parent::addmaterial();
      echo " add Egg ";
    }
    public function getPrice(){
      return $this->_material->getPrice()+$this->price;
    }
  }
  
  class Ham extends Spaghetti{
    public $price = 38;
    
    public function __construct(material $material){
      parent::__construct($material);
    }
    
    public function addmaterial(){      
      parent::addmaterial();
      echo " add Ham ";
    }
    
    public function getPrice(){
      return $this->_material->getPrice()+$this->price;
    }
  }
  
  $spaghetti = new normalspaghetti();
  
  $spaghetti = new Ham($spaghetti);
  $spaghetti = new egg($spaghetti);
  
  $spaghetti->addmaterial();
  echo "<br>";
  $price = $spaghetti->getPrice();
  echo "$".$price;
?>