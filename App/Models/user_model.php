<?php

class user_model extends DataBase{

	public function get($id){
		$sql = "SELECT * FROM user WHERE id = '$id' ";
		return self::query_fetch($sql);
	}

  public function get_where($type,$value){
    $sql = "SELECT * FROM user WHERE $type = '$value' ";
    return self::query_fetch_all($sql);
  }

  public function get_all(){
    $sql = "SELECT * FROM user ";
    return self::query_fetch_all($sql);
  }


	public function create_user(){

	}

	public function create_instructor($name,$email){
		$password = generate_random_password(15);
		$sql = "INSERT INTO user (name,email,password,type)
		VALUES ('$name','$email','$password','1');";
		self::query($sql);
	}

	public function delete($id){
		$sql = "DELETE FROM user WHERE id = '$id';";
		self::query($sql);
	}


}
