<?php

require_once(app_path('views/header.php'));

?>

  <div class='container' >

    <h2>Instructor Courses</h2><br><br>

    <a href="<?=url('course/create/')?>" class="btn btn-primary btn-lg">Create course</a></li>


    <div class='row'>
    <?php foreach ($data['courses'] as $course ) { ?>
    	<div class="pt-5 col-sm-6 col-md-4 thumbnail">
    	  <a href="<?=url('course/details/')?><?= $course->id ?>"><img alt="100%x200" data-src="holder.js/100%x200" src="<?= public_path($course->image) ?>" style="height: 200px; width: 100%; display: block;"></a>
    	  <div class="caption">
    	   <h3><?= $course->name ?></h3>
    	    <p><?= $course->description ?></p>
    	    	<a href="<?=url('course/delete/')?><?= $course->id ?>" class="mb-3 btn btn-danger" role="button">Delete From Database</a>

            <a href="<?=url('course/edit/')?><?=$course->id?>"class="mb-3 btn btn-warning btn-lg" role="button">Modify course</a>

            <a href="<?=url('lesson/create/')?><?= $course->id ?>" class="mb-3 btn btn-info btn-lg">Add lessons</a>
            <a href="<?=url('quiz/create/')?><?= $course->id ?>" class="mb-3 btn btn-info btn-lg">Add Quiz</a>

            <?php if($course->finished==0){ ?>
              <a href="<?=url('course/instructor_finish/'.$course->id)?>"  class="btn btn-primary btn-lg">Finish</a>
            <?php }else{ ?>
              <a href="<?=url('course/instructor_un_finish/'.$course->id)?>"  class="btn btn-primary btn-lg">Un Finish</a>
            <?php } ?>
    	 </div>
    	 </div>

  <?php } ?>
  </div>




<?php require_once(app_path('views/footer.php'));
