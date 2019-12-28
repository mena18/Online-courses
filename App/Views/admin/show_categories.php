<?php require_once(app_path("views/admin/admin_header.php")); $counter=1;?>





<h3 class="text-muted text-center pt-3 mb-3">Categories</h3>
<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th>#</th>
      <th>Name</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data['categories'] as $category) { ?>
    <tr>
      <th><?=$counter++?></th>
      <td><?= $category->name ?></td>
      <td>
        <a href="#" class="btn btn-success mr-3">Edit</a>
        <a href="<?=url('admin/delete_category/'.$category->id)?>" class="btn btn-danger">Delete</a>
      </td>

    </tr>
  <?php   } ?>

  </tbody>
</table>






<?php require_once(app_path("views/admin/admin_footer.php")); ?>
