<?php

require_once("App/views/header.php");




?>

<div class="form_div">
	<h1 >Modify Course</h1>
	<form action="/courses/course/modifyCourse_inDatabase/<?= $data['id']?>" method="post">
		<input required type="text" name="name" placeholder="Course Name">
			<input required type="text" name="description" placeholder="description">
			<input type="text" name="image" placeholder="Course Cover enter image name" value="uploads/">
				<input required type="text" name="duration_weeks" placeholder="duration_weeks">
		<input type="submit">
	</form>
</div>
<?php




/*$name=$_POST['name'];
$desc=$_POST['description'];
$img=$_POST['image'];
$duration_weeks=$_POST['duration_weeks'];
$instructorid=$_SESSION['user']['id'];
*/
require_once("App/views/footer.php");
