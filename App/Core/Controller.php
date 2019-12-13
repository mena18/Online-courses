<?php


class Controller {

  function model($model){
    require_once(app_path('Models/'.$model .".php"));
    return new $model;
  }

  function view($view,$data=[]){
    require_once(app_path('Views/'.$view .".php"));
  }

  function redirect($path){
    header("Location: http://localhost/courses/Public/".$path);
    exit();
  }
}
