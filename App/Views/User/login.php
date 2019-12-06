<?php 

require_once("App/views/header.php");




?>

<div class="form_div">
	<h1 >Login</h1>
	<form action="/courses/user/login" method="post">
		<input required type="email" name="email" placeholder="Email">
		<input required type="password" name="password" placeholder="Password">
		<input type="submit">
	</form>
</div>
<?php






require_once("App/views/footer.php");