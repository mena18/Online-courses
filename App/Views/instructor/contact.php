<?php
require_once(app_path("views/instructor/instructor_header.php"));
$course = $data['course'];
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>



<div class="row mb-5">

 <div class="col-7 m-auto">
   <div id="accordion">
     <h4 class="text-muted mb-4"> New Messages </h4>

     <?php foreach ($course->unseen_messages() as $message): ?>
       <div class="card">
         <div class="card-header">
           <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapse_<?=$message->id?>">
             <img src="<?=public_path('images/cust1.jpeg')?>" width="50" class="mr-3 rounded">
             <?= $message->name ?> Send message (<?= $message->title ?>)
           </button>
         </div>
         <div class="collapse show" id="collapse_<?=$message->id?>" data-parent="#accordion">
           <div class="card-body">

            <?= $message->body ?>

            <form class="pt-5" method="POST" action="<?=url('messages/responde/'.$message->id);?>">
               <div class="form-group">
                 <label class="bold" for=''>Response</label>
                 <textarea id='' name='responde' class="form-control"></textarea>
                 <button type="submit" class="mt-3 btn btn-success">Send</button>
               </div>
             </form>
           </div>

         </div>
       </div>
     <?php endforeach; ?>







   </div>
   </div>
 </div>

<hr>



 <div class="row mt-5">

  <div class="col-7 m-auto">
    <div id="accordion">
      <h4 class="text-muted mb-4"> Old Messages </h4>


      <?php foreach ($course->seen_messages() as $message): ?>
        <div class="card">
          <div class="card-header">
            <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapse_<?=$message->id?>">
              <img src="<?=public_path('images/cust1.jpeg')?>" width="50" class="mr-3 rounded">
              <?= $message->name ?> Send message (<?= $message->title ?>)
            </button>
          </div>
          <div class="collapse show" id="collapse_<?=$message->id?>" data-parent="#accordion">
            <div class="card-body">
              <?= $message->body ?>
              <div class="form-group pt-3">
                <label class="bold" for=''>Response</label>
                <textarea readonly id='' name='response' class="form-control"><?= $message->responde ?></textarea>
              </div>

            </div>

          </div>
        </div>
      <?php endforeach; ?>






    </div>
    </div>
  </div>





<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
