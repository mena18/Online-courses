<?php require_once(app_path('views/header.php')); $user = $data['user']; ?>


  <!--start upper bar-->

  <!--end upper bar-->
  <!--name of course-->

  <!--beginning of collapse part-->
<div class="pt-2 pb-2 pl-5">
  <h2 style="font-style: italic;"><?=$data['course']->name?></h2>
</div>


<div class="row pl-5 pr-5">

  <div class="col-8">
    <div class="accordion" id="accordionExample">

      <!-- Start of foor loop -->

      <?php foreach ($data['weeks'] as $week_name => $week) { ?>

      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="black bold btn btn-link" type="button" data-toggle="collapse" data-target="#id_<?=$week_name?>" aria-expanded="true" aria-controls="collapseOne">
              Week <?=$week_name?>
            </button>
          </h2>
        </div>

        <div id="id_<?=$week_name?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">


          <?php foreach ($week as $ob) { ?>


            <?php if($ob['type']=='lesson'){ $lesson = $ob['content']; ?>
              <div class="card-body">
                <a href="<?=url('lesson/show/')?><?=$lesson->id?>"><span class="fa fa-youtube-play"></span> <span class="black hover_red"><?=$lesson->name?></span></a>
                <?php if($user->watched($lesson->id)){ ?>
                 <span class="check-box-marked fa fa-check-square-o"></span>
                <?php }else{ ?>
                  <span class="check-box-unmarked fa fa-square-o"></span>
                  <!-- <span class="check-box-unmarked fa fa-question-circle"></span> -->
                <?php } ?>

              </div>
            <?php }else if($ob['type']=='quiz'){ $quiz = $ob['content']; ?>
              <div class="card-body">
                <a href="<?=url('quiz/take/'.$quiz->id)?>" ><span class="black hover_blue fa fa-question-circle"> <?=$quiz->name?></span></a>

                 <span class="float-right"><?=$user->finished_quiz($quiz->id)?>/<?=$quiz->total_marks?> </span>
              </div>
            <?php } ?>


          <?php } ?>


        </div>
      </div>


      <?php }

      $finished = $user->course_progress($data['course']->id);
      if($finished==1){ ?>
          <a href="<?=url('course/user_finish/'.$data['course']->id)?>" class="btn btn-primary mt-5 mb-5">Finish course</a>
      <?php } ?>

    <!-- End of for loop -->

    </div>
  </div>
  <!--end of collapse part-->
  <!--start of side bar-->
  <div class="col-4">
    <div class="sidebar">
      <img src="<?= public_path($data['instructor']->image) ?>">
      <br>
      <p> <?= $data['instructor']->name ?>, <?= $data['instructor']->description ?></p>
      <h3>Description</h3>
      <p>
        <?= $data['course']->description; ?>
      </p>
    </div>
  </div>
</div>
  <!--End of side bar-->


<?php require_once(app_path('views/footer.php')); ?>
