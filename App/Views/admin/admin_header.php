<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="<?=public_path('images/title-img.png')?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="<?=public_path('css/admin_style.css')?>">

    <title>Admin Dashboard</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
              <a href="<?= url('course/index'); ?>" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Online Courses</a>
              <div class="bottom-border pb-3">
                <img src="<?=public_path('images/admin.jpeg')?>" width="50" class="rounded-circle mr-3">
                <span class="text-white"><?= $_SESSION['user']['name'] ?></span>
              </div>
              <ul class="navbar-nav flex-column mt-4">
                <li class="nav-item"><a href="<?= url('admin/index') ?>" class="nav-link text-white p-3 mb-2 current"><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
                <li class="nav-item"><a href="<?=url('admin/all_courses')?>" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Courses</a></li>
                <li class="nav-item"><a href="<?=url('admin/all_users')?>" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Users</a></li>
                <li class="nav-item"><a href="<?=url('admin/all_categories')?>" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Categories</a></li>
                <li class="nav-item"><a href="<?=url('admin/all_instructors')?>" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Instructor</a></li>
              </ul>
            </div>
            <!-- end of sidebar -->

            <!-- top-nav -->
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
              <div class="row align-items-center">
                <div class="col-md-4">
                  <h4 class="text-light text-uppercase mb-0"><a class="navbar-brand text-white" href="<?= url('admin/index') ?>">Dashboard</a></h4>
                </div>
                <div class="col-md-5">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control search-input" placeholder="Search...">
                      <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-danger"></i></button>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <ul class="navbar-nav">
                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a></li>
                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a></li>
                    <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- end of top-nav -->
          </div>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->

    <!-- modal -->
    <div class="modal fade" id="sign-out">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Want to leave?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            Press logout to leave
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
            <a href="<?=url('user/logout')?>" type="button" class="btn btn-danger" >Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end of modal -->



    <section>
      <div class="container-fluid">
        <div class="row mb-5">
          <div class="col-xl-10  ml-auto mt-5">
            <div class="row align-items-center">
              <div class="col-xl-12 pr-5 pl-5">
