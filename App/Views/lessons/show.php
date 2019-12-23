<?php

require_once(app_path('views/header.php'));
$lesson = $data['lesson'];

//print_array($lesson);
?>

<div class="container pb-5">

	<div class="pb-5 pt-5">
		<p><?=$lesson->description?></p>
	</div>
	<div class="embed-responsive embed-responsive-16by9">
	  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$lesson->video_id?>" allowfullscreen></iframe>
	</div>


	<div class="pt-5 pb-5">
	<?php
	  if($data['watched'] == 1){?>

	    <a class="m5 p5 btn btn-secondary"  href="<?=url('lesson/mark/')?><?=$lesson->id?>">Mark as Un Watched</a>

	  <?php }else if($data['watched']==0){ ?>

	    <a class="m5 p5 btn btn-primary"  href="<?=url('lesson/mark/')?><?=$lesson->id?>">Mark as Watched</a>
	  <?php }else if($data['watched']==2){ ?>
		<a class="btn btn-primary"  href="<?=url('lesson/edit/')?><?=$lesson->id?>">Edit Lesson</a>
	 	<a class="btn btn-danger"  href="<?=url('lesson/delete/')?><?=$lesson->id?>">delete Lesson</a>
	  <?php } ?>


	</div>




</div>


<?php require_once(app_path('views/footer.php')); ?>
