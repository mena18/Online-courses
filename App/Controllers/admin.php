<?php

require_once(app_path("Models/admin_model.php"));
require_once(app_path("Models/course_model.php"));
require_once(app_path("Models/user_model.php"));
require_once(app_path("Models/category_model.php"));

class admin extends Controller{


  // show every thing all users,all instructors,all courses,all categories
  public function index(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $this->view("admin/index");
  }

  /* show every thing section */
  public function all_users(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $users = user_model::get_where("type","0");
    $this->view("admin/show_users",['users'=>$users]);
  }

  public function all_instructors(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $instructors = user_model::get_where("type","1");
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



  /* instructor section */
  public function create_instructor(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $this->view("admin/create_instructor");
  }

  public function store_instructor(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}

    $name = $_POST['name'];
    $email = $_POST['email'];

    user_model::create_instructor($name,$email);
    $instructor = user_model::get_where("email",$email);
    $instructor = $instructor[0];
    print_array($instructor);
  }

  public function delete_instructor($instructor_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    user_model::delete($instructor_id);
    redirect("admin/index");
  }



  /* Courses sections */
  public function hide_course($course_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    course_mode::instructor_finish($course_id); // set finish = 1
    redirect("admin/index");
  }

  public function accept_course($course_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    course_model::admin_finish($course_id); // set finish = 2
    redirect("admin/index");
  }

  public function delete_course($course_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    course_model::delete($course_id);
    redirect("admin/index");
  }






  /*Category section*/
  public function store_category(){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $name = "new";//$_POST['name'];
    category_model::store($name);
    redirect("admin/all_categories");

  }


  public function update_category($category_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    $name = "name2";//$_POST['name'];
    category_model::update($category_id,$name);
    redirect("admin/all_categories");
  }

  public function delete_category($category_id){
    if(!isset($_SESSION['user']) || $_SESSION['user']['type']!=2 ){echo "You aren't admin";return ;}
    category_model::delete($category_id);
    redirect("admin/all_categories");
  }



}
