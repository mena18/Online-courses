<?php

class assignment extends Controller{

  public function show($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $course = $assignment->courses();

    $this->view("course_dashboard/assignment",["assignment"=>$assignment,"course"=>$course]);
  }



  /************************************ Instructor section ********************************************** */

  public function create($course_id){
    $course = course_model::get($course_id);
    $this->view("instructor/assignments/create",['course'=>$course]);
  }

  public function save(){

  }

  public function edit($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $this->view("instructor/assignments/edit",['assignment'=>$assignment]);
  }

  public function update($assignment_id){

  }

  public function delete(){

  }

  public function show_all($course_id){
    $course = course_model::get($course_id);
    $this->view("instructor/assignments/show_all",['course'=>$course]);
  }

  public function show_uploads($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $this->view("instructor/assignments/uploads",['course'=>$course]);
  }

}
