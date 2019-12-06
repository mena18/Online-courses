<?php


require_once("App/Models/lesson_model.php");

class lesson extends Controller{

	public function show($id){
		if(!islogedin()){echo "you are not logged in";return ;}

		$lesson = lesson_model::get($id);
		if($_SESSION['user']['type']==1){
			if(lesson_model::is_watched($_SESSION['user']['id'],$lesson['id'])){
				$watched=1;
			}
		}
		else
		{
			$var = lesson_model::check_user_registration($_SESSION['user']['id'],$lesson['course_id']);
			if(!$var){echo "you don't take this course";return ;}

			$watched = 0;
		if(lesson_model::is_watched($_SESSION['user']['id'],$lesson['id'])){
			$watched=1;
		}
	}
		$this->view("lessons/show",["lesson"=>$lesson,"watched"=>$watched]);
	}

	public function mark($id){

		if(!islogedin()){echo "you are not logged in";return ;}
		$lesson = lesson_model::get($id);

		$var = lesson_model::check_user_registration($_SESSION['user']['id'],$lesson['course_id']);
		if(!$var){echo "you don't take this course";return ;}

		lesson_model::toggle_watching($_SESSION['user']['id'],$id);
		$this->redirect("/lesson/show/".$lesson['id']);
	}

	// instructor create lesson
	public function create($id){
		$this->view("lessons/create",["id"=>$id]);
	}

	public function storeLesson_inDatabase($id){
		if(!isset($_SESSION['user'])||$_SESSION['user']['type']!=1){$this->redirect("user/loginview");}

		$name=$_POST['name'];
		$weeks_number=$_POST['week_number'];
		$number=$_POST['number'];
		$desc=$_POST['description'];
		lesson_model::insert_lesson($number,$weeks_number,$name,$id,$desc);
		$this->redirect("profile/index");
	}
}
