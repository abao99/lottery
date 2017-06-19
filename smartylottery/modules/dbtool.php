<?php
	function connection(){
    $servername = "localhost";
    $username = "root";//root
    $password = "123456";
    $database = "lottery";
    
		$link = mysqli_connect($servername,$username,$password,$database)
			or die("error".mysqli_connect_error());
		mysqli_query($link,"set names utf8");
		return $link;
	}
?>