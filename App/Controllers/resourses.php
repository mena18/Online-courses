<?php

class  resourses  extends Controller{


  public function all($course_id){
    $course = course_model::get($course_id);
    $this->view("course_dashboard/resourses",["course"=>$course]);
  }

  public function instructor_resourses($course_id){
    $course = course_model::get($course_id);

    $this->view("instructor/courses/resourses",['course'=>$course]);
  }

  public function store($course_id){
    $resourse = new resourses_model();

    $resourse->name=$_POST['name'];
    $resourse->path = upload_file('path');
    $resourse->week_num=$_POST['week_num'];
    $resourse->course_id = $course_id;

    $resourse->save();

    redirect("resourses/instructor_resourses/".$course_id);
  }

  public function update($resourse_id){
    $resourse = resourses_model::get($resourse_id);
    $resourse->name=$_POST['name'];
    $path = upload_file('path');
    if($path){
      $resourse->path = $path;
    }
    $resourse->week_num=$_POST['week_num'];
    $resourse->update();

    redirect("resourses/instructor_resourses/".$resourse->course()->id);
  }

  public function delete($resourse_id){
    $resourse = resourses_model::get($resourse_id);
    $resourse->delete();
    redirect("resourses/instructor_resourses/".$resourse->course()->id);

  }



}
