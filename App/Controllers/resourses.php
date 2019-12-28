<?php

class  resourses  extends Controller{

  public function instructor_resourses($course_id){
    $course = course_model::get($course_id);
    $this->view("instructor/courses/resourses",['course',$course]); 
  }

}
