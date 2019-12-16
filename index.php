<?php

session_start();
$servername = "localhost";
$dbname= "courses";
$username = "root";
$password = "";

function public_path($st){
	return "http://localhost/courses/Public/" . $st;
}
function url($st){
	return "/courses/" . $st;
}
function app_path($st){
	return "App/" . $st;
}
function redirect($path){
	header("Location: http://localhost/courses/".$path);
	exit();
}


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    require_once(app_path('Core/functions.php'));
    require_once(app_path('Core/App.php'));
  	require_once(app_path('Core/Controller.php'));
  	require_once(app_path('Core/DataBase.php'));
  	DataBase::$conn = $conn;
  	$app = new App();


}catch(PDOException $e){
	echo $e;
}
