<?php  require_once(app_path('views/header.php')); ?>


<style type="text/css">

</style>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>

	<div class="carousel-inner">
			<div class="carousel-item active">
			<div class="image-1"><img src="https://epsiloneg.com/wp-content/uploads/2019/08/1_60gs-SFYyooZZBxatuoNJw.jpeg" class="d-block w-100" alt="..."></div>
	  </div>

	  <div class="carousel-item">
			<div class="image-2"><img src="https://epsiloneg.com/wp-content/uploads/2019/08/1_60gs-SFYyooZZBxatuoNJw.jpeg" class="d-block w-100" alt="..."></div>
	  </div>

	  <div class="carousel-item">
			<div class="image-3"><img src="https://epsiloneg.com/wp-content/uploads/2019/08/1_60gs-SFYyooZZBxatuoNJw.jpeg" class="d-block w-100" alt="..."></div>
	  </div>

	</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>

	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>

</div>


<!--  here courses begines -->
<div class="container">
	<h1 class="pt-5"><?=$data['category_name']?></h1>
	<div class="row pb-5">

		<?php foreach ($data['courses'] as $course) { ?>

		<div class="col-4 pt-5">
			<div class="card">
			  <a href="<?=url('course/details/')?><?= $course->id ?>"><img  src="<?= public_path($course->image) ?>" class="card-img-top card_image" alt="#"></a>
			  <div class="card-body">
			    <h5 class="card-title"><?= $course->name ?></h5>
			    <div class="pb-2 card_text_container">
			    	<p class="card-text"><?= $course->description ?></p>
				</div>
				<div class="pt-3 pb-3">
					<span class="float-left"><span class="fa fa-youtube-play"></span> <span><?= count($course->lessons()) ?></span>  </span>
					<span class="float-right fa fa-clock-o"> <?= gmdate("H:i:s", $course->total_time()); ?></span>
				</div>
				<hr>
				<div class="pt-3" align="center">
					<?php $course_avg_rating = $course->rating(); ?>
					<?php for ($i=1; $i <=5 ; $i++) { ?>
						<span class="fa fa-star <?php if($course_avg_rating >= $i){echo 'checked';} ?>"></span>
					<?php } ?>
				</div>

			  </div>
			</div>
		</div>

		<?php } ?>

	</div>
</div>


<?php require_once(app_path('views/footer.php')); ?>
