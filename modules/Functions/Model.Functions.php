<?php

class ModelFunctions
{
	public $image;

	private static $languages = array(
		"bg" => "Български",
		"en" => "English",
		"en" => "English",
	);

	private static $units = array(
		'KB' => 1024,
		'MB' => 1048576,
		'GB' => 1073741824,
		'TB' => 1099511627776
	);

    public static function getLanguages($index = false) {
        return $index !== false ? self::$languages[$index] : self::$languages;
    }

    public static function getUnits($index = false) {
        return $index !== false ? self::$units[$index] : self::$units;
    }

	public function arr_rev_keys($arr){ 
	    return array_reverse(array_reverse($arr,true),false); 
	} 

	public function cyrToLat($txt, $toLat = 0)
	{
    	$cyr = array(
    	'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
   		'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я');
   		$lat = array(
    	'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
   		'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q');
   		$txt = strtolower($txt);
   		$txt = ucfirst($txt);
	    if($toLat) 
	    	return str_replace($lat, $cyr, $txt);
	    else 
	    	return str_replace($cyr, $lat, $txt);
	}

	function get_cURL($use_forwarded_host = false)
	{
		$s = $_SERVER;
	    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
	    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
	    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
	    $port     = $s['SERVER_PORT'];
	    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
	    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
	    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
	    return $protocol . '://' . $host . $s['REQUEST_URI'];
	}

	public function uploadFile ($file_field = null, $check_image = false, $random_name = false) {
		$path = '../images/profilePics/';
		$max_size = 15* $this->getUnits("MB");
		$whitelist_ext = array('jpeg','jpg','png','gif');
		$whitelist_type = array('image/jpeg', 'image/jpg', 'image/png','image/gif');
		
		$out = array(
			'error'	=>	null
		);
		if (!$file_field)
		  $out['error'][] = "Please specify a valid form field name";           
		
		if (!$path)
		  $out['error'][] = "Please specify a valid upload path";               
		
		if (count($out['error'])>0) 
		  return $out;

		if((!empty($_FILES[$file_field])) && ($_FILES[$file_field]['error'] == 0)) {
			$file_info = pathinfo($_FILES[$file_field]['name']);
			$name = $file_info['filename'];
			$ext = $file_info['extension'];

			if (!in_array($ext, $whitelist_ext))
			  $out['error'][] = "Invalid file Extension";
			
			if (!in_array($_FILES[$file_field]["type"], $whitelist_type))
			  $out['error'][] = "Invalid file Type";

			if ($_FILES[$file_field]["size"] > $max_size)
			  $out['error'][] = "File is too big -> SIZE: " . $_FILES[$file_field]["size"] . " > $max_size";
			
			if ($check_image) 
			  if (!getimagesize($_FILES[$file_field]['tmp_name']))
			    $out['error'][] = "Uploaded file is not a valid image";
		
			if ($random_name) {
			  $tmp = str_replace(array('.',' '), array('',''), microtime());

			  if (!$tmp || $tmp == '') 
			    $out['error'][] = "File must have a name";
			     
			  $newname = $tmp.'.'.$ext;                                
			} 
			else 
			    $newname = $name.'.'.$ext;
			

			if (file_exists($path.$newname))
			  $out['error'][] = "A file with this name already exists";
			
			if (count($out['error'])>0)
			  return $out;

			if (move_uploaded_file($_FILES[$file_field]['tmp_name'], $path.$newname)) 
			{
				// SUCCESS!!!
		  		$out['filepath'] = "http://viraltest.eu/public/images/profilePics/";
		  		$out['filename'] = $newname;
		  		return $out;
			} 
			else
				$out['error'][] = "Server Error!";
			
		} 
		else 
		{
		  	$out['error'][] = "No file uploaded";
			return $out;
		}      
	}
}