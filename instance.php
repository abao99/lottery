<?php
class man{
  //保存例實例在此屬性中
  private static $_instance;
  //構造函數聲明為private,防止直接創建對象

  private function __construct(){
    echo '我被實例化了！';
  }
  //單例方法
  public static function get_instance(){
    var_dump(isset(self::$_instance));
    if(!isset(self::$_instance)){
      self::$_instance=new self();
    }
    return self::$_instance;
  }
  //阻止用戶複製對象實例
  private function __clone(){
    trigger_error('Clone is not allow' ,E_USER_ERROR);
  }
  
  function test(){
    echo("test");
  }
}
// 這個寫法會出錯，因為構造方法被聲明為private
//$test = new man;
// 下面將得到Example類的單例對象

$test = man::get_instance();
$test = man::get_instance();
$test->test();
// 複製對象將導致一個E_USER_ERROR.
//$test_clone = clone $test;

?>
