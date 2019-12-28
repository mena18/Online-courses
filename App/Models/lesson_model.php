<?php

class lesson_model extends DataBase{
	public $id;
	public $number;
	public $week_number;
	public $video_id;
	public $name;
	public $course_id;
	public $description;

	public static $table_name = "lesson";
  public static $class_name = "lesson_model";
	public static $fill = ['number','week_number','video_id',
	'name','course_id','description','duration'];


	public static function get_with_course($id){ // select all lessons from specific course
		$sql = "SELECT * FROM lesson WHERE course_id = $id ORDER BY number ASC";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		$lessons = $stmt->fetchAll();

		return $lessons;
	}

	public static function lessons_in_week($course_id,$week_num){
		$sql = "SELECT * FROM lesson where course_id = '$course_id' AND week_number = '$week_num' ORDER BY id ";
		return self::query_fetch_all($sql);
	}



	public function check_user_registration($user_id,$course_id){ // check if user taking this course
		$sql = "SELECT * FROM user_courses WHERE user_id = $user_id AND course_id = $course_id";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		$lesson = $stmt->fetch();
		return $lesson;
	}

	public function is_watched($user_id,$lesson_id){
		$sql = "SELECT * FROM user_lesson WHERE user_id = $user_id AND  lesson_id = $lesson_id";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		$lesson = $stmt->fetch();
		return $lesson;
	}

	public function toggle_watching($user_id,$lesson_id){

		if(self::is_watched($user_id,$lesson_id)){
			$sql = "DELETE FROM user_lesson WHERE user_id = $user_id AND  lesson_id = $lesson_id";
			$stmt = self::$conn->prepare($sql)->execute();
		}else{
			$sql = "INSERT INTO user_lesson (finished, user_id, lesson_id)
			VALUES ('1', '$user_id', '$lesson_id')";
			self::$conn->prepare($sql)->execute();
		}
	}

	public function course(){
		$id = $this->course_id;
		$sql = "SELECT * FROM courses WHERE id = '$id' ";
		return self::query_fetch($sql,'course_model');
	}

	public function week_lessons(){
		$sql = "SELECT * FROM lessons where course_id = '$this->course_id' AND week_number = '$this->week_number' ORDER BY id ";
		return self::query_fetch_all($sql);
	}


	public function users(){
		$sql = "SELECT user_lesson.*,user.* FROM user_lesson INNER JOIN user on user.id=user_lesson.user_id
		INNER JOIN lesson on lesson.id = user_lesson.lesson_id where lesson.id = '$this->id'";
		return self::query_fetch_all($sql,'user_model');
	}




}
