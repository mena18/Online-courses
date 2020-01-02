<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course']; $counter=1;
$files = $course->resourses();
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<div class="container">

  <div class="row">
    <div class="col-10">
      <h3 class="text-muted text-center pt-3 mb-3">Resourses</h3>
    </div>
    <div class="col-2">
      <button class="mt-3 mb-3 btn btn-primary" onclick="func()" type="button" id="<?=url('resourses/store/'.$course->id)?>" data-toggle="modal" data-target="#resourses" data-whatever="@mdo">Create resourses</button>
    </div>
  </div>


<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Week</th>
      <th scope="col">file</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($files as $file) { ?>
    <tr>
      <tr>
        <th scope="row"><?=$counter++?></th>
        <td><?=$file->name?></td>
        <td><?=$file->week_num?></td>
        <td><a href="<?=$file->path?>" download><span style="font-size:25px;" class="fa fa-download"></span></a></td>
        <td>
          <button id="<?=url('resourses/update/'.$file->id)?>" onclick='func()' type="button" class="btn btn-primary" data-toggle="modal" data-target="#resourses" data-whatever="@mdo">Edit resourses</button>
          <?php $path = url('resourses/delete/'.$file->id) ;?>
          <button onclick="delete_swal('<?=$path?>')" class="btn btn-danger">Delete</button>
        </td>
      </tr>
    </tr>
  <?php   } ?>

  </tbody>
</table>

</div>


<div class="modal fade" id="resourses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="week_num" class="col-form-label">Week</label>
                    <input name='week_num' type="number" class="form-control" id="week_num" >
                  </div>

                  <div class="form-group">
                    <label for="path" class="col-form-label">path</label>
                    <input name='path' type="file" class="form-control-file" id="path" >
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
