<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));
$user = $data['user'];

$user_progress = (int) ($user->course_progress($course->id)*100);
$user_marks = $user->quizzes_marks($course->id) + $user->assignments_marks($course->id);
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


       if($user_progress==100 && $user->user_course_finished($course->id) == 0 && ( ($user_marks/$course_total_marks)>=(3/4)) ){ ?>
           <button class="mt-3 mb-3 btn btn-primary" onclick="func()" type="button" id="<?=url('course/user_finish/'.$course->id)?>" data-toggle="modal" data-target="#assignment" data-whatever="@mdo">Finish course</button>
       <?php } ?>

     <!-- End of for loop -->



<!-- Modal -->



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
                <form id='form_edit' action="<?=url('course/user_finish/'.$course->id)?>" method="POST">

                  <div class="form-group">
                    <label for="dead_line" class="col-form-label">Rating</label>
                    <input name='rating' type="number" min=1 max=5 class="form-control" id="dead_line" >
                  </div>

                  <div class="form-group">
                    <label for="total_marks" class="col-form-label">review</label>
                    <input name='review' type="text" class="form-control" id="total_marks" >
                  </div>


                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Finish</button>
                  </div>


                </form>
            </div>


        </div>
    </div>
</div>






<!-- End Modal -->






     </div>
   </div>
 </div>


<?php require_once(app_path("views/course_dashboard/footer.php")); ?>



<script type="text/javascript">
    function func(){
      e = window.event.target;
      $('#form_edit').attr('action', e.id);
    }
</script>
