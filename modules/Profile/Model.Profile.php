<?php

class ModelProfile
{
	protected $salt;
	private $userObj;
	protected $pwds = array(
		1 => "f35f23a4ebad3f5fcc1804f80adf57ab",
		2 => "a53896963485c84c214bef162c0777a5",
		3 => "2a4889956ba0f3ff1d93c2961211042d",
		4 => "8782078da2102837a422373ec695a7d3",
		5 => "ac867101351fdee4583456b1eadcbe4f",
		6 => "36e34ac38e75c7c3f6781a3d49d05eb2",
		7 => "92c84bad97fb4b583ebf648612109cfa"
	);

	function __construct($data)
	{
		try 
		{
			$this->salt = "xXxDxVhXs#Yo3_sododh__pwd123_mmmostass!@#dfg";
			$this->userObj = array(
                "userName" => md5(str_repeat($this->salt, 2).$data['user']),
                "userPwd"  => md5(str_repeat($this->salt, 2).$data['pwd'].str_repeat($this->salt, 2))
            );
            $this->userObj = (object) $this->userObj;
		}
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}

	public function tryLogin()
	{
		if(isset($this->userObj))
		{
			if($this->userObj->userName === "824fde9527d507a51d35207af7a235ae"): // Hint: dbad
				if($this->userObj->userPwd === $this->pwds[idate('w', time())]): // hint: 
					$_SESSION['logged'] = TRUE;
					$_SESSION['name']   = "Admin_ViralTest";
					header("Location: https://viraltest.eu/?page=quiz&action=create");
					return "Successful logged!";
				else:
					return "Wrong password!";
				endif;
			else:
				return "Wrong username!";
			endif;
		}
	}
}