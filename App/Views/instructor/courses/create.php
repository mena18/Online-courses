<?php require_once(app_path("views/instructor/instructor_header.php")); ?>
<?php require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<div class="container">
    <h1 class="pb-3">Create New Course</h1>
	<form  action="<?=url('course/store')?>" method="POST" enctype="multipart/form-data">

		<div class="form-group">
			<label for="name">Course Name</label>
			<input type="text" class="form-control" name="name" required="required" id="name" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="category">Select Category</label>
			<select placeholder="Select category .." required="required" id="category" name="category"  class="form-control">
				<option selected="true" disabled="disabled">Choose Category ..</option>
				<?php foreach ($data['category'] as $category) { ?>
					<option value="<?= $category->id ?>" ><?= $category->name ?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label for="description">Course Description</label>
			<textarea rows="7" class="form-control" name="description" required="required" id="description"></textarea>
		</div>

		<div class="form-group">
			<label for="weeks">Number of weeks to finish</label>
			<input min=1 max=20 type="number" class="form-control" name="weeks" required="required" id="weeks" aria-describedby="name">
		</div>

		<div class="form-group">
			<label for="image">Image</label>
			<input min=1 max=20 type="file" class="form-control-file" name="image" id="image" aria-describedby="name">
		</div>

		<button class="btn btn-primary" >Submit</button>


	</form>

</div>


<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
