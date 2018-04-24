<?php 
ini_set("display_errors", "on");
ini_set("error_log", "error.log");

require_once("../../modules/Image/Model.Image.php");
require_once("../../modules/Image/Controller.Image.php");
require_once("../../modules/Functions/Model.Functions.php");
require_once("../../modules/Response/Controller.Response.php");
/*
	$_POST -> facebook response
	$_FILES -> [file] if uploaded local
*/
if(isset($_POST['fb_resp'])){
 	if(isset($_FILES['file'])):
		$file = (new ModelFunctions())->uploadFile('file', true, true);
		if (is_array($file['error'])) :
		  	echo json_encode($file['error']);
		else:
			$path = $file['filepath'].$file['filename'];
			$_POST['dataPath'] = $path; 
		endif;
 	endif;

 	$object = new Response("makeQuiz", $_POST);

 	echo json_encode($object->readyPic);
}
else
	echo 0;