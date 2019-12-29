<?php

class resourses_model extends DataBase{

  	public static $table_name = "resourses";
  	public static $class_name = "resourses_model";
  	public static $fill = ['week_num','course_id',
  	'path','name'];



    public function course(){
      $sql = "SELECT * FROM courses WHERE id = '$this->course_id' ;";
      return self::query_fetch($sql,"course_model");
    }

}
