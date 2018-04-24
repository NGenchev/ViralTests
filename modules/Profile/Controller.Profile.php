<?php

class Profile
{
	public $profile;
	public $design;
	public $msg;

	function __construct($action = "index", $params = null)
	{
		$this->design = new Design();
		$this->design->template = "login";
		if(method_exists(__CLASS__, $action))
			$this->$action($params);
		else 
			$this->index();
	}

	public function index()
	{
		if(isset($_SESSION['logged']) && $_SESSION['logged'] === TRUE)
            header("Location: https://viraltest.eu/?page=quiz&action=create");

		if(isset($_POST['username']))
        {
            $data = array(
                "user"  => $_POST['username'],
                "pwd"   => $_POST['password']
            );

            $object = new ModelProfile($data);
            $this->design->data['message'] = $object->tryLogin();
        }        	
	}
}