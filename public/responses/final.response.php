<?php 
ini_set("display_errors", "on");
ini_set("error_log", "error.log");

if(isset($_POST['dataImage'])):
	$data = $_POST['dataImage'];
	$path = "../public/images/readyTests/";
	$name = md5(time()) . ".png";

	file_put_contents("../".$path.$name, base64_decode($data));

	echo "https://viraltest.eu/".$path.$name;
endif;