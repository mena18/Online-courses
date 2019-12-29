<?php

class assignment_model extends DataBase {

  public static $table_name = "assignment";
  public static $class_name = "assignment_model";

	public static $fill = ['course_id','week_num','description','dead_line',
  'total_marks','name'
];



  public function course(){
    $sql = "SELECT * FROM courses WHERE id = '$this->course_id' ;";
    return self::query_fetch($sql,"course_model");
  }

  public function users(){
		$sql = "SELECT user_assignment.*,user.* FROM user_assignment INNER JOIN user on user.id=user_assignment.user_id
		INNER JOIN assignment on assignment.id = user_assignment.assignment_id where assignment.id = '$this->id'";
		return self::query_fetch_all($sql,'user_model');
	}

  public function add_submition($path){
    $user = user_model::get($_SESSION['user']['id']);
    $sql="";
    if($user->user_assignment($this->id)){
      $sql = "UPDATE user_assignment SET user_assignment.path = '$path' WHERE user_id = '$user->id' AND assignment_id = '$this->id' ";
    }else{
      $sql = "INSERT INTO user_assignment (user_id,assignment_id,path)
      VALUES ('$user->id','$this->id','$path');";
    }
    self::query($sql);
  }

  public function grade_submition($assignment_submition_id,$marks){
    $user_id = $_SESSION['user']['id'];
    $sql = "UPDATE user_assignment SET marks = '$marks' WHERE id = '$assignment_submition_id';";
    self::query($sql);
  }

  public function grade($user_id,$mark,$comment){
    $sql = "UPDATE user_assignment SET marks = '$mark' , comment= '$comment' WHERE user_id = '$user_id' AND assignment_id = '$this->id';";
    self::query($sql);
  }





}
