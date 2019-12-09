<?php

require_once("App/views/header.php");




?>

<div class="container pb-5">
    <h1 class="pt-5 pb-5">Edit Lesson</h1>
    <form  action="/courses/lesson/update/<?=$data['lesson']['id']?>" method="POST">
    	
    	<div class="form-group">
			<label for="name">Lesson Name</label>
			<input type="text" class="form-control" value="<?=$data['lesson']['name']?>" name="name" required="required" id="name" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="url">Youtube ID</label>
			<input type="text" class="form-control" value="<?=$data['lesson']['video_id']?>" name="video_id" required="required" id="video_id" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="week_number">Week number</label>
			<input type="number" class="form-control" value="<?=$data['lesson']['week_number']?>" name="week_number" required="required" id="week_number" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="number">number</label>
			<input type="number" class="form-control" value="<?=$data['lesson']['number']?>" name="number" required="required" id="number" aria-describedby="name">
		</div>

		

		<div class="form-group">
			<label for="description">Lesson Description</label>
			<textarea rows="7" class="form-control" name="description" required="required" id="description">"<?=$data['lesson']['description']?>"</textarea>
		</div>

		<button class="btn btn-success" >Submit</button>


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
