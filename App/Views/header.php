<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo public_path('css/main.css'); ?>" crossorigin="anonymous">
</head>

<body>

<?php $category = category_model::get_all(); ?>

<nav class="navbar navbar-expand-md navbar-custom shadow-sm ">
    <div class="pr-5 pl-5 pb-1 pt-1" style="width:100%;margin:auto;">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['type']==2 ){ ?>
                  <a href="<?=url("admin/index")?>" class="navbar-brand">Courses Website</a>
                <?php }else{ ?>
                  <a href="<?=url("course/index")?>" class="navbar-brand">Courses Website</a>
                <?php } ?>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Explore
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php foreach ($category as $cat) { ?>
                    <a class="dropdown-item" href="<?=url("course/index/".$cat->id)?>"><?=$cat->name?></a>
                  <?php } ?>

                </div>
              </li>
              <li class="nav-item">
                <form action="<?=url('course/search')?>" method='POST' class="form-inline my-2 my-lg-0">
                  <input name='search' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </li>

             </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <?php if(!isset($_SESSION['user'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url('user/loginview') ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url('user/create') ?>">Register</a>
                    </li>

                <?php }else{?>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <?= $_SESSION['user']['name'] ?> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <?php if($_SESSION['user']['type']==1){ ?>
                          <a class="dropdown-item" href="<?= url('user/profile/'.$_SESSION['user']['id']) ?>">Profile</a>
                          <a class="dropdown-item" href="<?= url('user/edit_profile/'.$_SESSION['user']['id']) ?>">Edit Profile </a>
                        <?php }?>
                          <a class="dropdown-item" href="<?= url('user/classroom') ?>">My class room </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="<?= url('user/logout'); ?>">
                                Logout
                            </a>


                    </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
