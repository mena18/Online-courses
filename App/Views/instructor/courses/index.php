<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course'];
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<style media="screen">

</style>

<div class="row pl-5 pr-5">

  <div class="col-12">
    <div class="accordion" id="accordionExample">

      <!-- Start of foor loop -->

      <?php foreach ($course->weeks() as $week_num => $week) { ?>

      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="black bold btn btn-link" type="button" data-toggle="collapse" data-target="#id_<?=$week_num?>" aria-expanded="true" aria-controls="collapseOne">
              Week <?=$week_num?>
            </button>
          </h2>
        </div>

        <div id="id_<?=$week_num?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">


          <?php foreach ($week as $ob) : ?>


            <?php if($ob['type']=='lesson'){ $lesson = $ob['content']; ?>

              <div class="card-body">
                <a href="<?=url('lesson/show/'.$lesson->id)?>">
                  <span class="fab fa-youtube"></span>
                  <span class="black hover_red">  <?=$lesson->name?>  </span>
                </a>
              </div>

            <?php }else if($ob['type']=='quiz'){ $quiz = $ob['content']; ?>
              <div class="card-body">
                <a href="<?=url('quiz/take/'.$quiz->id)?>" >
                  <span class="black hover_blue"> <?=$quiz->name?> </span>
                </a>
                <span class="float-right"> </span>
              </div>

            <?php }else if($ob['type']=='assignment'){ $assignment = $ob['content']; ?>

             <div class="card-body">
                 <a href="<?=url('assignment/show/'.$assignment->id)?>" >
                   <span class="black hover_blue"> <?=$assignment->name?></span>
                 </a>
                 <span class="float-right"> </span>
             </div>

           <?php } ?>

         <?php endforeach; ?>


        </div>
      </div>


    <?php } ?>



    <!-- End of for loop -->

    </div>
  </div>
</div>



<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
