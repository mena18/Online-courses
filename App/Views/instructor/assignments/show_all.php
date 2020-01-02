<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course'];$counter=1;
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>


<div class="container">

  <div class="row">
    <div class="col-10">
      <h3 class="text-muted text-center pt-3 mb-3">Assignments</h3>
    </div>
    <div class="col-2">
      <button class="mt-3 mb-3 btn btn-primary" onclick="func()" type="button" id="<?=url('assignment/store/'.$course->id)?>" data-toggle="modal" data-target="#assignment" data-whatever="@mdo">Create Assignment</button>
    </div>
  </div>


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
        <button class="btn btn-success" onclick="func()" type="button" id="<?=url('assignment/update/'.$assignment->id)?>" data-toggle="modal" data-target="#assignment" data-whatever="@mdo">Edit</button>
        <?php $path = url('assignment/delete/'.$assignment->id);?>
        <button onclick="delete_swal('<?=$path?>')" class="btn btn-danger">Delete</button>
      </td>
      <td>
        <a href="<?=url('assignment/show_all_users/'.$assignment->id)?>" class="btn btn-primary mr-3">Show</a>
      </td>


    </tr>
  <?php   } ?>

  </tbody>
</table>

</div>




<div class="modal fade" id="assignment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id='form_edit' action="#" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="name" class="col-form-label">Name</label>
                    <input name='name' type="text" class="form-control" id="name" >
                  </div>

                  <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>

                  </div>

                  <div class="form-group">
                    <label for="week_num" class="col-form-label">Week</label>
                    <input name='week_num' type="number" class="form-control" id="week_num" >
                  </div>

                  <div class="form-group">
                    <label for="dead_line" class="col-form-label">Deadline</label>
                    <input name='dead_line' type="date" class="form-control" id="dead_line" >
                  </div>

                  <div class="form-group">
                    <label for="total_marks" class="col-form-label">Total marks</label>
                    <input name='total_marks' type="number" class="form-control" id="total_marks" >
                  </div>


                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>


                </form>
            </div>


        </div>
    </div>
</div>







<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>






<script type="text/javascript">
    function func(){
      e = window.event.target;
      $('#form_edit').attr('action', e.id);
    }
</script>
