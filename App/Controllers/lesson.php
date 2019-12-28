<?php

class lesson extends Controller{


	/*************************************** User section ***************************************/
	public function show($id){
		if(!isset($_SESSION['user'])){echo "you are not logged in";return ;}

		$lesson = lesson_model::get($id);
		$course = $lesson->course();
		$user = user_model::get($_SESSION['user']['id']);

		$var = lesson_model::check_user_registration($_SESSION['user']['id'],$lesson->course_id);
		if(!$var && $_SESSION['user']['type']==0){echo "you don't take this course";return ;}


		$watched = 0;
		if($user->watched($lesson->id)){$watched=1;}
		if($user->type>0){
			$watched=-1;

			if($course->instructor_id == $user->id ){$watched=2;}
		}

		$this->view("lessons/show",["lesson"=>$lesson,"watched"=>$watched]);
	}

	public function mark($id){

		if(!islogedin()){echo "you are not logged in";return ;}
		$lesson = lesson_model::get($id);

		$var = lesson_model::check_user_registration($_SESSION['user']['id'],$lesson->course_id);
		if(!$var){echo "you don't take this course";return ;}

		lesson_model::toggle_watching($_SESSION['user']['id'],$id);
		echo json_encode(["one"=>"two"]);
		#redirect("/lesson/show/".$lesson->id);
	}


	/*************************************** Instructor section ***************************************/


	// instructor create lesson
	public function create($id){
		$course = course_model::get($id);

		$this->view("instructor/lessons/create",["course"=>$course]);
	}

	public function store($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("user/loginview");}

		$course = course_model::get($id);
		if($course->instructor_id!=$_SESSION['user']['id']){redirect("user/classroom");}

		$lesson = new lesson_model();

		$lesson->name=$_POST['name'];
		$lesson->week_number=$_POST['week_number'];
		$lesson->number=$_POST['number'];
		$lesson->description=$_POST['description'];
		$lesson->duration =  $_POST['duration_h']*3600 + $_POST['duration_m']*60; + $_POST['duration_s'];;
		$lesson->course_id=$id;

		if(strpos($_POST['video_id'], "?v=")){
			$lesson->video_id=explode("&",explode("?v=",$_POST['video_id'])[1])[0];
		}else{
			$lesson->video_id=$_POST['video_id'];
		}



		$lesson->save();

		redirect("user/classroom");
	}


	public function edit($id){
		$lesson = lesson_model::get($id);
		$course = course_model::get($lesson->course_id);

		$this->view("instructor/lessons/edit",["lesson"=>$lesson]);
	}

	public function update($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("user/loginview");}

		$lesson = lesson_model::get($id);
		$course = course_model::get($lesson->course_id);
		if($course->instructor_id!=$_SESSION['user']['id']){redirect("user/classroom");}


		$lesson->name=$_POST['name'];
		$lesson->week_number=$_POST['week_number'];
		$lesson->number=$_POST['number'];
		$lesson->description=$_POST['description'];
		$lesson->duration =  $_POST['duration_h']*3600 + $_POST['duration_m']*60; + $_POST['duration_s'];
		$lesson->course_id=$course->id;

		if(strpos($_POST['video_id'], "?v=")){
			$lesson->video_id=explode("&",explode("?v=",$_POST['video_id'])[1])[0];
		}else{
			$lesson->video_id=$_POST['video_id'];
		}

		$lesson->update();

		redirect("lesson/edit/".$id);
	}

	public function delete($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){redirect("user/loginview");}

		$lesson = lesson_model::get($id);
		$course = $lesson->course();
		if($course->instructor_id!=$_SESSION['user']['id']){redirect("user/classroom");}

		$lesson->delete();

		redirect("user/classroom");
	}

	public function show_all($course_id){
		$course = course_model::get($course_id);
		$this->view("instructor/lessons/show_all",['course'=>$course]);
	}

	public function show_all_users($lesson_id){
		$lesson = lesson_model::get($lesson_id);
		$this->view("instructor/lessons/show_users",['lesson'=>$lesson]);

	}

}
