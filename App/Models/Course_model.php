<?php

class course_model extends DataBase {

	public $model_name = "courses";
	public $data_on_create = ['name','description','image','instructor_id','category','avg_rating','duration_weeks','Finished'];


	public static function get_all(){
		$sql = "SELECT * FROM courses";
		return self::query_fetch_all($sql);
	}

	public static function get($id){
		$sql = "SELECT * FROM courses WHERE id = '$id' ";
		return self::query_fetch($sql);
	}


	public function save($name,$desc,$img,$instructorid,$duration_weeks){
	$sql = "INSERT INTO courses (name,description,image,instructor_id,duration_weeks)
			VALUES ('$name','$desc','$img','$instructorid','$duration_weeks');";
		self::query($sql);
	}

	/*
	public function update($id,$name,$desc,$img,$instructorid,$duration_weeks){
		$sql = "UPDATE courses SET name='$name',description,image,instructor_id,duration_weeks)
			VALUES ('$name','$desc','$img','$instructorid','$duration_weeks');";
		self::query($sql);
	}
	*/

	public function delete($id){
		$sql = "DELETE FROM courses where id = '$id' ";
		self::query($sql);
	}

}
