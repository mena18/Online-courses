<?php

class lesson_model extends DataBase{
	public $id;
	public $number;
	public $week_number;
	public $path;
	public $name;
	public $course_id;
	public $description;


	public static function get_with_course($id){ // select all lessons from specific course
		$sql = "SELECT * FROM lesson WHERE course_id = $id ORDER BY number ASC";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		$lessons = $stmt->fetchAll();

		return $lessons;
	}

	public function get($id){ // get specific lesson
		$sql = "SELECT * FROM lesson WHERE id = $id";
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		$lesson = $stmt->fetch();
		return $lesson;
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
	public function insert_lesson($number,$weeks_number,$name,$id,$desc){

		$sql = "INSERT INTO lesson (number,week_number,name,course_id,description)
				VALUES ('$number','$weeks_number','$name',(SELECT id FROM courses WHERE id ='$id'),'$desc');";

		$stmt = self::$conn->prepare($sql)->execute();
	}


}
