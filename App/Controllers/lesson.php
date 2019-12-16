<?php


require_once(app_path('Models/lesson_model.php'));
require_once(app_path('Models/course_model.php'));

class lesson extends Controller{

	public function show($id){
		if(!islogedin()){echo "you are not logged in";return ;}
		$lesson = lesson_model::get($id);
		$course = course_model::get($lesson['course_id']);


		$var = lesson_model::check_user_registration($_SESSION['user']['id'],$lesson['course_id']);
		if(!$var && $_SESSION['user']['type']==0){echo "you don't take this course";return ;}


		$watched = 0;
		if(lesson_model::is_watched($_SESSION['user']['id'],$lesson['id'])){$watched=1;}
		if($_SESSION['user']['type']>0){
			$watched=-1;

			if($course['instructor_id'] == $_SESSION['user']['id']){$watched=2;}
		}

		$this->view("lessons/show",["lesson"=>$lesson,"watched"=>$watched]);
	}

	public function mark($id){

		if(!islogedin()){echo "you are not logged in";return ;}
		$lesson = lesson_model::get($id);

		$var = lesson_model::check_user_registration($_SESSION['user']['id'],$lesson['course_id']);
		if(!$var){echo "you don't take this course";return ;}

		lesson_model::toggle_watching($_SESSION['user']['id'],$id);
		redirect("/lesson/show/".$lesson['id']);
	}

	// instructor create lesson
	public function create($id){
		$course = course_model::get($id);

		$this->view("lessons/create",["course"=>$course]);
	}

	public function store($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("user/loginview");}

		$course = course_model::get($id);
		if($course['instructor_id']!=$_SESSION['user']['id']){redirect("profile/index");}

		$name=$_POST['name'];
		$weeks_number=$_POST['week_number'];
		$number=$_POST['number'];
		$desc=$_POST['description'];
		$video_id=$_POST['video_id'];
		lesson_model::insert_lesson($number,$weeks_number,$name,$id,$desc,$video_id);

		course_model::update_one($course['id'],"videos",$course['videos']+1);

		redirect("profile/index");
	}


	public function edit($id){
		$lesson = lesson_model::get($id);
		$course = course_model::get($lesson['course_id']);

		$this->view("lessons/edit",["lesson"=>$lesson]);
	}

	public function update($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("user/loginview");}

		$lesson = lesson_model::get($id);
		$course = course_model::get($lesson['course_id']);
		if($course['instructor_id']!=$_SESSION['user']['id']){redirect("profile/index");}

		$name=$_POST['name'];
		$weeks_number=$_POST['week_number'];
		$number=$_POST['number'];
		$desc=$_POST['description'];
		$video_id=$_POST['video_id'];
		lesson_model::update_lesson($id,$number,$weeks_number,$name,$desc,$video_id);
		redirect("profile/index");
	}

	public function delete($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("user/loginview");}

		$lesson = lesson_model::get($id);
		$course = course_model::get($lesson['course_id']);
		if($course['instructor_id']!=$_SESSION['user']['id']){redirect("profile/index");}

		lesson_model::delete($id);
		course_model::update_one($course['id'],"videos",$course['videos']-1);
		redirect("profile/index");
	}
}
