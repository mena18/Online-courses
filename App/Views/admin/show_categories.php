<?php require_once(app_path("views/admin/admin_header.php")); $counter=1;?>





<h3 class="text-muted text-center pt-3 mb-3">Categories</h3>
<table class="table table-dark table-hover text-center">
  <thead>
    <tr class="text-muted">
      <th>#</th>
      <th>Name</th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data['categories'] as $category) { ?>
    <tr>
      <th><?=$counter++?></th>
      <td><?= $category->name ?></td>
      <td>
        <button class="btn btn-success" onclick="func()" type="button" id="<?=url('admin/update_category/'.$category->id)?>" data-toggle="modal" data-target="#resourses" data-whatever="@mdo">Edit</button>
        <?php $path = url('admin/delete_category/'.$category->id) ;?>
        <button onclick="delete_swal('<?=$path?>')" class="btn btn-danger">Delete</button>
      </td>

    </tr>
  <?php   } ?>

  </tbody>
</table>




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

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>


                </form>
            </div>


        </div>
    </div>
</div>











<?php require_once(app_path("views/admin/admin_footer.php")); ?>



<script type="text/javascript">
    function func(){
      e = window.event.target;
      $('#form_edit').attr('action', e.id);
    }
</script>
