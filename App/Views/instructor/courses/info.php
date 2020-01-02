<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course'];
$counter=1;
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>




<div class="container">

  <div class="row">
    <div class="col-12">
      <h3 class="text-muted text-center pt-3 mb-3">User information</h3>
    </div>
  </div>


<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">progress</th>
      <th scope="col">Marks</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($course->users() as $user) {  ?>

    <tr>
      <tr>
        <th scope="row"><?=$counter++?></th>
        <td><?=$user->name?></td>
        <td><?=(int)($user->course_progress($course->id)*100)?>%</td>
        <td><?=(int)($user->course_marks($course->id))?></td>

      </tr>
    </tr>
  <?php   } ?>

  </tbody>
</table>

</div>




<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
