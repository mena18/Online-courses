<?php

class quiz_model extends DataBase{


	public $table_name = "quiz";

	public function insert_question($q,$options,$answers,$type,$number,$quiz_id){
		$sql = "INSERT INTO questions (question,options,answer,type,quiz_id,number)
		VALUES ('$q','$options','$answers','$type','$quiz_id','$number')";
		self::query($sql);
	}

	public function create_new_quiz($course_id,$name,$week_num,$description,$total_marks=5){
		$sql = "INSERT INTO quiz (name,week_num,course_id,description,total_marks)
		VALUES ('$name','$week_num','$course_id','$description','$total_marks');";
		self::query($sql);
	}

	public function get($id){
		$sql = "SELECT * FROM quiz WHERE id = '$id' ";
		return self::query_fetch($sql);
	}
	public function get_questions($quiz_id){
		$sql = "SELECT * FROM questions WHERE quiz_id = '$quiz_id' ORDER BY questions.number";
		return self::query_fetch_all($sql);
	}

	public function add_grade($marks,$quiz_id,$user_id){
		$sql = "INSERT INTO user_quiz (marks,quiz_id,user_id)
		VALUES ('$marks','$quiz_id','$user_id');";
		self::query($sql);
	}

	public function delete($id){
		$sql = "DELETE FROM quiz WHERE id = '$id';";
		self::query($sql);
	}



}
