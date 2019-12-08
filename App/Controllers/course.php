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
	public function details($id){
		$course = course_model::get($id);
		$lessons = lesson_model::get_with_course($id);
		if($course){
			$this->view("courses/show2",['course'=>$course,"lessons"=>$lessons]);
		}else{
			$this->redirect("course/index");
		}

	}

	// show course details for register users
	public function show($id){
		$course = course_model::get($id);
		$lessons = lesson_model::get_with_course($id);
		if($course){
			$this->view("courses/show1",['course'=>$course,"lessons"=>$lessons]);
		}else{
			$this->redirect("course/index");
		}
	}

	// user_registration into course
	public function register($id){
		if(!isset($_SESSION['user'])){$this->redirect("user/loginview");}

		course_model::toggle_in_course($_SESSION['user']['id'],$id);

		$this->redirect("profile/index");
	}


	// user deleting course from his list
	public function drop($id){
		if(!isset($_SESSION['user'])){$this->redirect("user/loginview");}

		course_model::toggle_in_course($_SESSION['user']['id'],$id);
		$this->redirect("profile/index");

	}

	public function user_finish($id){

		if(!isset($_SESSION['user'])){$this->redirect("user/loginview");}
		course_mode::user_finish($_SESSION['user']['id'],$id);
	
	}


    /************************  instructor section  *******************/


	// create course
	public function create(){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("course/index");}
		$category = course_model::get_all_categories();
		$this->view("courses/create",['category'=>$category]);
	}

	//store course in database
	public function store(){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("course/index");}

		$name=$_POST['name'];
		$desc=$_POST['description'];
		$image = upload_file('image');
		$duration_weeks=$_POST['weeks'];
		$category_id=$_POST['category'];

		$instructorid=$_SESSION['user']['id'];

		if(!$image){$image = 'uploads/default.jpg';}

		course_model::save($name,$desc,$image,$instructorid,$duration_weeks,$category_id);
		$this->redirect("profile/index");

	}
	
	public function edit($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("course/index");}


		$course = course_model::get($id);
		if($course['instructor_id']!=$_SESSION['user']['id']){
			$this->redirect("course/index");
		}
		$category = course_model::get_all_categories();
		
		$this->view("courses/edit",["category"=>$category,"course"=>$course]);
	}

	public function update($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("course/index");}


		$course = course_model::get($id);
		if($course['instructor_id']!=$_SESSION['user']['id']){
			$this->redirect("course/index");
		}

		$name=$_POST['name'];
		$description=$_POST['description'];
		$image = upload_file('image');
		$duration_weeks=$_POST['weeks'];
		$category_id=$_POST['category'];

		$instructorid = $_SESSION['user']['id'];


		if(!$image){$image = $course['image'];}

		
		course_model::update($id,$name,$description,$image,$instructorid,$duration_weeks,$category_id);
		$this->redirect("profile/index");
	}

	// delelte this course frorm the database
	public function delete($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){
			echo $_SESSION['user']['type'] != 1;
			echo "not allowed to delete ";
			
			$this->redirect("course/index");
		}



		$course = course_model::get($id);
		if($course['instructor_id']!=$_SESSION['user']['id']){
			$this->redirect("course/index");
		}

		course_model::delete($id);
		$this->redirect("profile/index");
	}

	/* instructor mark the course as finished */
	public function instructor_finish($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("course/index");}

		$course = course_model::get($id);
		if($course['instructor_id']!=$_SESSION['user']['id']){
			$this->redirect("course/index");
		}

		course_model::finish($id);
		$this->redirect("profile/index");

	}

	public function crr($n=1){
		for ($i=0; $i <$n ; $i++) { 
			$arr = ["image_1.jpg","image_2.jpg","image_3.jpg","image_4.jpg"];
			course_model::save("Course_num_".rand(0,1000000),"standard desc","uploads/".$arr[rand(0,3)],0,0,0);	
		}
		
		$this->redirect("course/index");
	}

}
