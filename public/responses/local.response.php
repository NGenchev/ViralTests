<?php 
ini_set("display_errors", "on");
ini_set("error_log", "error.log");

require_once("../../modules/Functions/Model.Functions.php");

if(isset($_FILES['imageData'])):

	$obj = new ModelFunctions();
	$res = $obj->uploadFile('imageData', 0, 1);

	echo $res['filepath'].$res['filename'];

endif;