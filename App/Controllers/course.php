<?php

require_once(app_path('Models/course_model.php'));
require_once(app_path('Models/lesson_model.php'));
require_once(app_path('Models/user_model.php'));
require_once(app_path('Models/category_model.php'));

class course extends Controller{

	/************************  User section  *******************/

	public function index(){
		$courses = course_model::where(["finished"=>2]);
		$this->view("courses/index",["courses"=>$courses]);
	}

	// shows details for non register users
	public function details($id){
		$course = course_model::get($id);
		$lessons = $course->lessons();
		$instructor = $course->instructor();
		$course_id = $course->id;


		$user_id=-1;
		if(isset($_SESSION['user'])){$user_id = $_SESSION['user']['id'];}

		$user_course = course_model::get_one("SELECT * FROM user_courses WHERE course_id = '$course_id'
		AND user_id = '$user_id' ");

		$text = 'Register';
		if($user_course){$text = 'Drop';}

		if($course){
			$this->view("courses/show2",['text'=>$text,'course'=>$course,"lessons"=>$lessons,"instructor"=>$instructor]);
		}else{
			redirect("course/index");
		}


	}

	// show course details for register users
	public function show($id){
		$course = course_model::get($id);
		$user = user_model::get($_SESSION['user']['id']);

		$instructor = $course->instructor();
		$course_id = $course->id;
		$user_id = $user->id;

		if(!$course){redirect("course/index");}


		/*
		$lessons = course_model::query_fetch_all("
			SELECT lesson.*,T.finished FROM lesson LEFT JOIN
			(SELECT user_lesson.finished,user_lesson.lesson_id,user.id
			FROM user_lesson INNER join user on user.id = user_lesson.user_id WHERE user.id = $user_id ) AS T
			on T.lesson_id = lesson.id WHERE lesson.course_id = $course_id ORDER BY lesson.number;  ");
*/

	$lessons = $course->lessons();

		$weeks = [];
		foreach ($lessons as $less) {
			$weeks[$less->week_number][] = $less;
		}

		$this->view("courses/show1",['course'=>$course,"user"=>$user,"weeks"=>$weeks,"instructor"=>$instructor]);

	}

	// user_registration into course
	public function register($id){
		if(!isset($_SESSION['user'])){redirect("user/loginview");}

		course_model::toggle_in_course($_SESSION['user']['id'],$id);

		redirect("profile/index");
	}


	// user deleting course from his list
	public function drop($id){
		if(!isset($_SESSION['user'])){redirect("user/loginview");}

		course_model::toggle_in_course($_SESSION['user']['id'],$id);
		redirect("profile/index");

	}

	public function user_finish($id){

		if(!isset($_SESSION['user'])){redirect("user/loginview");}
		course_model::user_finish($_SESSION['user']['id'],$id);

	}


    /************************  instructor section  *******************/


	// create course
	public function create(){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}
		$category = category_model::get_all();
		$this->view("courses/create",['category'=>$category]);
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

		redirect("profile/index");

	}

	public function edit($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}


		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){
			redirect("course/index");
		}
		$category = category_model::get_all();
		$this->view("courses/edit",["category"=>$category,"course"=>$course]);
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

		redirect("profile/index");
	}

	// delelte this course frorm the database
	public function delete($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("course/index");}


		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){
			redirect("course/index");
		}

		course_model::delete($id);
		redirect("profile/index");
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

	public function crr($n=1){
		for ($i=0; $i <$n ; $i++) {
			$arr = ["image_1.jpg","image_2.jpg","image_3.jpg","image_4.jpg"];
			course_model::save("Course_num_".rand(0,1000000),"standard desc","uploads/".$arr[rand(0,3)],0,0,0);
		}

		redirect("course/index");
	}

}
