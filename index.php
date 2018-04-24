<?php 
// @index.php?page=CONTROLLER&action=METHOD&param=MethodParams
require_once('autoload.php');
/*
 * Get page request and params
 * Searching for page and action
 * @params $_GET
 **/
$page 	= $_GET['page'] ? $_GET['page'] : "quiz";
$action = $_GET['action'] ? $_GET['action'] : "index"; 
$param 	= $_GET['param'] ? $_GET['param'] : ($_GET['id'] ? $_GET['id'] : null);

$pages = array(
	"quiz",
	"profile"
);

//$time_start = microtime(true); // check speed

if(in_array($page, $pages))
	try
	{
		$page = ucfirst(strtolower($page));
		$obj = new $page($action, $param);
	}
	catch(Exception $e)
	{
		$obj = new Quiz("index");
	}
else
	$obj->design->template = "error";
		
$obj->design->display();

//$time_end = microtime(true);

//$execution_time = ($time_end - $time_start); // time in seconds
//echo '<script>console.log('.$execution_time.');</script>';