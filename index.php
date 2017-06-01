<?php

$url = "http://www.kufa88.com/Promotion/jingcai";
$contents = file_get_contents($url);
//如果出現中文亂碼使用下面代碼
//$getcontent = iconv("gb2312", "utf-8",file_get_contents($url));
//echo $getcontent;
echo $contents;


?>