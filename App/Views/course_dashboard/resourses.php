<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));
$counter=1;
$files = $data['course']->resourses();
 ?>

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Week</th>
        <th scope="col">file</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($files as $file): ?>
        <tr>
          <th scope="row"><?=$counter++?></th>
          <td><?=$file->name?></td>
          <td><?=$file->week_num?></td>
          <td><a href="<?=$file->path?>" download><span style="font-size:25px;" class="fa fa-download"></span></a></td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>

<?php require_once(app_path("views/course_dashboard/footer.php"));
