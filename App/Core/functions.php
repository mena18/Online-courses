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