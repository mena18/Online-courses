<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo public_path('css/main.css'); ?>" crossorigin="anonymous">
</head>

<body>

<div class="header">
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['type']==2 ){ ?>
      <a href="<?=url("admin/index")?>" class="logo">Courses Website</a>
    <?php }else{ ?>
      <a href="<?=url("course/index")?>" class="logo">Courses Website</a>
    <?php } ?>
  <div class="header-right">

      <?php if(isset($_SESSION['user'])){ ?>
        <a href='<?=url("profile/index")?>'><?=$_SESSION['user']['name']?></a>
        <a href='<?=url("user/logout")?>'>Logout</a>
      <?php }else{ ?>
        <a href='<?=url("user/create")?>'>Registration</a>
        <a href='<?=url("profile/loginview")?>'>Login</a>
      <?php } ?>



  </div>
</div>
