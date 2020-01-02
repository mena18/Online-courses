<?php

class User extends Controller{

	public function create(){
		$this->view("User/registration");
	}

	public function store(){
			$user = new user_model();
			$user->name=$_POST['name'];
			$user->email = $_POST['email'];
			$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$user->save();

			$user = user_model::where(["email"=>$user->email,"password"=>$user->password]);
    	$_SESSION['user'] = (array)$user[0];

    	redirect("course/index");


	}


	public function loginview(){
		$this->view("user/login");
	}

	public function login(){
				$user = user_model::where(["email"=>$_POST['email']]);
				$vert =  password_verify($_POST['password'],$user[0]->password);
				if(!$vert){redirect("user/loginview",'error','email or password is wrong');}
				$_SESSION['user'] = (array)$user[0];

				if($user->type==2){redirect("admin/index");}
				else{redirect("courses/index");}
	}


	public function logout(){
		session_destroy();
		redirect("courses/index");
	}

	public function classroom(){
		// print_array($_SESSION);
		// exit();
		if(!isset($_SESSION['user'])){redirect("user/loginview");}
		if($_SESSION['user']['type']==2){redirect("admin/index");}


		$user = user_model::get( $_SESSION['user']['id']);
		if($_SESSION['user']['type']==1){
			$courses = $user->courses();
			$this->view("instructor/index",["courses"=>$courses]);
		}else{
			$finished_courses = $user->finished_courses();
			$current_courses = $user->current_courses();
			$this->view("user/profile_user",["finished_courses"=>$finished_courses,"courses"=>$current_courses]);

		}

	}

	public function profile($instructor_id){
		$instructor = user_model::get($instructor_id);

		$courses = course_model::where(['instructor_id' => $instructor_id , 'finished' => 2 ]);
		if($instructor->type!=1){redirect("courses/index");}

		$this->view("user/show_profile",["instructor"=>$instructor,"courses"=>$courses]);

	}


	public function edit_profile($instructor_id){
		$instructor = user_model::get($instructor_id);
		if($_SESSION['user']['id']!=$instructor->id){redirect("courses/index");}

		$this->view("user/edit_profile",['instructor'=>$instructor]);


	}

	public function update_profile($instructor_id){
		$instructor = user_model::get($instructor_id);
		if($_SESSION['user']['id']!=$instructor->id){redirect("courses/index");}

		$image = upload_file('image');
		if($image){$instructor->image=$image;}

		$instructor->name=$_POST['name'];
		$instructor->description=$_POST['description'];
		$instructor->email=$_POST['email'];
		$instructor->bio=$_POST['bio'];

		$instructor->facebook=$_POST['facebook'];
		$instructor->twitter=$_POST['twitter'];
		$instructor->linkedin=$_POST['linkedin'];
		$instructor->github=$_POST['github'];

		$instructor->update();

		redirect("user/profile/".$instructor_id);
	}



}
