<?php 
ini_set("display_errors", "on");
ini_set("error_log", "error.log");
session_start();

/*
	$_POST -> facebook response
*/
	var_dump($_POST);
if(isset($_POST['id']) && isset($_SESSION) && $_SESSION['logged'] === TRUE)
{
	$id = $_POST['id'];

	while($files = glob("../images/quizes/quiz".$id."/*"))
	{
		unlink($files[0]);
	}

	if(unlink("../quizes/quiz".$id.".json") && @unlink("../quizes/quest".$id.".json") && rmdir("../images/quizes/quiz".$id))
		echo json_encode("Успешно изтрихте куиз №".$id);
	else
		echo json_encode("Проблем с куиз №".$id);

}