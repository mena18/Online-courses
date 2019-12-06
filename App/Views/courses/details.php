<?php

require_once("App/views/header.php");

echo "<div>" . $data['course']['name'] . "</div>";
echo "<div>" . $data['course']['description']. "</div>";
?>


<img style="width:500px;height: 500px;" src="<?= public_path($data['coursex']['image'])?>">



<?php
	foreach ($data['lessons'] as $lesson) {
		?>
		<a href="/courses/lesson/show/<?=$lesson['id']?>"><h1>Lesson <?= $lesson['week_number'] ?>.<?= $lesson['number'] ?> </h1></a>
		<?php
	}
	?>
	<div class="jumbotron">
		<div class="countanier">



	<a href="/courses/lesson/create/<?=$data['course']['id']?>" class="btn btn-info btn-lg">Add lesson</a>
	<a href="/courses/lesson/lesson_delete/<?=$data['course']['id']?>" class="btn btn-danger btn-lg">Delete lesson</a>
</div>
</div>
	<?php

?>



<h1>hello world</h1>
