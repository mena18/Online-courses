<?php


function public_path($st){
	return "http://localhost/courses/Public/" . $st;
}

//only for testing should remove later 
function print_array($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

function islogedin(){
	return isset($_SESSION['user']);
}

function upload_file($name){
	if(!$_FILES['image']['name']){return "";}
	$img=$_FILES[$name];
	$extention = explode('.', $img['name'])[1];
	$img_name = "uploads/".uniqid('',true) .".". $extention;
	move_uploaded_file($img["tmp_name"],"Public/".$img_name);
	return $img_name;
}