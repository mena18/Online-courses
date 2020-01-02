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

            <img src="<?=public_path($_SESSION['user']['image'])?>" width="50" class="rounded-circle mr-3">
            <span class="text-white"><?= $_SESSION['user']['name'] ?></span>
          </div>
          <ul class="navbar-nav flex-column mt-4">
            <li class="nav-item"><a href="<?=url('user/classroom')?>" class="nav-link text-white p-3  current"><i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard</a></li>
            <hr style="background-color:white;">
          <?php if(isset($course)){ ?>
            <li class="nav-item"><a href="<?=url('course/instructor_show/'.$course->id)?>" class="nav-link text-white p-3  sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i><?=$course->name?></a></li>
            <li class="nav-item"><a href="<?=url('lesson/show_all/'.$course->id)?>" class="nav-link text-white p-3  sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Lessons</a></li>
            <li class="nav-item"><a href="<?=url('assignment/show_all/'.$course->id)?>" class="nav-link text-white p-3  sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Assignments</a></li>
            <li class="nav-item"><a href="<?=url('quiz/show_all/'.$course->id)?>" class="nav-link text-white p-3  sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Quizzes</a></li>
            <li class="nav-item"><a href="<?=url('messages/instructor_inbox/'.$course->id)?>" class="nav-link text-white p-3  sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i>Inbox</a></li>
            <li class="nav-item"><a href="<?=url('course/course_info/'.$course->id)?>" class="nav-link text-white p-3  sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>info</a></li>
            <li class="nav-item"><a href="<?=url('resourses/instructor_resourses/'.$course->id)?>" class="nav-link text-white p-3  sidebar-link"><i class="fas fa-table text-light fa-lg mr-3"></i>Resourses</a></li>


          <?php } ?>
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
        <div class="col-xl-12 pt-3">
