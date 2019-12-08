<?php
$servername = "localhost";
$username = "root";
$password = "";


try {
	
    $conn = new PDO("mysql:host=$servername;dbname=courses", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    require_once("App/Core/App.php");
    require_once("App/Core/functions.php");
	require_once("App/Core/Controller.php");
	require_once("App/Core/DataBase.php");
	DataBase::$conn = $conn;
	session_start();
	$app = new App();


}catch(PDOException $e){
	echo $e;
}

