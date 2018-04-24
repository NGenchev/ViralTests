<?php

class Quiz
{
	public $quizes;
	public $design;

	function __construct($action = "index", $params = null)
	{
		$this->design = new Design();
		$this->design->template = "listing";
		if(method_exists(__CLASS__, $action))
			$this->$action($params);
		else 
			$this->index();
	}

	public function index($shuffled = false)
	{
		$object = new ModelQuiz();
		$quizes = $object->index();
		if($shuffled) 
			shuffle($quizes);

		$this->design->data['quizes'] = $quizes;
	}

	public function preview($id)
	{
		$object = new ModelQuiz();
		$id = (isset($id) && (int)$id > 0) ? (int)$id : $object->get_lastID();

		$this->design->data['Quiz'] = $object->preview($id);
		$this->design->template = "preview";
		$this->index(1);
	}

	public function create($type = null)
	{
		if(!isset($_SESSION['logged']) || $_SESSION['logged'] !== TRUE)
            header("Location: https://viraltest.eu/?page=profile");

		$quizTypes = array(
			"text", 
			"quest", 
			"filter"
		);

		if($type != NULL && in_array($type, $quizTypes))
			$this->design->template = "create/".$type; // show form by type
		else
			$this->design->template = "create";	// show menu if not defined
	}

	public function finalResult()
	{
		if(isset($_GET['final']) && $_GET['final'] == "ready")
		{
			
		}
	}
}