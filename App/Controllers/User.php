<?php


class User extends Controller{

	public function create(){
		$this->view("User/registration");
	}

	public function store(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name=$_POST['name'];
		$type=$_POST['Instructor'];
		 											 //momken ta3mel keda  >
			global $conn;
			if (empty($type)){
			$sql = "INSERT INTO user (Name, email,password)
    		VALUES ('$name', '" . $_POST['email']. "',  '" . $_POST['password'] ."');";
			}
			else {
				$sql = "INSERT INTO user (Name, email,password,type)
	    		VALUES ('$name', '" . $_POST['email']. "',  '" . $_POST['password'] ."','$type');";

			}
    		//echo $sql;
    		//sreturn ;
    		$stmt = $conn->prepare($sql);
    		$stmt->execute();

    		header("Location: http://localhost/courses/user/loginview");
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

	    		header("Location: http://localhost/courses");

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


}
