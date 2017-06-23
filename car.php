<?php  
  interface speedUpSet{
    public function speedUp();
  }
  interface speedDownSet{
    public function speedDown();
  }
  
  abstract class car {

    public function DriveCar(){}
    public function StopCar(){}
    
    public function setSpeedUp(speedUpSet $up){}
    public function setSpeedDown(speedDownSet $down){}
  }
  
  class porsche extends car{
    
    private $_speedup;
    private $_speeddown;
    
    public function DriveCar(){
      $this->_speedup->speedUp();
    }
    
    public function StopCar(){
      $this->_speeddown->speedDown();
    }
    
    public function setSpeedUp(speedUpSet $up){
      $this->_speedup=$up;
    }
    
    public function setSpeedDown(speedDownSet $down){
      $this->_speeddown=$down;
    }
  }

  
  class HighSpeed implements speedUpSet{
    public function speedUp(){
      echo "高速移動";
    }
  }
  
  class NosSpeed implements speedUpSet{
    public function speedUp(){
      echo "氮氣加速";
    }
  }
  
  class LowSpeed implements speedDownSet{
    public function speedDown(){
      echo "減速";
    }
  }
  
  $porsche911 = new porsche();
  $porsche911->setSpeedDown(new LowSpeed());
  $porsche911->setSpeedUp(new HighSpeed());
  $porsche911->StopCar();
  $porsche911->DriveCar();
?>