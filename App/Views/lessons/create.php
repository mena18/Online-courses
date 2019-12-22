<?php

require_once(app_path('views/header.php'));




?>

<div class="container pb-5">
    <h1 class="pt-5 pb-5">Create New Lesson</h1>
    <form  action="<?=url('lesson/store/')?><?=$data['course']->id?>" method="POST">

    	<div class="form-group">
			<label for="name">Lesson Name</label>
			<input type="text" class="form-control" name="name" required="required" id="name" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="url">Youtube ID</label>
			<input type="text" class="form-control" name="video_id" required="required" id="video_id" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="week_number">Week number</label>
			<input type="number" class="form-control" name="week_number" required="required" id="week_number" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="number">number</label>
			<input type="number" class="form-control" name="number" required="required" id="number" aria-describedby="name">
		</div>



		<div class="form-group">
			<label for="description">Lesson Description</label>
			<textarea rows="7" class="form-control" name="description" required="required" id="description"></textarea>
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



require_once(app_path('views/footer.php'));
