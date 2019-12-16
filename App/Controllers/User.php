<?php

require_once(app_path("models/user_model.php"));
require_once(app_path("models/course_model.php"));

class User extends Controller{

	public function create(){
		$this->view("User/registration");
	}

	public function store(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name=$_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];


			global $conn;
			$sql = "INSERT INTO user (name, email,password)  VALUES ('$name', '$email','$password');";

    		$stmt = $conn->prepare($sql);
    		$stmt->execute();


    		$sql = "SELECT * from user WHERE email = '$email' AND password = '$password' ;";
    		$stmt = $conn->prepare($sql);
    		$stmt->execute();
    		$user = $stmt->fetch();

    		$_SESSION['user'] = $user;

    		redirect("course/index");
		}else{
			echo "you are not allowed here";
		}

	}


	public function loginview(){
		$this->view("user/login");
	}

	public function login(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			global $conn;
			try {

				$v1 = $_POST['email'];
				$v2 = $_POST['password'];
				$sql ="SELECT * FROM user WHERE email ='$v1' AND password = '$v2'";
	    		$stmt = $conn->prepare($sql);
	    		$stmt->execute();

	    		$user = $stmt->fetch(PDO::FETCH_ASSOC);

	    		if($stmt->rowCount() > 0){
	    			$_SESSION['user'] = $user;
	    		}

					if($user['type']==2){
						redirect("admin/index");
					}else{
						redirect("courses/index");
					}


			} catch (Exception $e) {
				echo $e;
			}
		}else{
			echo "you are not allowed here";
		}
	}


	public function logout(){
		session_destroy();
		header("Location: http://localhost/courses");
	}


	public function profile($instructor_id){
		$instructor = user_model::get($instructor_id);

		$courses = course_model::query_fetch_all("SELECT * FROM courses WHERE instructor_id = '$instructor_id' AND finished = '2'; ");
		if($instructor['type']!=1){redirect("courses/index");}

		$this->view("user/show_profile",["instructor"=>$instructor,"courses"=>$courses]);

	}


	public function edit_profile($instructor_id){
		echo "editing profile under construction";
	}

	public function update_profile($instructor_id){
		echo "update profile under construction";
	}



}
