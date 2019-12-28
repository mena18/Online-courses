<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));
$lessons = $data['lessons'];
$user = $data['user'];
 ?>

<style>

.tabcontent {
  color: black;
  display: none;
  padding: 100px 20px;
  height: 80%;
}
#b_name{
  width: 200px;
}
</style>

<div class="text-center pt-5">
  <div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" onclick="left()" class="btn btn-secondary"><span class="fa fa-arrow-left"></span></button>
    <button id='b_name' type="button" class="btn btn-secondary">Lesson 1</button>
    <button type="button" onclick="right()" class="btn btn-secondary"><span class="fa fa-arrow-right"></span></button>
  </div>
</div>



  <?php foreach ($lessons as $lesson){ ?>
    <div class="tabcontent">
      <h3><?=$lesson->description?></h3>
      <div style="width:1000px;margin:auto;">

        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="frame embed-responsive-item" src="" allowfullscreen></iframe>
        </div>


        <?php if($user->watched($lesson->id) == 1){?>

         <a class="mt-5 btn btn-secondary"  href="<?=url('lesson/mark/')?><?=$lesson->id?>">Mark as Un Watched</a>

       <?php }else { ?>

         <a class="mt-5 btn btn-primary"  href="<?=url('lesson/mark/')?><?=$lesson->id?>">Mark as Watched</a>
       <?php } ?>


      </div>
    </div>
  <?php } ?>




<?php require_once(app_path("views/course_dashboard/footer.php")); ?>



<script>


var cur = <?=$data['lesson_num']-1?>,tabcontent,tablinks;
var links = [
  <?php  foreach ($lessons as $lesson) {
    echo "'https://www.youtube.com/embed/" . $lesson->video_id . "',";
  }?>
];
var names = [
  <?php  foreach ($lessons as $lesson) {
    echo "'" . $lesson->name . "',";
  }?>
];



window.onload = function(){
tabcontent = document.getElementsByClassName("tabcontent");
tablinks = document.getElementsByClassName("tablink");
tabcontent[cur].style.display='block';
tabcontent[cur].getElementsByTagName('iframe')[0].src = links[cur];
document.getElementById("b_name").innerHTML = names[cur];
}
function right() {
if(cur < tabcontent.length-1){
    tabcontent[cur].style.display = "none";
    tabcontent[cur].getElementsByTagName('iframe')[0].src="";
    cur++;
    tabcontent[cur].style.display = "block";
    tabcontent[cur].getElementsByTagName('iframe')[0].src = links[cur];
    document.getElementById("b_name").innerHTML = names[cur];
}

}
function left(){
if(cur > 0 ){
    tabcontent[cur].style.display = "none";
    tabcontent[cur].getElementsByTagName('iframe')[0].src="";
    cur--;
    tabcontent[cur].style.display = "block";
    tabcontent[cur].getElementsByTagName('iframe')[0].src = links[cur];
  document.getElementById("b_name").innerHTML = names[cur];
}
}


</script>
