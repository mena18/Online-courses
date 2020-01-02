<?php

class admin extends Controller{

  /*************************************** Index ***************************************/
  public function index(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $count_courses = course_model::count();
    $count_categories = category_model::count();
    $count_users = user_model::count_users();
    $count_instructors = user_model::count_instructors();

    $this->view("admin/index",[
      "count_courses"=>$count_courses,
      "count_categories"=>$count_categories,
      "count_users"=>$count_users,
      "count_instructors"=>$count_instructors,
    ]);
  }

  /*************************************** show all section ***************************************/
  public function all_users(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $users = user_model::where(["type"=>0]);
    $this->view("admin/show_users",['users'=>$users]);
  }

  public function all_instructors(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $instructors = user_model::where(["type"=>1]);
    $this->view("admin/show_instructors",['instructors'=>$instructors]);
  }

  public function all_categories(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $categories = category_model::get_all();
    $this->view("admin/show_categories",['categories'=>$categories]);
  }

  public function all_courses(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $courses = course_model::get_all();
    $this->view("admin/show_courses",['courses'=>$courses]);
  }



  /*************************************** instructor section ***************************************/
  public function create_instructor(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $this->view("admin/create_instructor");
  }

  public function store_instructor(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}

    $ins = new user_model();
    $ins->name = $_POST['name'];
    $ins->email = $_POST['email'];
    $ins->type = 1;
    $ins->password = password_hash($_POST['password'], PASSWORD_DEFAULT);//generate_random_password(15);
    $ins->save();

    redirect('admin/index','success',"instructor created successfuly");
  }

  public function delete_instructor($instructor_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $us = user_model::get($instructor_id);
    $us->delete();
    redirect("admin/index");
  }



  /*************************************** courses section ***************************************/
  public function pend_course($course_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    course_model::instructor_finish($course_id); // set finish = 1
    redirect("admin/all_courses");
  }

  public function accept_course($course_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    course_model::admin_finish($course_id); // set finish = 2
    redirect("admin/all_courses");
  }

  public function delete_course($course_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $course = course_model::get($course_id);
    $course->delete();
    redirect("admin/all_courses");
  }






  /*************************************** category section ***************************************/
  public function store_category(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $category = new category_model();
    $category->name = $_POST['name'];
    $category->save();
    redirect('admin/all_categories','success',"cateogry created successfuly");

  }


  public function update_category($category_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $category = category_model::get($category_id);
    $category->name = $_POST['name'];
    $category->update();
    redirect("admin/all_categories");
  }

  public function delete_category($category_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $category = category_model::get($category_id);
    $category->delete();
    redirect("admin/all_categories");
  }



}
