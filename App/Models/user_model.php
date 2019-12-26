<?php

class user_model extends DataBase{


	public static $table_name = "user";
	public static $class_name = "user_model";
	public static $fill = ['name','email','password',
	'type','image','description','bio','facebook','twitter','linkedin','github'];

	public $id;
	public $name;
	public $email;
	public $password;
	public $type;
	public $image="NULL";
	public $description="Description";
	public $bio="Bio";
	public $facebook="facebook";
	public $twitter="twitter";
	public $linkedin="linkedin";
	public $github="github";

	public function courses(){
		$sql="";
		if($this->type==0){
		$sql = "SELECT courses.* FROM user_courses INNER JOIN courses 	ON user_courses.course_id = courses.id
				INNER JOIN user ON user_courses.user_id = user.id WHERE user_courses.user_id = ".$this->id;
		}else if($this->type==1){
			$sql = "SELECT * FROM courses WHERE instructor_id = " . $this->id;
		}
		return self::query_fetch_all($sql);
	}

	public function finished_courses(){
		$id = $this->id;
		$arr = self::get_array("SELECT course_id FROM user_courses  where user_id = '$id' AND finished='1' ");
		$temp = [];
		foreach ($arr as $a) {
			$temp[] = $a['course_id'];
		}
		$in = '('.implode(",",$temp).')';
		if(!$temp){return [];}
		$sql = "SELECT * from courses WHERE id in $in ";
		return self::query_fetch_all($sql);
	}

	public function current_courses(){
		$id = $this->id;
		$arr = self::get_array("SELECT course_id FROM user_courses  where user_id = '$id' AND finished='0' ");
		$temp = [];
		foreach ($arr as $a) {
			$temp[] = $a['course_id'];
		}
		$in = '('.implode(",",$temp).')';
		if(!$temp){return [];}
		$sql = "SELECT * from courses WHERE id in $in ";
		return self::query_fetch_all($sql);
	}

	public function course_progress($course_id){
		$user_id = $this->id;
		$sql_1 = self::get_array("SELECT id FROM lesson  where course_id = '$course_id' ");
		$temp = [];
		foreach ($sql_1 as $a) {
			$temp[] = $a['id'];
		}
		$in = '('.implode(",",$temp).')';
		$sql_2 = "SELECT SUM(finished) FROM user_lesson where user_id = '$user_id' AND lesson_id in $in; ";
		$query = self::get_one($sql_2);
		return $query[0] / count($sql_1);
	}

	#check if lesson is watched
	public function watched($id){
		$user_id = $this->id;
		$sql = "SELECT finished FROM user_lesson WHERE user_id = '$user_id'  AND lesson_id = '$id' ";
		$ans = self::get_one($sql);
		return $ans[0];
	}

	#check if user take quiz or not
	public function finished_quiz($id){
		$user_id = $this->id;
		$sql = "SELECT marks FROM user_quiz WHERE user_id = '$user_id'  AND quiz_id = '$id' ";
		$ans = self::get_one($sql);
		return $ans[0];
	}


	public function count_users(){
		$var = self::get_one("SELECT count(id) FROM user WHERE type='0';");
		return $var[0];
	}

	public function count_instructors(){
		$var = self::get_one("SELECT count(id) FROM user WHERE type='1';");
		return $var[0];
	}

}
