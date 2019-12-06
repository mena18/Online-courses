<?php 


class DataBase{
	public static $conn;
	
	public function query_fetch_all($sql){
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function query_fetch($sql){
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function query($sql){
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
	}

	

}

