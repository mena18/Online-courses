<?php require_once(app_path("views/instructor/instructor_header.php"));  ?>
<?php require_once(app_path("views/instructor/instructor_sidebar.php"));  ?>



<div class='container' >

  <a href="<?=url('course/create/')?>" class="btn btn-primary btn-lg">+ Create course</a></li>


  <div class='row'>
  <?php foreach ($data['courses'] as $course ) { ?>
  	<div class="pt-5 col-sm-6 col-md-4 thumbnail">
  	  <a href="<?=url('course/instructor_show/')?><?= $course->id ?>"><img alt="100%x200" data-src="holder.js/100%x200" src="<?= public_path($course->image) ?>" style="height: 200px; width: 100%; display: block;"></a>
  	  <div class="caption">
  	   <h3><?= $course->name ?></h3>
  	    <p><?= $course->description ?></p>
        <a href="<?=url('course/edit/')?><?=$course->id?>"class="btn btn-primary" role="button">Edit course</a>
          <?php $path = url('course/delete/'.$course->id);?>
          <button onclick="delete_swal('<?=$path?>')" class="btn btn-danger">Delete</button>
          <!--<a href="url()"></a>  -->
        </div>
  	 </div>

   <?php } ?>
  </div>



<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
