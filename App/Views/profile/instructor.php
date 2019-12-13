<?php

require_once(app_path('views/header.php'));

?>

<div class='container' >

<h2>Instructor Courses</h2><br><br>
<header>
  <div class="jumbotron">
<div class="container">
<ul class="list-inline">
<li><a href="<?=url('course/create/')?>" class="btn btn-primary btn-lg">Create course</a></li>
<li><a href="aboutme.php"class="btn btn-info btn-lg">About Me</a></li>
</ul>
</div>
</div>

</header>
<div class='row'>
<?php
foreach ($data['courses'] as $course ) {
	?>
	<div class="pt-5 col-sm-6 col-md-4 thumbnail">
	  <a href="<?=url('course/details/')?><?= $course['id'] ?>"><img alt="100%x200" data-src="holder.js/100%x200" src="<?= public_path($course['image']) ?>" style="height: 200px; width: 100%; display: block;"></a>
	  <div class="caption">
	   <h3><?= $course['name'] ?></h3>
	    <p><?= $course['description'] ?><p>
	    	<a href="<?=url('course/delete/')?><?= $course['id'] ?>" class="btn btn-danger" role="button">Delete From Database</a>
        <br><br>
        <a href="<?=url('course/edit/')?><?=$course['id']?>"class="btn btn-warning btn-lg" role="button">Modify course</a>
        <br><br>
        <a href="<?=url('lesson/create/')?><?= $course['id'] ?>" class="btn btn-info btn-lg">Add lessons</a>
       </p>
	 </div>
	 </div>

<?php
}
echo "</div>";




require_once(app_path('views/footer.php'));
