<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course'];
require_once(app_path("views/instructor/instructor_sidebar.php"));?>




<div class="container">
    <h1 class="pb-3">Edit Course</h1>
	<form  action="<?=url('course/update/')?><?=$course->id ?>" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="name">Course Name</label>
			<input type="text" class="form-control" value="<?= $course->name ?>" name="name" required="required" id="name" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="category">Select Category</label>
			<select placeholder="Select category .." required="required" id="category" name="category"  class="form-control">
				<?php foreach ($data['category'] as $category) { ?>
					<option value="<?= $category->id ?>"
					<?php  if($category->id == $course->category_id){echo "selected";} ?>
					 ><?= $category->name ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label for="description">Course Description</label>
			<textarea rows="7" class="form-control" name="description"  required="required" id="description"><?=$course->description?></textarea>
		</div>

		<div class="form-group">
			<label for="weeks">Number of weeks to finish</label>
			<input min=1 max=20 type="text" value="<?= $course->duration_weeks ?>" class="form-control" name="weeks" required="required" id="weeks" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="image">Image</label>
			<input min=1 max=20 type="file" class="form-control-file" name="image" id="image" aria-describedby="name">
		</div>

		<button class="btn btn-success" >Submit</button>


	</form>

</div>



<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
