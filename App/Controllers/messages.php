<?php

class  messages  extends Controller{

  public function instructor_inbox($course_id){
    $course = course_model::get($course_id);
    $this->view("instructor/contact",['course'=>$course]);
  }

  public function responde($message_id){

    $message = messages_model::get($message_id);
    $message->archived=1;
    $message->responde=$_POST['responde'];
    $message->update();


    redirect("messages/instructor_inbox/".$message->course_id);
  }

}
