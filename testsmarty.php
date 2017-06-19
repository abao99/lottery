<?php
require "config.php";
$smarty->assign("title", "測試用的網頁標題");
$smarty->assign("content", "測試用的網頁內容");
// 上面兩行也可以用這行代替
// $tpl->assign(array("title" => "測試用的網頁標題", "content" => "測試用的網頁內容"));
$smarty->display('test.htm');
?>