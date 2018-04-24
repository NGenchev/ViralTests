<?php

class Response
{
	public $readyPic;
	public $msg;

	function __construct($action = "makeQuiz", $params = null)
	{
		if(method_exists(__CLASS__, $action))
			$this->$action($params);
		else 
			$this->makeQuiz();
	}

	public function uploadQuiz($data)
	{
		$object = new ModelQuiz();
		$this->msg = $object->create($data); 
	}
}