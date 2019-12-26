<?php require_once(app_path('views/header.php'));  $instructor = $data['instructor']; ?>


	<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="<?=public_path($instructor->image)?>" class="rounded-circle w-100">
        </div>
        <div class="col-7 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3 pr-5">
                    <div class="h4"><?= $instructor->name ?></div>
                </div>

            </div>





            <div class="d-flex flex-column">
                <p><?= $instructor->description ?></p>
            </div>

        <div class="d-flex flex-row pt-5">
						<?php if($instructor->facebook){ ?>
						<a class="pr-5" href="<?=$instructor->facebook?>">
	    				<span class="fa fa-facebook"></span>
	  				</a>
						<?php } ?>

						<?php if($instructor->twitter){ ?>
	  				<a class="pr-5" href="<?=$instructor->twitter?>">
	    				<span class="fa fa-twitter"></span>
	  				</a>
						<?php } ?>

						<?php if($instructor->linkedin){ ?>
	  				<a class="pr-5" href="<?=$instructor->linkedin?>">
	    				<span class="fa fa-linkedin"></span>
	  				</a>
						<?php } ?>

						<?php if($instructor->github){ ?>
	  				<a class="pr-5" href="<?=$instructor->github?>">
	    				<span class="fa fa-github"></span>
	  				</a>
						<?php } ?>

        	</div>
        </div>
        <div class="col-2 pt-5">
          <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $instructor->id){ ?>
        	<a href="<?=url('user/edit_profile/' . $instructor->id)?>" class="btn btn-primary">Edit Profile</a>
        <?php }?>
        </div>
    </div>
    <hr>

    <div class="row">

        <div class="col-12 p-5">
        	<h2 class="pb-3">Bio</h2>
        	<div>
   			      <?= $instructor->bio ?>
        	</div>
        </div>
    </div>
	<hr>

	<h1 class="pt-5">Courses</h1>
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

	<hr>

    <div style="height: 100px;">

    </div>

	</div>







<?php require_once(app_path('views/footer.php')); ?>
