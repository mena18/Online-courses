<?php

class assignment extends Controller{

  public function show($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $course = $assignment->course();

    $this->view("course_dashboard/assignment",["assignment"=>$assignment,"course"=>$course]);
  }

  public function submit($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $file = upload_file("assignment");
    $assignment->add_submition($file);

    redirect("assignment/show/".$assignment->id);
  }



  /************************************ Instructor section ********************************************** */

  public function create($course_id){
    $course = course_model::get($course_id);
    $this->view("instructor/assignments/create",['course'=>$course]);
  }

  public function store($course_id){
    $assignment = new assignment_model();
    $assignment->course_id = $course_id;
    $assignment->week_num = $_POST['week_num'];
    $assignment->description = $_POST['description'];
    $assignment->dead_line = $_POST['dead_line'];
    $assignment->name = $_POST['name'];
    $assignment->total_marks = $_POST['total_marks'];
    $assignment->save();

    redirect("assignment/show_all/".$assignment->course()->id);

  }

  public function edit($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $this->view("instructor/assignments/edit",['assignment'=>$assignment]);
  }

  public function update($assignment_id){
    $assignment = assignment_model::get($assignment_id);

    $assignment->week_num = $_POST['week_num'] ? $_POST['week_num'] : $assignment->week_num ;
    $assignment->name = $_POST['name'] ? $_POST['name'] : $assignment->name ;
    $assignment->dead_line = $_POST['dead_line'] ? $_POST['dead_line'] : $assignment->dead_line ;
    $assignment->total_marks = $_POST['total_marks'] ? $_POST['total_marks'] : $assignment->total_marks ;
    $assignment->description = $_POST['description'] ? $_POST['description'] : $assignment->description ;

    $assignment->update();

    redirect("assignment/show_all/".$assignment->course()->id);
  }

  public function delete($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $assignment->delete();

    redirect("assignment/show_all/".$course_id);
  }

  public function show_all($course_id){
    $course = course_model::get($course_id);
    $this->view("instructor/assignments/show_all",['course'=>$course]);
  }

  public function show_all_users($assignment_id){
    $assignment = assignment_model::get($assignment_id);
    $this->view("instructor/assignments/show_users",['assignment'=>$assignment]);
  }

  public function grade($user_id,$assignment_id){
    print_array($_POST);
    //return 0;
    $assignment = assignment_model::get($assignment_id);
    $assignment->grade($user_id,$_POST['marks'],$_POST['comment']);
    redirect("assignment/show_all_users/".$assignment->id);
  }



}
