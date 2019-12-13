<?php  require_once(app_path('views/header.php'));  $course = $data['course']; $instructor = $data['instructor'];  ?>


<div class="container pb-5" >
<div style="text-align: center;">
	<h1><?=$data['course']['name']?></h1>
	<h2><?=$data['course']['description']?></h2>
</div>


<div style="text-align: center;">
	<img style="width:50%;height: 50%;" src="<?= public_path($data['course']['image'])?>">
</div>

<h1>instructor</h1>
<?php print_array($instructor); ?>


<h1>Course</h1>
<?php print_array($course); ?>

<?php foreach ($data['lessons'] as $lesson) {  ?>
		<a href="<?=url('lesson/show/')?><?=$lesson['id']?>"><h1>Lesson <?= $lesson['week_number'] ?>.<?= $lesson['number'] ?> </h1></a>
		<?php  }  ?>

	<?php if(isset($_SESSION['user']) && $_SESSION['user']['type']==1 && $course['instructor_id']==$_SESSION['user']['id'] ){?>
	<a href="<?=url('lesson/create/')?><?=$data['course']['id']?>" class="btn btn-info btn-lg">Add lesson</a>
	<a href="<?=url('lesson/lesson')?>_delete/<?=$data['course']['id']?>" class="btn btn-danger btn-lg">Delete lesson</a>
	<?php }else if(isset($_SESSION['user']) && $_SESSION['user']['type']==0){ ?>
	<a href="<?=url('course/register/')?><?=$data['course']['id']?>" class="btn btn-info btn-lg"><?=$data['text']?></a>
	<?php }else if(!isset($_SESSION["user"])){ ?>
	<a href="<?=url('user/loginView/')?>" class="btn btn-info btn-lg"> Login to register in the course </a>
	<?php } ?>

</div>
