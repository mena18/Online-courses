<?php

class category_model extends DataBase {


  public function store($name){
    $sql = "INSERT INTO category (name) VALUES ('$name');";
    self::query($sql);
  }

  public function update($id,$name){
    $sql = "UPDATE category SET name = '$name' WHERE id = '$id' ;";
    self::query($sql);
  }

  public function delete($id){
    $sql = "DELETE  FROM category WHERE id = '$id' ;";
    self::query($sql);
  }

  public function get_all(){
		$sql = "SELECT * FROM category";
		return self::query_fetch_all($sql);
	}

	public function get($id){
		$sql = "SELECT * FROM category WHERE id = '$id' ";
		return self::query_fetch($sql);
	}


}
