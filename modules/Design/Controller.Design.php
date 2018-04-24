<?php
class Design
{
	public $template = "index";
	public $data;

	protected $path = "./public/templates/";

	public function display()
	{
		if(file_exists($this->path.$this->template.'.tpl.php')) {
			ob_start();
			include $this->path.'main/header.tpl.php';
			include $this->path.$this->template.'.tpl.php';
			include $this->path.'main/footer.tpl.php';
			$content = ob_get_clean();

			echo $content;
		}
		else 
			include $this->path.'error.tpl.php';
	}

	public function htmlMinify($buffer) 
	{
	    $search = array(
	        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
	        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
	        '/(\s)+/s',         // shorten multiple whitespace sequences
	        '/<!--(.|\s)*?-->/', // Remove HTML comments
	        '/> +</',
	        '/ {2,}/',
		    '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
	    );

	    $replace = array(
	        '>',
	        '<',
	        '\\1',
	        '',
	        '><',
	         ' ',
		     ''
	    );

	    $buffer = preg_replace($search, $replace, $buffer);

	    return $buffer;
	}
}