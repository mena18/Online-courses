<?php

class course_model extends DataBase {

	public $table_name = "courses";
	public $data_on_create = ['name','description','image','instructor_id','category','avg_rating','duration_weeks','Finished'];


	public static function get_all(){
		$sql = "SELECT * FROM courses";
		return self::query_fetch_all($sql);
	}

	public static function get($id){
		$sql = "SELECT * FROM courses WHERE id = '$id' ";
		return self::query_fetch($sql);
	}

	public function get_all_categories(){
		$sql = "SELECT * FROM category";
		return self::query_fetch_all($sql);
	}

	public function get_category($id){
		$sql = "SELECT * FROM category WHERE id = '$id' ";
		return self::query_fetch($sql);
	}

	public function user_course($user_id,$course_id){
		$sql = "SELECT * from user_courses where course_id='$course_id' AND user_id = '$user_id' ";
		return self::query_fetch($sql);
	}


	public function save($name,$desc,$img,$instructorid,$duration_weeks,$cetegory_id){
	$sql = "INSERT INTO courses (name,description,image,instructor_id,duration_weeks)
			VALUES ('$name','$desc','$img','$instructorid','$duration_weeks');";
		self::query($sql);
	}

	
	public function update($id,$name,$description,$image,$instructorid,$duration_weeks,$cetegory_id){
		$sql = "UPDATE courses SET name = '$name', description = '$description', image = '$image', instructor_id =  '$instructorid', category_id = '$cetegory_id', duration_weeks = '$duration_weeks'  WHERE courses.id = '$id' ;";

		self::query($sql);
	}
	

	public function delete($id){
		$sql = "DELETE FROM courses where id = '$id' ";
		self::query($sql);
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

	public function finish($id){
		$sql = "UPDATE courses set finish = '1' where id = '$id' ";
		self::query($sql);
	}

	public function update_one($id,$key,$value){
		$sql = "UPDATE courses SET $key = $value WHERE id = '$id'; ";
		self::query($sql); 
	}

}
