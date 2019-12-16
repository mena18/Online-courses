<?php require_once(app_path("views/header.php"))  ?>

<?php foreach ($data['users'] as $user) {  ?>
  <h1><?=$user['name']?></h1>
<?php }  ?>

<?php require_once(app_path("views/footer.php")) ?>
