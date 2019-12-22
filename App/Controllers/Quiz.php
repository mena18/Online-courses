<?php

require_once(app_path('Models/quiz_model.php'));
require_once(app_path('Models/course_model.php'));

class  Quiz  extends Controller{

	public function create($course_id){
		if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=1  ){echo "you are not allowed here";return;}
		$course = course_model::get($course_id);
		if($course->instructor_id!=$_SESSION['user']['id']){
			echo "You aren't the instructor who created the course";return ;
		}

		$this->view("quiz/create",['course'=>$course]);
	}

	public function store($course_id){
		if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=1  ){echo "you are not allowed here";return;}

		$course = course_model::get($course_id);
		if($course->instructor_id!=$_SESSION['user']['id']){
			echo "You aren't the instructor who created the course";return ;
		}

		$quiz = new quiz_model();

		$quiz->name = $_POST['name'];
		$quiz->description = $_POST['description'];
		$quiz->week_num = $_POST['week_num'];
		$quiz->course_id = $course_id;

		$quiz->save();


		$Questions = json_decode($_POST['value'],true);
		$quiz_id = quiz_model::query_fetch("SELECT MAX(id) FROM quiz");
		$quiz_id = $quiz_id['MAX(id)'];


		$number=1;
		foreach ($Questions as $Question) {
			$q 			= 	$Question['p'];
			$options 	=  	implode(',',$Question['options']);
			$answers 	=  	implode(',',$Question['ans']);
			$type 		=  	$Question['type'];
			quiz_model::insert_question($q,$options,$answers,$type,$number++,$quiz_id);
		}

		return redirect("course/index");

	}

	/* User taking quiz */
	public function take($quiz_id){
		if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=0  ){echo "you are not allowed here";return;}

		$quiz = quiz_model::get($quiz_id);
		$Questions = quiz_model::get_questions($quiz->id);

		$course_id = $quiz->course_id;
		$course = course_model::get($course_id);
		if(!course_model::user_course($_SESSION['user']['id'],$course_id)){
			echo "you don't take the course";
			return ;
		}

		//print_array($Questions);

		$this->view("quiz/take",['quiz'=>$quiz,'questions'=>$Questions]);
	}

	/* User submiting Quiz */
	public function submit($quiz_id){
		if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=0  ){echo "you are not allowed here";return;}

		$quiz = quiz_model::get($quiz_id);
		$Questions = quiz_model::get_questions($quiz['id']);

		$course_id = $quiz['course_id'];
		$course = course_model::get($course_id);
		if(!course_model::user_course($_SESSION['user']['id'],$course_id)){
			echo "you don't take the course";
			return ;
		}

		$num=1;
		$grades = 0;
		foreach ($Questions as $question) {
				if(!isset($_POST['question_'.$num])){$_POST['question_'.$num] = $question['type']=='radio' ? '':[] ;}
				$result = compare_questions($question,$_POST['question_'.$num]);
				$num+=1;
				$grades+= $result;// $grades+=$result*
		}
		//echo $grades .'/'. count($Questions);
		quiz_model::add_grade($grades,$quiz_id,$_SESSION['user']['id']);
		return redirect("course/index");
	}

	public function delete($quiz_id){
		if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=0  ){echo "you are not allowed here";return;}

		$quiz = quiz_model::get($quiz_id);
		$course_id = $quiz->course_id;
		$course = course_model::get($course_id);
		if($course->instructor_id!=$_SESSION['user']['id'] ){
			echo "you aren't the instructor who make the quiz";
			return ;
		}

		$quiz->delete();
		redirect("courses/index");

	}





}
