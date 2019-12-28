<?php

class resourses_model extends DataBase{

  	public static $table_name = "resourses";
  	public static $class_name = "resourses_model";
  	public static $fill = ['week_num','course_id',
  	'path','name'];
}
