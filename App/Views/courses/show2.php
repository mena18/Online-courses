<?php  require_once(app_path('views/header.php'));  $course = $data['course']; $instructor = $data['instructor'];
if(isset($_SESSION['user'])){
		$user = user_model::get($_SESSION['user']['id']);
}

?>
<style>
	.partone{
		background-color: #eaeafa;
		width: 100%;
	}
	.para{
		font-family: fantasy;
		font-size: 60px;
		text-align: center;
		color:#336699;
	}
	.para1{
		margin-left: 35%;
		max-width: 30%;
	}
	.para2{
		color:#817e7e;
		font-size: medium;
		text-transform: uppercase;
	}
	.para3{
		text-align: center;
		color:blue;
	}
	#but{
		margin-left: 45%;/* 40*/
	}
	.lessons{
		background-color: white;
		width: 40%;
		margin-left: 35%;
	}
	button p{
		color: white;
	}
	.card-header{
		height: 60px;
		background-color: #3b3b4f;
	}
	.part2{
		margin-left: 35%;
		max-width: 40%;
	}
	.part2 p{
		font-family:Serif;
		font-size:25px;
		text-align: center;
		color:#336699;
		line-height: 1.8;
		text-transform: capitalize;
	}
	.part2para p{
		color:black;
		font-size: medium;
		text-transform: uppercase;
	}
	.teacher{
		margin-left: 30%;
		max-width: 40%;
	}
	.teacherpara{
		font-family: fantasy;
		font-size: 40px;
		margin-left:38%;/* text align center*/
		color:#336699;
	}
	img{
		border-radius: 50%;
		margin-left:44%;
	}
	.name{
		font-family:Serif;
		font-size:25px;
		text-align: center;
		color:#336699;
		line-height: 1.8;
		text-transform: capitalize;
		margin-left:30%;
	}
	.discription{
		max-width: 60%;
		margin-left:40%;
	}
	.people{
		margin-left: 25%;
		max-width: 50%;
	}
	.opinion {
		margin-left:23%;
		min-width: 10px;
	}
	.opinion imgcard{
		border-radius: 50%;
	}
	#username{
		color:blue;
		text-align: center
	}
	#c{
		float:left;
	}
	#f{
		float:none;
	}
	.ved{
		min-width: 10px;
		margin-left:30%;
	}
	.ved p{
		margin-left:20%;
	}
	iframe{
		border:2px solid black ;
	}
	.enroll{
		margin-left:30%;
		min-width: 10px;
	}
	.enroll p{
		font-family: fantasy;
		font-size: 40px;
		margin-left:25%;/* text align center*/
		color:#336699;
	}
	#lastbut{
		margin-left:35%;
	}
</style>
</head>

<body>
<div class="partone">
	<p class="para">LEARN <?=$course->name?> FOR FREE</p>
	<!--  First one -->
	<div class="para1">
		<p class="para2"><?=$course->description?></p>
		<br>
		<p class=" para3 "><?=count($course->lessons())?> lessons | <?=(int)($course->total_time()/60)?> minutes</p>
	</div>
	<!--  Second one -->
	<br>
		<?php if(isset($_SESSION['user'])){?>

		<?php $user_course = $user->user_course($course->id); ?>
		<?php if(!$user_course){ ?>
		<a id="but" type="button" class="btn btn-primary" href="<?=url('course/register/'.$course->id)?>">
			Enroll for free
		</a>
	<?php }else if($user_course[0]->finished){ ?>

	<?php }else{ ?>
		<a id="but" type="button" class="btn btn-primary" href="<?=url('course/register/'.$course->id)?>">
			Drop Course
		</a>
		<?php } ?>
	<?php } ?>

	<!-- Modal -->


		<!--  Here is the collapse -->

		<br>
		<br>
		<br>
</div>
<br>

<div class="lessons" id="accordion">
		<?php foreach ($course->weeks() as $week_name => $week): ?>


			<div class="card">
				<div class="card-header" id="headingOne">
					<h5 class="mb-0">
						<button id="col1"  class="btn btn-link" data-toggle="collapse" data-target="#week_<?=$week_name?>" aria-expanded="false" aria-controls="collapseOne">
							<p>Week <?= $week_name ?></p>
						</button>
					</h5>
				</div>

				<div id="week_<?=$week_name?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

						<?php foreach ($week as $ob): ?>
							<?php if($ob['type']=='lesson'){ $lesson = $ob['content']; ?>
									<div class="card-body">
										<a href="#"><span class="fa fa-youtube-play"></span> <span class="black hover_red"><?=$lesson->name?></span></a>
										<span class="float-right"><?=gmdate("i:s", $lesson->duration)?></span>
									</div>
								<?php } ?>
						<?php endforeach; ?>

				</div>
			</div>

		<?php endforeach; ?>
</div>

<br>
<br>
<br>
<!-- End of collapse -->


<!-- Begine of paragraphs
<div class="part2">
	<p>CSS Grid is a new superpower for web developers</p>
	<div class="part2para">
	<p>this is paragraph this is paragraph this is paragraph this is paragraph this is paragraph this is paragraph this is paragraph this is paragraph</p>
	</div>
</div>
 -->

<!-- End of paragraphs -->
<br>
<br>
<br>
<br>
<br>

<!-- Meet your teacher -->

<div class="teacher">
	<p class="teacherpara">MEET  YOUR  TEACHER</p>
	<br>
	<img src="<?=public_path($instructor->image)?>" alt="the professure image" width=250 height=250>
	<br>
	<p class="name"><?=$instructor->name?></p>
	<br>
	<div class="discription">
	<p><?=$instructor->description?></p>
	</div>
</div>

<br><br><br><br>
<!-- People love this course -->
<div class=" people ">
	<p class="teacherpara">PEOPLE LOVE THIS COURSE </p>
	<p class="name">And we think you will love it.....</p>
</div>
<br><br><br>
<!-- End people will love this course -->

<div class="opinion">


	<?php foreach ($course->reviews(3) as $us): ?>

		<div class="card" style="width: 18rem;" id="c">
				<div class="card-body">
				  <h5 class="card-title">
					<img  class=" imgcard " src="<?=$us->image?>" alt="user picture" width=50 height=50>
				  </h5>
				  <h6 class="card-subtitle mb-2 text-muted">
						<p id="username"><?=$us->name?></p>
				  </h6>
				  <p class="card-text"><?=$us->review?></p>
					<hr>
					<div class="text-center">
						<?php for ($i=1; $i <=5 ; $i++) { ?>
							<span class="fa fa-star <?php if($us->rating >= $i){echo 'checked';} ?>"></span>
						<?php } ?>
					</div>
						<!--
				  <a href="#" class="card-link"><i class="fa fa-heart"></i></a>
				  <a href="#" class="card-link">9:30 PM - April 2 , 2018</a>
					  -->
				</div>
			</div>

	<?php endforeach; ?>


			<div id='f' style="width:700px;height:200px;">

			</div>


</div>

<br><br><br><br><br>

<div class="ved">
	<p class="teacherpara">An introductory vedio </p>
	<br><br><br>
	<iframe src="https://www.youtube.com/embed/<?=$course->lessons()[0]->video_id?>" height="500" width="900" >
		<video width="320" height="240" autoplay>
			<source src="movie.mp4" type="video/mp4">
			<source src="movie.ogg" type="video/ogg">
			Your browser does not support the video tag.
		</video>
</iframe>
</div>
<br><br>



<?php if(isset($_SESSION['user']) && !$user->user_course($course->id)){ ?>
		<div class="enroll">
			<p >Enroll in the course now ..... </p>
			<br>
	<a id="but" type="button" class="btn btn-primary mb-5" href="<?=url('course/register/'.$course->id)?>">
		Enroll for free
	</a>
	</div>
<?php } ?>



<?php  require_once(app_path('views/footer.php')); ?>
