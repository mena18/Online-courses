<?php

require_once("App/Models/course_model.php");
require_once("App/Models/lesson_model.php");

class course extends Controller{

	/************************  User section  *******************/

	public function index(){
		$courses = course_model::get_all();
		$this->view("courses/index",["courses"=>$courses]);

	}
	// shows details for non register users
	public function show($id){
		$course = course_model::get($id);
		$lessons = lesson_model::get_with_course($id);
		if($course){
			$this->view("courses/details",['course'=>$course,"lessons"=>$lessons]);
		}else{
			$this->redirect("course/index");
		}

	}

	// show course details for register users
	public function my_course($id){
		echo "show course ";
	}

	//show the courses the current user is taking and the courses the user has finished
	public function my_courses(){
		echo "show the courses the current user is taking and the courses the user has finished";
	}

	// user_registration into course
	public function register($id){
		if(!isset($_SESSION['user'])){$this->redirect("user/loginview");}
		global $conn;
		$idn=$id;
		$sql = "INSERT INTO user_courses (user_id, course_id)
    		VALUES ('" .$_SESSION['user']['id']."', '" . $id. "');";

		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$this->redirect("profile/index");
	}


	// user deleting course from his list
	public function drop($id){
		global $conn;
		$v1 = $_SESSION['user']['id'];
		$sql = "DELETE FROM user_courses where user_id = '$v1'  AND course_id = '$id' ";
		//echo $sql;
		//return ;

		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$this->redirect("profile/index");

	}

	public function user_finish($id){
		echo "course in finished";
	}


    /************************  instructor section  *******************/


	// create course
	public function create(){
		$this->view("courses/create");
	}

	//store course in database
	public function store(){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("user/loginview");}

		$name=$_POST['name'];
		$desc=$_POST['description'];
		$img=$_POST['image'];
		$duration_weeks=$_POST['duration_weeks'];
		$instructorid=$_SESSION['user']['id'];

		course_model::storeCourse_indatabase($name,$desc,$img,$instructorid,$duration_weeks);
		$this->redirect("profile/index");

	}
	
	public function edit($id){
		$this->view("courses/modify",["id"=>$id]);
	}

	public function update($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("user/loginview");}
		global $conn;
		$v1 = $_SESSION['user']['id'];
		$name=$_POST['name'];
		$desc=$_POST['description'];
		$img=$_POST['image'];
		$duration_weeks=$_POST['duration_weeks'];

		$sql = "UPDATE courses SET  name = '$name', description= '$desc',duration_weeks='$duration_weeks' WHERE id = '$id';";

		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$this->redirect("profile/index");
	}

	// delelte this course frorm the database
	public function deletefromDatabase($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("user/loginview");}
		$v1 = $_SESSION['user']['id'];
		course_model::deletefromDatabasee($v1,$id);
		$this->redirect("profile/index");
	}

	public function instructor_finish($id){

	}

}
