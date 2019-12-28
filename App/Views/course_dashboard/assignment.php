<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));
$assignment = $data['assignment'];
$d = new DateTime($assignment->dead_line);
$user = user_model::get($_SESSION['user']['id']);
?>

<div class="jumbotron">
  <h1 class="display-4">Hello <?=$_SESSION['user']['name']?></h1>
  <p class="lead">Here you submit your Assignment (<?=$assignment->name?>)</p>
  <hr class="my-4">
  <h4 class="pb-2">Assignment Details</h4>
  <p class="pl-4"><?=$assignment->description?></p>
  <hr>
  <div class="pb-5">
    <p>We want to alert that the dead line is <span style="color:red"> <?=$d->format('Y-m-d')?> </span> </p>
  </div>

  <div style="text-align:center">

    <?php $path = $user->user_assignment($assignment->id) ?>
    <?php if($path){ ?>
    <div class="pb-5">
      <a href="<?=public_path($path)?>" download>
        check previous sumbition
        <span style="font-size:25px;" class="fa fa-download"></span>
      </a>
    </div>
  <?php } ?>

    <form action="<?=url('assignment/submit/'.$assignment->id)?>" method="POST" enctype="multipart/form-data">
      <input type="file"  name="assignment" id="docpicker" >
      <button class="btn btn-success" >Submit</button>
    </form>



  </div>
</div>


<?php require_once(app_path("views/course_dashboard/footer.php"));
