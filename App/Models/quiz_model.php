<?php

class quiz_model extends DataBase{


	public static $table_name = "quiz";
	public static $class_name = "quiz_model";
	public static $fill = ['week_num','course_id',
	'total_marks','description','name'];


	public function insert_question($q,$options,$answers,$type,$number,$quiz_id){
		$sql = "INSERT INTO questions (question,options,answer,type,quiz_id,number)
		VALUES ('$q','$options','$answers','$type','$quiz_id','$number')";
		self::query($sql);
	}


	public function get_questions($quiz_id){
		$sql = "SELECT * FROM questions WHERE quiz_id = '$quiz_id' ORDER BY questions.number";
		return self::get_array($sql);
	}

	public function add_grade($marks,$quiz_id,$user_id){
		$sql = "INSERT INTO user_quiz (marks,quiz_id,user_id)
		VALUES ('$marks','$quiz_id','$user_id');";
		self::query($sql);
	}

	public function users(){
		$sql = "SELECT user_quiz.*,user.* FROM user_quiz INNER JOIN user on user.id=user_quiz.user_id
		INNER JOIN quiz on quiz.id = user_quiz.quiz_id where quiz.id = '$this->id'";
		return self::query_fetch_all($sql,'user_model');
	}

	public function course(){
		$sql = "SELECT * FROM courses WHERE id = '$this->course_id' ;";
		return self::query_fetch($sql,"course_model");
	}




}
