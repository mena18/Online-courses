<?php

require_once(app_path('Models/quiz_model.php'));

class  Quiz  extends Controller{

	public function create(){ // missing course_id
		//if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=1  ){echo "you are not allowed here";return;}

		//['course_id'=>$course_id]
		$this->view("quiz/create");
	}

	public function store(){ // missing course_id
		$Questions = json_decode($_POST['value'],true);

		$week_num = 1;
		$time = 900;

		print_r($Questions);

		//quiz_model::create_new_quiz($course_id,$week_num);
		//$quiz = quiz_model::query_fetch("SELECT * FROM quiz WHERE week_num = '$week_num' AND course_id = '$course_id' ");

		$quiz_id = 1;
		$number=1;
		foreach ($Questions as $Question) {
			$q 			= 	$Question['p'];
			$options 	=  	implode(',',$Question['options']);
			$answers 	=  	implode(',',$Question['ans']);
			$type 		=  	$Question['type'];
			quiz_model::insert_question($q,$options,$answers,$type,$number++,$quiz_id);
		}
		return $this->redirect("course/index");

	}

	/* User taking quiz */
	public function take($quiz_id){
		$quiz = quiz_model::get($quiz_id);
		$Questions = quiz_model::get_questions($quiz['id']);

		//print_array($Questions);

		$this->view("quiz/take",['quiz'=>$quiz,'questions'=>$Questions]);
	}

	/* User submiting Quiz */
	public function submit($quiz_id){
		$quiz = quiz_model::get($quiz_id);
		$Questions = quiz_model::get_questions($quiz['id']);

		$num=1;
		$grades = 0;
		foreach ($Questions as $question) {
				if(!isset($_POST['question_'.$num])){$_POST['question_'.$num] = $question['type']=='radio' ? '':[] ;}
				$result = compare_questions($question,$_POST['question_'.$num]);
				$num+=1;
				$grades+= $result;// $grades+=$result*
		}
		echo $grades .'/'. count($Questions);
	}




}
