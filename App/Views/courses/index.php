<?php

require_once("App/views/header.php");







echo "<h1 > Courses</h1>";

echo "<div class='row'>";


foreach ($data['courses'] as $course ) {
	?>
	<div class="pt-5 col-sm-6 col-md-4 thumbnail">
	<a href="/courses/course/show/<?= $course['id'] ?>"><img alt="100%x200" data-src="holder.js/100%x200" src="<?= public_path($course['image']) ?>" style="height: 200px; width: 100%; display: block;"></a>
	  <div class="caption">
	   <h3><?= $course['name'] ?></h3>
	   <div style="height: 100px;">
	    	<p><?= $course['description'] ?><p>
	    </div>
	    	<a href="/courses/course/register/<?= $course['id'] ?> " class="btn btn-primary" role="button">Register</a>

	     </p>
	 </div>
	 </div>


<?php
}
echo "</div>";




require_once("App/views/footer.php");
