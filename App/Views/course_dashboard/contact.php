<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));
$messages = $data['messages'];
$counter=1;
 ?>

 <div class="container">
     <h1 class="pt-2 pb-2">Send message to instrcutor</h1>
 	   <form  action="<?=url('course/contact_save/'.$course->id)?>" method="POST">

 		<div class="form-group">
 			<label for="title">Title</label>
 			<input type="text" class="form-control" name="title" required="required" id="title" aria-describedby="name">
 		</div>


 		<div class="form-group">
 			<label for="body">Message Body</label>
 			<textarea rows="7" class="form-control" name="body" required="required" id="body"></textarea>
 		</div>

 		<button class="btn btn-success" >Submit</button>


 	</form>

 </div>

 <div class="container mt-5">
   <table class="table table-hover">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">title</th>
         <th scope="col">body</th>
         <th scope="col">response</th>
       </tr>
     </thead>
     <tbody>
       <?php foreach ($messages as $message): ?>
         <tr>
           <th scope="row"><?=$counter++?></th>
           <td><?=$message->title?></td>
           <td><?=$message->body?></td>
           <td><?=$message->responde?></td>
         </tr>
       <?php endforeach; ?>

     </tbody>
   </table>
 </div>

<div class="pt-5">

</div>


<?php require_once(app_path("views/course_dashboard/footer.php"));
