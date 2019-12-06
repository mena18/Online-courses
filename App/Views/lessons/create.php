<?php

require_once("App/views/header.php");




?>

<div class="form_div">
	<h1 >Add lessons</h1>
	<form action="/courses/lesson/storeLesson_inDatabase/<?= $data['id']?>" method="post">
		<input required type="text" name="name" placeholder="Lesson Name">
    <input required type="text" name="week_number" placeholder="week number">
    <input required type="text" name="number"  placeholder="Lesson number">
		<input required type="text" name="description" placeholder="Lesson description">
		<input type="submit">
	</form>
</div>
<?php

/*
$name=$_POST['name'];
$weeks_nuumber=$_POST['week_number'];
$number=$_POST['number'];
$desc=$_POST['description'];
*/



require_once("App/views/footer.php");
