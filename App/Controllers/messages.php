<?php

class  messages  extends Controller{

  public function instructor_inbox($course_id){
    $course = course_model::get($course_id);
    $this->view("instructor/contact",['course'=>$course]);
  }

}
