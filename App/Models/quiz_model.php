<?php

class quiz_model extends DataBase{


	public $table_name = "quiz";

	public function insert_question($q,$options,$answers,$type,$quiz_id){
		$sql = "INSERT INTO questions (question,options,answer,type,quiz_id)
		VALUES ('$q','$options','$answers','$type','$quiz_id')";
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




}
