<?php//引用類檔
　　require 'smarty/Smarty.class.php';
　　$smarty = new Smarty;//設置各個目錄的路徑，這裡是安裝的重點
　　$smarty->template_dir ="smarty/templates/templates";
　　$smarty->compile_dir ="smarty/templates/templates_c";
　　$smarty->config_dir = "smarty/templates/config";
　　$smarty->cache_dir ="smarty/templates/cache";
　　//smarty範本有快取記憶體的功能，如果這裡是true的話即打開caching，但是會造成網頁不立即更新的問題，當然也可以通過其他的辦法解決
　　
?>
　　
