<?php

class course extends Controller{

  /*************************************** User section ***************************************/

	public function index(){
		$courses = course_model::where(["finished"=>2]);
		$this->view("courses/index",["courses"=>$courses]);
	}

	// shows details for non register users
	public function details($id){
		$course = course_model::get($id);
		if(!$course){redirect("course/index");}
		$lessons = $course->lessons();
		$instructor = $course->instructor();
		$course_id = $course->id;


		$user_id=-1;
		if(isset($_SESSION['user'])){$user_id = $_SESSION['user']['id'];}

		$user_course = course_model::get_one("SELECT * FROM user_courses WHERE course_id = '$course_id'
		AND user_id = '$user_id' ");

		$text = 'Register';
		if($user_course){$text = 'Drop';}


		$this->view("courses/show2",['text'=>$text,'course'=>$course,"lessons"=>$lessons,"instructor"=>$instructor]);


	}

	// show course details for register users
	public function show($id){
		$course = course_model::get($id);
		if(!$course){redirect("course/index");}
		$user = user_model::get($_SESSION['user']['id']);


		$this->view("course_dashboard/index",['course'=>$course,"user"=>$user]);

	}

	// user_registration into course
	public function register($id){
		if(!isset($_SESSION['user'])){redirect("user/loginview");}

		course_model::toggle_in_course($_SESSION['user']['id'],$id);

		redirect("user/classroom");
	}


	// user deleting course from his list
	public function drop($id){
		if(!isset($_SESSION['user'])){redirect("user/loginview");}

		course_model::toggle_in_course($_SESSION['user']['id'],$id);
		redirect("user/classroom");

	}

	public function user_finish($id){

		if(!isset($_SESSION['user'])){redirect("user/loginview");}
		course_model::user_finish($_SESSION['user']['id'],$id);
		redirect("user/classroom");
	}


	public function week($course_id,$week_num){
		if(!isset($_SESSION['user'])){redirect("user/loginview");}

		$lessons = lesson_model::lessons_in_week($course_id,$week_num);
		$user = user_model::get($_SESSION['user']['id']);
		$course = course_model::get($course_id);
		$this->view("course_dashboard/week",['user'=>$user,'course'=>$course,"lessons"=>$lessons]);
	}


	public function info($course_id){
		$course = course_model::get($course_id);
		$this->view("course_dashboard/info",["course"=>$course]);
	}
	public function contact_instructor($course_id){
		$course = course_model::get($course_id);
		$messages = messages_model::where(["user_id"=>$_SESSION['user']['id'],"course_id"=>$course_id]);
		$this->view("course_dashboard/contact",["course"=>$course,"messages"=>$messages]);

	}

	public function contact_save($course_id){
		$message = new messages_model();
		$message->title = $_POST['title'];
		$message->body = $_POST['body'];
		$message->course_id = $course_id;
		$message->user_id = $_SESSION['user']['id'];

		$message->save();

		print_array($message);

		redirect("course_dashboard/index");

	}

	public function resourses($course_id){
		$course = course_model::get($course_id);
		$files = resourses_model::where(["course_id"=>$course_id]);
		$this->view("course_dashboard/resourses",["course"=>$course,"files"=>$files]);
	}


  /*************************************** instructor section ***************************************/


	// create course
	public function create(){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}
		$category = category_model::get_all();
		$this->view("instructor/courses/create",['category'=>$category]);
	}

	//store course in database
	public function store(){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}

		$image = upload_file('image');
		if(!$image){$image = 'uploads/default.jpg';}

		$course = new course_model();

		$course->name=$_POST['name'];
		$course->desc=$_POST['description'];
		$course->duration_weeks=$_POST['weeks'];
		$course->category_id=$_POST['category'];
		$course->instructorid=$_SESSION['user']['id'];
		$course->image=$image;

		$course->save();

		redirect("user/classroom");

	}

	public function edit($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}


		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){
			redirect("course/index");
		}
		$category = category_model::get_all();
		$this->view("instructor/courses/edit",["category"=>$category,"course"=>$course]);
	}

	public function update($id){

		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}


		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){
			redirect("course/index");
		}

		$image = upload_file('image');
		if($image){$course->image = $image;}


		$course->name=$_POST['name'];
		$course->description=$_POST['description'];

		$course->duration_weeks=$_POST['weeks'];
		$course->category_id=$_POST['category'];
		$course->update();

		redirect("user/classroom");
	}

	// delelte this course frorm the database
	public function delete($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}


		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){
			redirect("course/index");
		}

		$course->delete();
		redirect("user/classroom");
	}

	/* instructor mark the course as finished */
	public function instructor_finish($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}

		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){redirect("course/index");}

		$course->finished=1;
		$course->update();

		redirect("user/classroom");

	}

	public function instructor_un_finish($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}

		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){redirect("course/index");}

		$course->finished=0;
		$course->update();

		redirect("user/classroom");

	}

	public function course_info($course_id){
		$course = course_model::get($course_id);
		$this->view("instructor/courses/info",['course'=>$course]);
	}

	// show the course details for instructor
	public function instructor_show($course_id){
		$course = course_model::get($course_id);
		$this->view("instructor/courses/index",['course'=>$course]);
	}

	public function crr($n=1){
		for ($i=0; $i <$n ; $i++) {
			$arr = ["image_1.jpg","image_2.jpg","image_3.jpg","image_4.jpg"];
			course_model::save("Course_num_".rand(0,1000000),"standard desc","uploads/".$arr[rand(0,3)],0,0,0);
		}

		redirect("course/index");
	}

}
