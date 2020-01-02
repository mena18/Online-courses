<?php require_once(app_path("views/admin/admin_header.php")); ?>


<!-- cards -->

  <div class="row pt-3 pb-3">
    <div class="col-xl-3 col-sm-6 p-2">
      <div class="card card-common">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <i class="fas fa-users fa-3x text-warning"></i>
            <div class="text-right text-secondary">
              <h5>Courses</h5>
              <h3><?= $data['count_courses'] ?></h3>
            </div>
          </div>
        </div>
        <div class="card-footer text-secondary">
          <i class="fas fa-sync mr-3"></i>
          <a class="text-black" href="<?= url("admin/all_courses"); ?>">Show them</a>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-2">
      <div class="card card-common">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <i class="fas fa-users fa-3x text-success"></i>
            <div class="text-right text-secondary">
              <h5>Categories</h5>
              <h3><?= $data['count_categories'] ?></h3>
            </div>
          </div>
        </div>
        <div class="card-footer text-secondary">
          <i class="fas fa-sync mr-3"></i>
          <a class="text-black" href="<?= url("admin/all_categories"); ?>">Show them</a>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-2">
      <div class="card card-common">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <i class="fas fa-users fa-3x text-info"></i>
            <div class="text-right text-secondary">
              <h5>Users</h5>
              <h3><?= $data['count_users'] ?></h3>
            </div>
          </div>
        </div>
        <div class="card-footer text-secondary">
          <i class="fas fa-sync mr-3"></i>
          <a class="text-black" href="<?= url("admin/all_users"); ?>">Show them</a>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-2">
      <div class="card card-common">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <i class="fas fa-users fa-3x text-danger"></i>
            <div class="text-right text-secondary">
              <h5>Instructors</h5>
              <h3><?= $data['count_instructors'] ?></h3>
            </div>
          </div>
        </div>
        <div class="card-footer text-secondary">
          <i class="fas fa-sync mr-3"></i>
          <a class="text-black" href="<?= url("admin/all_instructors"); ?>">Show them</a>
        </div>
      </div>
    </div>
  </div>

<!-- end of cards -->



<!-- Create category / create instructor -->

<div class="row align-items-center mb-5">

  <!-- Create category  -->
    <div class="col-xl-6 mt-5">
      <div class="card rounded">
        <div class="card-body">
          <h5 class="text-muted text-center mb-4">Create New Category</h5>

          <form action="<?=url('admin/store_category')?>" method="POST">
            <div class="form-group">
              <input type="text" required name='name' class="form-control py-2 mb-3" placeholder="Category name">
              <button type="submit" class="btn btn-block text-uppercase font-weight-bold text-light bg-info py-2 mb-5">Submit Post</button>
            </div>
          </form>

        </div>
      </div>
    </div>

          <!-- End of creating  category  -->




          <!-- Create Instructor  -->
    <div class="col-xl-6 mt-5">
      <div class="card rounded">
        <div class="card-body">
          <h5 class="text-muted text-center mb-4">Create New Instructor</h5>

          <form action="<?=url('admin/store_instructor')?>" method="POST">
            <div class="form-group">
              <input type="text" required name='name' class="form-control py-2 mb-3" placeholder="name">
              <input type="email" required name='email' class="form-control py-2 mb-3" placeholder="Email ">
              <input type="password" required name='password' class="form-control py-2 mb-3" placeholder="password">
              <button type="submit" class="btn btn-block text-uppercase font-weight-bold text-light bg-info py-2 mb-5">Submit Post</button>
            </div>
          </form>

        </div>
      </div>
    </div>

          <!-- End of creating  Instructor  -->

</div>


<!-- end of activities / quick post -->



<?php require_once(app_path("views/admin/admin_footer.php")); ?>
