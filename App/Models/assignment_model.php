<?php

class assignment_model extends DataBase {

  public static $table_name = "assignment";
  public static $class_name = "assignment_model";

	public static $fill = ['name'];



  public function courses(){
    $sql = "SELECT * FROM courses WHERE id = '$this->course_id' ;";
    return self::query_fetch($sql,"course_model");
  }



}
