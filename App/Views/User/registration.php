<?php

require_once("App/views/header.php");




?>

<div class="form_div">
	<h1 >Registration</h1>
	<form action="/courses/user/store" method="post">
		<input required type="text" name="name" placeholder="Name">
		<input required type="email" name="email" placeholder="Email">
		<input required type="password" name="password" placeholder="Password">
		 <input type="checkbox" name="Instructor" value="1" class="important"checked>Instructor<br>
		<input type="submit">
	</form>
</div>
<?php






require_once("App/views/footer.php");
