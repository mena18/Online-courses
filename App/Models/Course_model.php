<?php

class course_model extends DataBase {

	public static $table_name = "courses";
	public static $class_name = "course_model";
	public static $fill = ['name','description','image',
	'instructor_id','category_id','avg_rating','duration_weeks','finished'];

	public $name = "name";
	public $description = "description";
	public $image = "image";
	public $instructor_id = 7;
	public $category_id = 1;
	public $avg_rating = 3;
	public $duration_weeks = 4;
	public $Finished = 0;


	// remove soon
	public function user_course($user_id,$course_id){
		$sql = "SELECT * from user_courses where course_id='$course_id' AND user_id = '$user_id' ";
		return self::query_fetch($sql);
	}


	public function instructor(){
		$id = $this->instructor_id;
		$sql = "SELECT * from user where id='$id' ";
		return self::query_fetch($sql);
	}

	public function lessons(){
		$id = $this->id;
		$sql = "SELECT * from lesson where course_id='$id' ORDER BY number";
		return self::query_fetch_all($sql);
	}



	public function toggle_in_course($user_id,$course_id){

		$sql = "INSERT INTO user_courses (user_id, course_id)
    		VALUES ('$user_id','$course_id');";

    	if(self::user_course($user_id,$course_id)){
    		$sql = "DELETE FROM user_courses WHERE user_id='$user_id' AND course_id = '$course_id' ";
    	}
		self::query($sql);
	}

	public function user_finish($user_id,$course_id){
		$sql = "UPDATE user_course SET finished = '1' WHERE course_id='$course_id' AND user_id = '$user_id' ";
		self::query($sql);
	}

	public function instructor_finish($id){
		$sql = "UPDATE courses set finished = '1' where id = '$id' ";
		self::query($sql);
	}

	public function admin_finish($id){
		$sql = "UPDATE courses set finished = '2' where id = '$id' ";
		self::query($sql);
	}



}
