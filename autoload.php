<?php
ini_set("display_errors", "on");
ini_set("error_log", "error.log");

session_start();

define("HTTP_ROOT", "https://viraltest.eu/");

function changeLanguage($lang)
{
	$currentURL = (new ModelFunctions())->get_cURL();

	$url = parse_url($currentURL);
	$url['scheme'] = "https:/";
	$url['path'] = $lang;
	$url['query'] = "?".$url['query'];

	$url = implode("/", $url);

	return $url;
}

function __autoload($className)
{	
	// Include modules and view
	$str = str_replace("Model", "", $className, $count);

	$class = preg_replace('/(?<!^)([A-Z])/', '.\\1', $className);
	if(count(explode(".", $class)) > 1)
		$class = explode(".", $class)[1];
	
    if ($count == 0)
    	$fileName = "./modules/".$class."/Controller.".$className.".php";
    else 
   		$fileName = "./modules/".$class."/Model.".$class.".php";

   	if(file_exists($fileName))
    	include_once($fileName); 
	else 
		throw new Exception('Несъществуващ модул - обект! ->>'.$fileName);	
	
	// LangModule
	try
	{
		$obj = new ModelFunctions();
		$array=parse_url($obj->get_cURL());
		$array['host']=explode('.', $array['host']);
		$lang = htmlspecialchars(htmlentities(trim(str_replace("/", "", $array['path']))));
		$lang = strtolower($lang);
	}
	catch(Exception $e)
	{
		$lang = "en";
	}

	if(array_key_exists($lang, ModelFunctions::getLanguages()))
		define("LANG", $lang);
	else
		define("LANG", "en");

	define("HTTP_REDIR", "https://viraltest.eu/". LANG ."/");
}	

function __($text)
{
	$glob = glob("public/langs/". LANG . ".json");
	$langFile = file_get_contents($glob[0]);
	$langArray = json_decode($langFile, 1);
	$specChars = array(
		"+", "-", "&&", "||", "!", "(", ")", "{", "}", "[", "]", "^",
            "~", "*", "?", ":","\"","\\"
    );

	$translate = null;

	try
	{
   		// Removes special chars.
		$text = preg_replace("/[\w_][[:space:]]+/i", '', str_replace(' ', '_', $text));
		$text = str_replace($specChars, "", $text);
		
		$translate = $langArray[$text];
		if($translate != null)
			return $translate;
		else
		{
			try 
			{
				if(file_exists("public/langs/". LANG . ".json"))
					$langFile = file_get_contents("public/langs/". LANG . ".json");
				else
					fopen("public/langs/". LANG . ".json", "w+");
					
				$langArray = json_decode($langFile, 1);

				$text = str_replace('_', ' ', $text); // Replaces all spaces with hyphens.

				$langArray[$text] = $text;
				$langArray = json_encode($langArray, JSON_PRETTY_PRINT);
				$handler = fopen($glob[0], "w+");
				if (!fwrite($handler, $langArray))
	        		throw new Exception("Проблем с езиковия модул!");
	        	return $text;
			} 
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
		}
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
}