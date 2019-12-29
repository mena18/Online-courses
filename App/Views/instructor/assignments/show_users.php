<?php
require_once(app_path("views/instructor/instructor_header.php"));
$assignment = $data['assignment'];
$course = $assignment->course();
$counter=1;
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<div class="container">

<h3 class="text-muted text-center pt-3 mb-3">assignments</h3>
<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th>#</th>
      <th>User Name</th>
      <th>File</th>
      <th>Mark </th>
      <th>comment</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($assignment->users() as $user) { ?>

    <tr>
      <th><?=$counter++?></th>
      <td><?= $user->name ?></td>
      <td>
        <a href="<?=public_path($user->path)?>" download>
          <span class="fa fa-download"></span>
        </a>
      </td>
      <td><?= $user->marks ?></td>
      <td><?= $user->comment ?></td>
      <td>
        <button class="btn btn-primary" onclick="func()" type="button" id="<?=url('assignment/grade/'.$user->id.'/'.$assignment->id)?>" data-toggle="modal" data-target="#assignment" data-whatever="@mdo">Grade</button>
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
                    <label for="mark" class="col-form-label">Mark</label>
                    <input name='marks' type="number" min='0' max='<?=$assignment->total_marks?>' class="form-control" id="mark" >
                  </div>

                  <div class="form-group">
                    <label for="Comment" class="col-form-label">Comment</label>
                    <textarea name='comment' type="text" class="form-control" id="Comment" ></textarea>
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
