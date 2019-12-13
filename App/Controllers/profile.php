<?php

class profile extends Controller{
	public function index(){
		if(isset($_SESSION['user'])){
			global $conn;
			if($_SESSION['user']['type']!=1){
				$sql = "SELECT courses.*
						FROM user_courses
						INNER JOIN courses
						    ON user_courses.course_id = courses.id
						INNER JOIN user
						    ON user_courses.user_id = user.id
						WHERE user_courses.user_id = ".$_SESSION['user']['id'];
				}
				else{
					$v1=$_SESSION['user']['id'];
					$sql = "SELECT * FROM courses WHERE instructor_id = '$v1' ";
				}

			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$courses = $stmt->fetchAll();
			if($_SESSION['user']['type']==1)
			{
				$this->view("profile/instructor",["courses"=>$courses]);
			}
			else{
			$this->view("profile/index",["courses"=>$courses]);
		}
		}else{
			header("Location: http://localhost/courses/user/loginview");
		}
	}

}
