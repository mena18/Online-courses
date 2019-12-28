<?php require_once(app_path("views/admin/admin_header.php")); $counter=1;?>



  <h3 class="text-muted text-center pt-3 mb-3">Users</h3>
  <table class="table table-dark table-hover text-center">
    <thead>
      <tr class="text-muted">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data['users'] as $user) { ?>
      <tr>
        <th><?=$counter++?></th>
        <td><?= $user->name ?></td>
        <td><?= $user->email ?></td>
        <td>
          <a href="<?= url('admin/delete_instructor/'.$user->id) ?>" class="btn btn-danger">Delete</a>
        </td>

      </tr>
    <?php   } ?>

    </tbody>
  </table>





<?php require_once(app_path("views/admin/admin_footer.php")); ?>
