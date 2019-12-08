<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo public_path('css/main.css'); ?>" crossorigin="anonymous">
</head>

<body>

<div class="header">
  <a href="/courses/course/index" class="logo">Courses Website</a>
  <div class="header-right">
    <?php

      if(isset($_SESSION['user'])){  
        echo "<a href='/courses/profile/index'>". $_SESSION['user']['name'] ."</a>;";

        echo "<a href='/courses/user/logout'>Logout</a>";
      }else{
        echo "<a href='/courses/user/create'>Registration</a>";
        echo "<a href='/courses/user/loginview'>Login</a>";
      }

    ?>

  </div>
</div>

