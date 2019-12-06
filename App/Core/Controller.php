<?php


class Controller {

  function model($model){
    require_once('App/Models/'.$model.'.php');
    return new $model;
  }

  function view($view,$data=[]){
    require_once("App/Views/".$view .".php");
  }

  function redirect($path){
    header("Location: http://localhost/courses/".$path);
  }
}
