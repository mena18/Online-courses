<?php  require_once(app_path('views/header.php'));  $course = $data['course']; $instructor = $data['instructor'];  ?>


<div class="container pb-5" >
<div style="text-align: center;">
	<h1><?=$course->name?></h1>
	<h2><?=$course->description?></h2>
</div>


<div style="text-align: center;">
	<img style="width:50%;height: 50%;" src="<?= public_path($course->image)?>">
</div>


<?php foreach ($data['lessons'] as $lesson) {  ?>
		<a href="<?=url('lesson/show/')?><?=$lesson->id?>"><h1>Lesson <?= $lesson->week_number ?>.<?= $lesson->number ?> </h1></a>
		<?php  }  ?>

	<?php if(isset($_SESSION['user']) && $_SESSION['user']['type']==1 && $course->instructor_id==$_SESSION['user']['id'] ){?>
	<a href="<?=url('lesson/create/')?><?=$course->id?>" class="btn btn-info btn-lg">Add lesson</a>
	<a href="<?=url('quiz/create/')?><?=$course->id?>" class="btn btn-info btn-lg">Add Quiz</a>
	<a href="<?=url('course/instructor_finish/'.$course->id)?>_delete/<?=$course->id?>" class="btn btn-primary btn-lg">Finish Course</a>
	<?php }else if(isset($_SESSION['user']) && $_SESSION['user']['type']==0){ ?>
	<a href="<?=url('course/register/')?><?=$course->id?>" class="btn btn-info btn-lg"><?=$data['text']?></a>
	<?php }else if(!isset($_SESSION["user"])){ ?>
	<a href="<?=url('user/loginView/')?>" class="btn btn-info btn-lg"> Login to register in the course </a>
	<?php } ?>

</div>


<?php  require_once(app_path('views/footer.php')); ?>
