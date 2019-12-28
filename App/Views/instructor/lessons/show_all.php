<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course']; $counter=1;
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<div class="container">

<h3 class="text-muted text-center pt-3 mb-3">Lessons</h3>
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
  <?php foreach ($course->lessons() as $lesson) { ?>
    <tr>
      <th><?=$counter++?></th>
      <td><?= $lesson->name ?></td>
      <td><?= $lesson->description ?></td>
      <td><?= $lesson->week_number ?></td>
      <td>
        <a href="<?=url('lesson/edit/'.$lesson->id)?>" class="btn btn-success mr-3">Edit</a>
        <a href="<?=url('lesson/delete/'.$lesson->id)?>" class="btn btn-danger">Delete</a>
      </td>
      <td>
        <a href="<?=url('lesson/show_all_users/'.$lesson->id)?>" class="btn btn-primary mr-3">Show</a>
      </td>
    </tr>
  <?php   } ?>

  </tbody>
</table>

</div>


<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
