<?php 
ini_set("display_errors", "on");
ini_set("error_log", "error.log");

if(isset($_POST['url'])):
	$url = $_POST['url'];
	$path = "../public/images/readyTests/";
	$name = md5(time() . "FaceAppImage") . ".png";
	file_put_contents("../".$path.$name, file_get_contents($url));

	echo "https://viraltest.eu/".$path.$name."?version=".md5(time());
endif;