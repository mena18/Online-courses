<?php require_once(app_path('views/header.php'));  $instructor = $data['instructor'];?>

		<style>
			body{
				background: #eee;
				opacity:0.9px;

			}
			#frm-create{
				max-width: 30%;
				min-height: 40%;
				margin-left: 35%;
				margin-top: 110px;
        margin-bottom: 50px;
				background:white;
				border: 1px solid black;
				border-radius: 10px;
				padding:20px;
			}
			#tit{
				font-family: cursive;
				text-align: center
			}
			.tit{
				text-align: center;
				font-family: cursive;
			}
			#r{
				margin-right: 70px;
			}

		</style>
	</head>
	<body>
		<!--       https://mdbootstrap.com/docs/jquery/forms/file-input/     -->
		<div id="frm-create">
			<h3 class="tit">Edit Data</h3>
			<form action="<?= url('user/update_profile/'.$instructor->id) ?>" method="POST" enctype="multipart/form-data">
					<label for="uname"><h5 id="tit">Name : </h5></label>
					<input value="<?= $instructor->name ?>"name="name" type="text" class="form-control" id="uname" placeholder="Enter username" required>
					<br>
					 <label for="email"><h5 id="tit">Email</h5></label>
					 <input value="<?= $instructor->email ?>"name="email" type="email" class="form-control" id="email" placeholder="Enter email"  required>
					<br>
					<label for="exampleFormControlTextarea1"><h5 id="tit">Discription</h5></label>
					<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="2" required><?= $instructor->description ?></textarea>
					<br>
					<label for="exampleFormControlTextarea2"><h5 id="tit">Biography</h5></label>
					<textarea name="bio" class="form-control" id="exampleFormControlTextarea2" rows="4" required><?= $instructor->bio ?></textarea>
					<br>
					<div class="input-group">
							<div class="input-group-prepend">
								   <span class="input-group-text" id="inputGroupFileAddon01">Choose profile image</span>
							</div>
							<div class="custom-file">
							<label class="custom-file-label" for="inputGroupFile01">Choose image</label>
							<input name="image" type="file" class="custom-file-input" id="inputGroupFile01"
										aria-describedby="inputGroupFileAddon01" >
							</div>
				</div>
					<br>
					<div class="input-group mb-3">
							<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">
												<i class="fa fa-facebook"></i>
										</span>
							</div>
							<input value="<?= $instructor->facebook ?>"name="facebook" type="text" class="form-control" placeholder="Enter facebook account" aria-label="Username" aria-describedby="basic-addon1">
				</div>
					<br>
					<div class="input-group mb-3">
							<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">
												<i class="fa fa-twitter"></i>
										</span>
							</div>
							<input value="<?= $instructor->twitter ?>"name="twitter" type="text" class="form-control" placeholder="Enter twitter account" aria-label="Username" aria-describedby="basic-addon1">
				</div>
					<br>
					<div class="input-group mb-3">
							<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">
												<i class="fa fa-linkedin"></i>
										</span>
							</div>
							<input value="<?= $instructor->linkedin ?>"name="linkedin" type="text" class="form-control" placeholder="Enter linked-in account" aria-label="Username" aria-describedby="basic-addon1">
				</div>
					<br>
					<div class="input-group mb-3">
							<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">
												<i class="fa fa-github"></i>
										</span>
							</div>
							<input value="<?= $instructor->github ?>"name="github" type="text" class="form-control" placeholder="Enter github account" aria-label="Username" aria-describedby="basic-addon1">
				</div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
			</form>
    </div>

<?php require_once(app_path('views/footer.php')); ?>
