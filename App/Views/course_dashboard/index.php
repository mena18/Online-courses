<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));
$user = $data['user'];
$user_progress = (int) ($user->course_progress($course->id)*100);
$user_marks = $user->course_marks($course->id);
$course_total_marks = $course->total_marks();

 ?>
<div class="row p-5">
 <div class="col-xl-6 col-lg-6 mb-4">
   <div class="bg-white rounded-lg p-5 shadow">
     <h2 class="h6 font-weight-bold text-center mb-4">Overall progress</h2>

     <!-- Progress bar 1 -->

     <div class="progress mx-auto" data-value='<?=$user_progress?>'>
       <span class="progress-left">
                     <span class="progress-bar border-primary"></span>
       </span>
       <span class="progress-right">
                     <span class="progress-bar border-primary"></span>
       </span>
       <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
         <div class="h2 font-weight-bold"><?=$user_progress?><sup class="small">%</sup></div>
       </div>
     </div>
     <!-- END -->

     <!-- Demo info -->

     <!-- END -->
   </div>
 </div>

<!-- Progress bar 2 -->
<div class="col-xl-6 col-lg-6 mb-4">
     <div class="bg-white rounded-lg p-5 shadow">
       <h2 class="h6 font-weight-bold text-center mb-4">Grades</h2>

       <!-- Progress bar 2 -->
       <div class="progress mx-auto" data-value='<?=($user_marks/$course_total_marks)*100?>'>
         <span class="progress-left">
                       <span class="progress-bar border-danger"></span>
         </span>
         <span class="progress-right">
                       <span class="progress-bar border-danger"></span>
         </span>
         <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
           <div class="h2 font-weight-bold"><?=$user_marks.'/'.$course_total_marks?></div>
         </div>
       </div>
       <!-- END -->

       <!-- Demo info-->

       <!-- END -->
     </div>
   </div>
</div>

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

           <?php $counter=1 ?>
           <?php foreach ($week as $ob) { ?>


             <?php if($ob['type']=='lesson'){ $lesson = $ob['content']; ?>
               <div class="card-body">
                 <a href="<?=url('course/week/'.$course->id.'/'.$week_num.'/'.$counter++)?>"><span class="fa fa-youtube-play"></span> <span class="black hover_red"><?=$lesson->name?></span></a>
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
             <?php }else if($ob['type']=='assignment'){ $assignment = $ob['content']; ?>
              <div class="card-body">
                  <a href="<?=url('assignment/show/'.$assignment->id)?>" ><span class="black hover_blue fa fa-tasks"> <?=$assignment->name?></span></a>
                  <span class="float-right"><?=$user->finished_assignment($assignment->id)?>/<?=$assignment->total_marks?> </span>
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
 </div>


<?php require_once(app_path("views/course_dashboard/footer.php"));
