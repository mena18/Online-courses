<?php


class messages_model extends DataBase{

  	public static $table_name = "messages";
  	public static $class_name = "messages_model";
  	public static $fill = ['user_id','course_id',
  	'title','body','archived','responde'];
}
