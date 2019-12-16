<?php require_once(app_path("views/header.php"))  ?>

<?php foreach ($data['categories'] as $category) {  ?>
  <h1><?=$category['name']?></h1>
<?php }  ?>



<?php require_once(app_path("views/footer.php")) ?>
