<?php

class course_model{
	public $id;
	public $name;
	public $description;
	public $image;
	public $instructor_id;
	public $category;
	public $avg_ratin;
	public $duration_weeks;


	public static function get_all(){
		global $conn;
		$sql = "SELECT * FROM courses";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$courses = $stmt->fetchAll();
		return $courses;
	}

	public static function get($id){
		global $conn;
		$sql = "SELECT * FROM courses WHERE id = '$id' ";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$course = $stmt->fetch();
		return $course;
	}

	public function save(){

	}
	public function storeCourse_indatabase($name,$desc,$img,$instructorid,$duration_weeks){
		global $conn;
	$sql = "INSERT INTO courses (name,description,image,instructor_id,duration_weeks)
			VALUES ('$name','$desc','$img','$instructorid','$duration_weeks');";
	$stmt = $conn->prepare($sql)->execute();
	}
	public function deletefromDatabasee($v1,$id)
	{
		global $conn;
		$sql = "DELETE FROM courses where instructor_id = '$v1'  AND id = '$id' ";
		$stmt = $conn->prepare($sql); // no s
		$stmt->execute();
	}

}
