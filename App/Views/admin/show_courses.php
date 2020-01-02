<?php require_once(app_path("views/admin/admin_header.php")); $counter=1;?>



  <h3 class="text-muted text-center pt-3 mb-3">Courses</h3>
  <table class="table table-dark table-hover text-center">
    <thead>
      <tr class="text-muted">
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Rating</th>
        <th>Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($data['courses'] as $course) { ?>
      <tr>
        <th><?=$counter++?></th>
        <td><?= $course->name ?></td>
        <td><?= $course->description ?></td>
        <td><?= $course->avg_rating ?></td>
        <td>
          <?php if($course->finished==1){ ?>
            <a href="<?= url('admin/accept_course/'.$course->id) ?>" class="btn btn-success mr-3">Approve</a>
          <?php }else if($course->finished==2){ ?>
            <a href="<?= url('admin/pend_course/'.$course->id) ?>" class="btn btn-danger mr-3">Pend</a>
          <?php } ?>
        </td>
        <td>
          <?php $path = url('admin/delete_course/'.$course->id) ;?>
          <button onclick="delete_swal('<?=$path?>')" class="btn btn-danger">Delete</button>
        </td>

      </tr>
    <?php   } ?>

    </tbody>
  </table>




<?php require_once(app_path("views/admin/admin_footer.php")); ?>
