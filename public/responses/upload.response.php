<?php 
ini_set("display_errors", "on");
ini_set("error_log", "error.log");

// Quest upload

require_once("../../modules/Quiz/Controller.Quiz.php");
require_once("../../modules/Quiz/Model.Quiz.php");
require_once("../../modules/Response/Controller.Response.php");

if(isset($_POST['title'])):
  $object = new Response("uploadQuiz", $_POST);
  echo $object->msg;
endif;