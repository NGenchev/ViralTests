<?php

class ModelQuiz
{
	public $quizes = array();
	public $msg;

	private $dir = "public/quizes/quiz";

	public function index()
	{
		$quizFiles = glob($this->dir. "*.json");

		if (is_array($quizFiles) && !empty($quizFiles)) {
		    foreach ($quizFiles as $quizFile)
				$this->quizes[filemtime($quizFile)] = json_decode(file_get_contents($quizFile));

		    ksort($this->quizes);
		    $this->quizes = array_reverse($this->quizes);
		}

		return !empty($this->quizes) ? $this->quizes : "0";
	}

	public function get_lastID()
	{
		$quizes = $this->index();

		return (int) $quizes[0]->id;
	}

	public function preview($id)
	{
		$quizFile = $this->dir . $id . ".json";

		if(file_exists($quizFile)):
			$file = json_decode(file_get_contents($quizFile));

			if($file->type === "quest"){
				$questFile = json_decode(file_get_contents("public/quizes/quest".$id.".json"));

				$newFile = array(
					"mainQuiz" => $file,
					"mainQuest"=> $questFile
				);

				return $newFile;
			}
			else
				return array(
					"mainQuiz" => $file
				);
		else:
			return $this->preview($this->get_lastID());
		endif;
	}

	public function create($dataPost, $id = null)
	{
	  	$images = $_FILES;
	  	
	  	// get last id;
	  	$files = glob("../quizes/quiz*.json");

	  	if($files):
		  usort($files, function($a, $b) {
		    return strlen($b)-strlen($a);
		  });
		  	  $lastFile = $files[0];
			  $newID = substr($lastFile, 14, strlen($lastFile));
			  $newID = str_replace(".json", "", $newID);
		else:
		  	$newID = 1;
	  	endif;

	  	while(file_exists("../quizes/quiz".$newID.".json"))
	    	$newID++;

	  $target_dir = "../images/quizes/quiz{$newID}/";
	  mkdir("../images/quizes/quiz{$newID}", 0777);

	  $i = 0; //pictures id counter
	  $counter = 0; // successful uploaded
	  foreach($images as $randPic):
	    $i = $randPic['name'] == "cover" ? $i : $i+1;
	    $target_file = $target_dir;
	    $target_file .= $randPic['name'] == "cover" ? "bg.png" : "pic{$i}.png";
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    if(!getimagesize($randPic["tmp_name"])) 
	      $uploadOk = 0;

	    if($uploadOk === 1):
	      if (move_uploaded_file($randPic["tmp_name"], $target_file))
	        $counter++;
	    endif;

	  endforeach;

	  $template = array(
	      "id"            => $newID,
	      "question"      => $dataPost['title'],
	      "random_images" => $i,
	      "image_position"=> $dataPost['imgPosition'] ? $dataPost['imgPosition'] : "left",
	      "type"		  => $dataPost['type'],
	      "created"       => date("d-m-Y")
	  );



	  if($dataPost['type'] === "filter")
	  	$template['filter'] = $dataPost['filter'];
	  
	  $jsonQuiz = json_encode($template);

	  $template = array();
	  $tempJ = 0;

	  if($dataPost['type'] === "quest")
	  {
	  	$quests = array();
	  	$temp = explode("QnA:", $dataPost['QnA']);

	  	$questions = explode("@", $temp[1]); 
	  	unset($questions[0]);
  		foreach($questions as $question)
  		{
  			$tempJ++;

  			$answers = explode("|", $question);
  			$questTitle = $answers[0];
  			unset($answers[0]);
  			unset($answers[count($answers)]);

  			$quests[$questTitle] = $answers;

  			$template[$tempJ] = array(
  				"question" => $questTitle,
  				"answers"  => $answers
  			);
  		}

  		$jsonQuest = json_encode($template);

		  //upload new QuizJson file
		  if(file_put_contents("../quizes/quest{$newID}.json", $jsonQuest))
		  	$err += 0; else $err += 1;
	  }

	  
	  

	  //upload new QuizJson file
	  if(file_put_contents("../quizes/quiz{$newID}.json", $jsonQuiz))
	  	$err += 0; else $err += 1;

	  return ((($counter === $i+1) && $err == 0) ? "Успешно качихте нов куиз!" : "Проблем с качването!");
	}
}