<?php require_once(app_path("views/header.php"))  ?>


<?php foreach ($data['instructors'] as $instructor) {  ?>
  <h1><?=$instructor['name']?></h1>
<?php }  ?>

<?php require_once(app_path("views/footer.php")) ?>
