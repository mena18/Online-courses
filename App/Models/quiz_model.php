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




}
