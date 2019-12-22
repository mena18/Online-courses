<?php  require_once(app_path('Views/header.php'));   $quiz = $data['quiz']; $questions = $data['questions']; $counter=0;  ?>




<div class="container">

	<form action="<?=url('quiz/submit/')?><?=$quiz->id?>" method="POST">
		<?php foreach ($questions as $question) { ?>
			<div class='form-group'>
				<h1><?=++$counter?><?=$question['question']?>  </h1>

				<?php $options = explode(',', $question['options']);

				foreach ($options as $option) { ?>

					<div class='form-check'>
						<input class='form-check-input' value="<?=$option?>" type='<?=$question['type']?>' name='question_<?php echo $counter; if($question["type"]=="checkbox"){echo "[]";}  ?>' >
						<label class='form-check-label'> <?=$option?> </label>
					</div>

				 <?php } ?>




			</div>
		<?php } ?>
		<div class="form-group">
			<input type="submit" class="btn btn-success">
		</div>

	</form>

</div>







<?php  require_once(app_path('Views/footer.php'));  ?>
