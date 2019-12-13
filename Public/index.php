<?php
$servername = "localhost";
$username = "root";
$password = "";

function public_path($st){
	return "http://localhost/courses/Public/" . $st;
}
function url($st){
	return "/courses/Public/" . $st;
}
function app_path($st){
	return "../App/" . $st;
}

try {

    $conn = new PDO("mysql:host=$servername;dbname=courses", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    require_once(app_path('Core/functions.php'));
    require_once(app_path('Core/App.php'));
  	require_once(app_path('Core/Controller.php'));
  	require_once(app_path('Core/DataBase.php'));
  	DataBase::$conn = $conn;
  	session_start();
  	$app = new App();


}catch(PDOException $e){
	echo $e;
}
