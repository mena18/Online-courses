<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course'];$counter=1;
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>


<div class="container">

<h3 class="text-muted text-center pt-3 mb-3">assignments</h3>
<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th>#</th>
      <th>Name</th>
      <th>Description</th>
      <th>Week</th>
      <th>Options</th>
      <th>User Finished</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($course->assignments() as $assignment) { ?>
    <tr>
      <th><?=$counter++?></th>
      <td><?= $assignment->name ?></td>
      <td><?= $assignment->description ?></td>
      <td><?= $assignment->week_num ?></td>
      <td>
        <a href="<?=url('assignment/edit/'.$assignment->id)?>" class="btn btn-success mr-3">Edit</a>
        <a href="<?=url('assignment/delete/'.$assignment->id)?>" class="btn btn-danger">Delete</a>
      </td>
      <td>
        <a href="<?=url('assignment/show_all_users/'.$assignment->id)?>" class="btn btn-primary mr-3">Show</a>
      </td>


    </tr>
  <?php   } ?>

  </tbody>
</table>

</div>



<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
