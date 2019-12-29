<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));
$quiz = $data['quiz'];
$questions = $data['questions'];
$counter=0;
 ?>
<style>
.form-group{
  background-color: white;
  padding:10px;
  margin-bottom: 30px;
  border-style: groove;
  border-radius: 5px;
}
</style>





 <div class="container">
  <h1><?=$quiz->name?></h1>
 	<form action="<?=url('quiz/submit/')?><?=$quiz->id?>" method="POST">
 		<?php foreach ($questions as $question) { ?>
 			<div class='form-group'>
 				<h2 class="pb-3"><?=++$counter?><?=$question['question']?>  </h2>

 				<?php $options = explode(',', $question['options']);

 				foreach ($options as $option) { ?>

 					<div class='form-check'>
 						<input class='form-check-input' value="<?=$option?>" type='<?=$question['type']?>' name='question_<?php echo $counter; if($question["type"]=="checkbox"){echo "[]";}  ?>' >
 						<label class='form-check-label'> <?=$option?> </label>
 					</div>

 				 <?php } ?>




 			</div>
 		<?php } ?>
 		<div>
 			<input type="submit" class="btn btn-success">
 		</div>

 	</form>

 </div>













<?php require_once(app_path("views/course_dashboard/footer.php")); ?>
