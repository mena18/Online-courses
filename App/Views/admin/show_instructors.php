<?php require_once(app_path("views/admin/admin_header.php")); $counter=1;?>


  <h3 class="text-muted text-center pt-3 mb-3">instructors</h3>
  <table class="table table-dark table-hover text-center">
    <thead>
      <tr class="text-muted">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>password</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data['instructors'] as $instructor) { ?>
      <tr>
        <th><?=$counter++?></th>
        <td><?= $instructor->name ?></td>
        <td><?= $instructor->email ?></td>
        <td><?= $instructor->password ?></td>
        <td>
          <a href="<?= url('admin/delete_instructor/'.$instructor->id) ?>" class="btn btn-danger">Delete</a>
          <?php $path = url('admin/delete_instructor/'.$instructor->id) ;?>
          <button onclick="delete_swal('<?=$path?>')" class="btn btn-danger">Delete</button>
        </td>

      </tr>
    <?php   } ?>

    </tbody>
  </table>




<?php require_once(app_path("views/admin/admin_footer.php")); ?>
