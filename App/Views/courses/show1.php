<?php require_once("App/views/header.php"); ?>


  <!--start upper bar-->

  <!--end upper bar-->
  <!--name of course-->
  
  <!--beginning of collapse part-->
<div class="pt-2 pb-2 pl-5">
  <h2 style="font-style: italic;"><?=$data['course']['name']?></h2>
</div>

<?php 

?>
<div class="row pl-5 pr-5">
    
  <div class="col-8">
    <div class="accordion" id="accordionExample">

      <!-- Start of foor loop -->
      <?php foreach ($data['weeks'] as $week_name => $week) { ?>
        
      

      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#id_<?=$week_name?>" aria-expanded="true" aria-controls="collapseOne">
              Week <?=$week_name?>
            </button>
          </h2>
        </div>

        <div id="id_<?=$week_name?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
          <?php foreach ($week as $lesson) { ?>
          <div class="card-body">
            <a href="/courses/lesson/show/<?=$lesson['id']?>"><?=$lesson['name']?></a>
            <?php if($lesson['finished']){ ?>
             <span class="check-box-marked fa fa-check-square-o"></span>
            <?php }else{ ?>
              <span class="check-box-unmarked fa fa-square-o"></span> 
            <?php } ?>

          </div>
          <?php } ?>
        </div>
      </div>

      <?php } ?>
    
    <!-- End of for loop -->
  
    </div>
  </div>
  <!--end of collapse part-->
  <!--start of side bar-->
  <div class="col-4">
    <div class="sidebar">
      <img src="<?= public_path($data['course']['image']) ?>" style="width: 200px">
      <br>
      <img src="<?= public_path($data['instructor']['image']) ?>">
      <br>
      <p> <?= $data['instructor']['name'] ?>, <?= $data['instructor']['description'] ?></p>
      <h3>Description</h3>
      <p>
        <?= $data['course']['description']; ?>
      </p>
    </div>
  </div>
</div>
  <!--End of side bar-->


<?php require_once("App/views/footer.php"); ?>