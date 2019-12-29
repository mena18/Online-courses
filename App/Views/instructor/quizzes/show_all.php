<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course'];$counter=1;
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<div class="container">

  <div class="row">
    <div class="col-10">
      <h3 class="text-muted text-center pt-3 mb-3">Quizzes</h3>
    </div>
    <div class="col-2">
      <a class="mt-3 mb-3 btn btn-primary"  href="<?=url('quiz/create/'.$course->id)?>" >Create Quiz</a>
    </div>
  </div>


<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th>#</th>
      <th>Name</th>
      <th>Description</th>
      <th>Week</th>
      <th>Total marks</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($course->quizzes() as $quiz) { ?>
    <tr>
      <th><?=$counter++?></th>
      <td><?= $quiz->name ?></td>
      <td><?= $quiz->description ?></td>
      <td><?= $quiz->week_num ?></td>
      <td><?= $quiz->total_marks ?></td>
      <td>
        <a href="<?=url('quiz/show_all_users/'.$quiz->id)?>" class="btn btn-primary mr-3">Show</a>
      </td>
    </tr>
  <?php   } ?>

  </tbody>
</table>

</div>



<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
