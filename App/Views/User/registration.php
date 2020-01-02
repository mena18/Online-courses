<?php  require_once(app_path('views/header.php'));  ?>

<link rel="stylesheet" type="text/css" href="<?=public_path('css/registration.css') ?>">


<div id=frm>
    <form action="/courses/User/store" method="POST">
    	<div class="form-group">
			<label for="name">Username:</label>
      		<input type="text" class="form-control" id="name" placeholder="Enter username" name="name" required>
		</div>

		<div  class="form-group">
      		<label for="email">Email:</label>
     		<input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
	 	</div>

		<div  class="form-group">
			<label for="password">Password:</label>
        	<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      	</div>



		<div  class="form-group">
		 	<input class="form-check-input" type="checkbox">
		 	<label class="form-check-label">Remember me</label>
      	</div>


		 <button id='sub_form' type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php  require_once(app_path('views/footer.php'));
