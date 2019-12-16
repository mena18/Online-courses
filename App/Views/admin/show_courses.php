<?php require_once(app_path("views/header.php"))  ?>

<?php foreach ($data['courses'] as $course) {  ?>
  <h1><?=$course['name']?></h1>
<?php }  ?>




<?php require_once(app_path("views/footer.php")) ?>
