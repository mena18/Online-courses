<?php

require_once("App/views/header.php");




?>

<div class="container">
<h1 > My Courses</h1>
<div class='row'>

<?php
foreach ($data['courses'] as $course ) {
	?>
	<div class="pt-5 col-sm-6 col-md-4 thumbnail">
	  <a href="/courses/course/show/<?= $course['id'] ?>"><img alt="100%x200" data-src="holder.js/100%x200" src="<?= public_path($course['image']) ?>" style="height: 200px; width: 100%; display: block;"></a>
	  <div class="caption">
	   <h3><?= $course['name'] ?></h3>
	    <p><?= $course['description'] ?><p>
	    	<a href="/courses/course/drop/<?= $course['id']?>" class="btn btn-primary" role="button">Drop</a>
	     </p>
	 </div>
	 </div>

<?php
}
echo "</div></div>";




require_once("App/views/footer.php");
