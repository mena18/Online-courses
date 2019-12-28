<?php
require_once(app_path("views/instructor/instructor_header.php"));
$lesson = $data['lesson'];
$course = $lesson->course();
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>



<div class="container pb-5">
    <h1 class="pt-5 pb-5">Edit Lesson</h1>
    <form  action="<?=url('lesson/update/')?><?=$lesson->id?>" method="POST">

      <div class="form-group">
        <label for="name">Lesson Name</label>
        <input type="text" value="<?=$lesson->name?>" class="form-control" name="name" required="required" id="name" aria-describedby="name">
      </div>

      <div class="form-group">
        <label for="url">Youtube (url/ID)</label>
        <input type="text" value="<?=$lesson->video_id?>" class="form-control" name="video_id" required="required" id="video_id" aria-describedby="name">
      </div>

      <div class="form-group">
        <label for="week_number">Week number</label>
        <input type="number" value="<?=$lesson->week_number?>" class="form-control" name="week_number" required="required" id="week_number" aria-describedby="name">
      </div>

      <div class="form-group">
        <label for="number">number</label>
        <input type="number" value="<?=$lesson->number?>" class="form-control" name="number" required="required" id="number" aria-describedby="name">
      </div>


      <div class="form-group">
        <label >Duration</label>
        <div class="row">
          <div class="col">
            <input value="<?=intdiv($lesson->duration,3600)?>" placeholder="Hours" type="number"class="form-control" name="duration_h" aria-describedby="name">
          </div>
          <div class="col">
            <input value="<?=intdiv($lesson->duration%3600,60)?>" placeholder="Minutes" type="number"class="form-control" name="duration_m"  aria-describedby="name">
          </div>
          <div class="col">
            <input value="<?=$lesson->duration%60?>" placeholder="seconds" type="number"class="form-control" name="duration_s" aria-describedby="name">
          </div>
        </div>
      </div>


      <div class="form-group">
        <label for="description">Lesson Description</label>
        <textarea rows="7" class="form-control" name="description" required="required" id="description"><?=$lesson->description?></textarea>
      </div>


		<button class="btn btn-success" >Submit</button>


    </form>



</div>


<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
