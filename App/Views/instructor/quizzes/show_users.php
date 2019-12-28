<?php
require_once(app_path("views/instructor/instructor_header.php"));
$quiz = $data['quiz'];
$course = $quiz->course();
$counter=1;
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<div class="container">

<h3 class="text-muted text-center pt-3 mb-3">quizs</h3>
<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th>#</th>
      <th>Name</th>
      <th>Finished at </th>
      <th>Marks </th>
    </tr>
  </thead>
  <tbody>
    
  <?php foreach ($quiz->users() as $user) { ?>
    <tr>
      <th><?=$counter++?></th>
      <td><?= $user->name ?></td>
      <td><?= $user->finished_at ?></td>
      <td><?= $user->marks ?></td>
    </tr>
  <?php   } ?>

  </tbody>
</table>

</div>


<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
