<?php
require_once(app_path("views/course_dashboard/header.php"));
require_once(app_path("views/course_dashboard/sidebar.php"));

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


<div class="tabcontent">
    <h3>Description</h3>

    <div style="width:1000px;margin:auto;">

      <div class="embed-responsive embed-responsive-16by9">
        <iframe class="frame embed-responsive-item" src="" allowfullscreen></iframe>
      </div>
      <button class="mb-5 mt-5 btn btn-primary">Mark as Watched</button>

    </div>
</div>

<div class="tabcontent">
  <h3>let's start lesson1</h3>
  <p><h4>1. Things change in Linux</h4>
    No matter how hard we have worked to stay current, Linux is constantly evolving, both at the technical level (including kernel features) and at the distribution and interface level. So please keep in mind we have tried to be as up to date as possible at the time this class was released,  but there will be changes and new features we haven't discussed. It is unavoidable.
  </p>
  <p><h4>2. We've repeated some things in the class material</h4>
    It is just about impossible in a course this comprehensive to never revisit topics that have previously been covered, and short reviews are helpful so you don't have to go scouring through earlier sections to jog your memory. This is particularly true with system configuration items, like how to use sudo to gain temporary root privileges in as safe a manner as possible. We know we have done this and, at least in most cases, it is by design, not accident.
  </p>
  <p><h4>3. We've tried to avoid holy wars</h4>
    There are many areas where there are strong preference disagreements in the Linux (and wider open-source) community. Examples include the best editor: emacs vs. vi; the best graphical desktop: GNOME vs. KDE, etc. Usually we have chosen (when neccessary) a particular alternative to emphasize just to keep things clean; for example we talk much more about GNOME than KDE simply because it has a bigger user base, not because we are taking a position as to which is superior.
  </p>
    <div style="width:1000px;margin:auto;">
      <div class="embed-responsive embed-responsive-16by9">
      <iframe class="frame embed-responsive-item" src="" allowfullscreen></iframe>
    </div>

      <button class="mb-5 mt-5 btn btn-primary">Mark as Watched</button>

  </div>
</div>

<div class="tabcontent">
  <h3>let's start lesson1</h3>
  <p><h4>1. Things change in Linux</h4>
    No matter how hard we have worked to stay current, Linux is constantly evolving, both at the technical level (including kernel features) and at the distribution and interface level. So please keep in mind we have tried to be as up to date as possible at the time this class was released,  but there will be changes and new features we haven't discussed. It is unavoidable.
  </p>
  <p><h4>2. We've repeated some things in the class material</h4>
    It is just about impossible in a course this comprehensive to never revisit topics that have previously been covered, and short reviews are helpful so you don't have to go scouring through earlier sections to jog your memory. This is particularly true with system configuration items, like how to use sudo to gain temporary root privileges in as safe a manner as possible. We know we have done this and, at least in most cases, it is by design, not accident.
  </p>
  <p><h4>3. We've tried to avoid holy wars</h4>
    There are many areas where there are strong preference disagreements in the Linux (and wider open-source) community. Examples include the best editor: emacs vs. vi; the best graphical desktop: GNOME vs. KDE, etc. Usually we have chosen (when neccessary) a particular alternative to emphasize just to keep things clean; for example we talk much more about GNOME than KDE simply because it has a bigger user base, not because we are taking a position as to which is superior.
  </p>
    <div style="width:1000px;margin:auto;">
      <div class="embed-responsive embed-responsive-16by9">
      <iframe  class="frame embed-responsive-item" src="" allowfullscreen></iframe>
    </div>

      <button class="mb-5 mt-5 btn btn-primary">Mark as Watched</button>

  </div>
</div>

<?php require_once(app_path("views/course_dashboard/footer.php")); ?>

<script>

var cur = 0,tabcontent,tablinks;
var links = [
'https://www.youtube.com/embed/Cd_zHYfD3jo',
'https://www.youtube.com/embed/rz3uAdmrUvE',
'https://www.youtube.com/embed/w6KhkbcMC6w'
];
window.onload = function(){
tabcontent = document.getElementsByClassName("tabcontent");
tablinks = document.getElementsByClassName("tablink");
tabcontent[cur].style.display='block';
tabcontent[cur].getElementsByTagName('iframe')[0].src = links[cur];

}
function right() {
if(cur < tabcontent.length-1){
    tabcontent[cur].style.display = "none";
    tabcontent[cur].getElementsByTagName('iframe')[0].src="";
    cur++;
    tabcontent[cur].style.display = "block";
    tabcontent[cur].getElementsByTagName('iframe')[0].src = links[cur];
    document.getElementById("b_name").innerHTML = "Lesson "+(cur+1);
}

}
function left(){
if(cur > 0 ){
    tabcontent[cur].style.display = "none";
    tabcontent[cur].getElementsByTagName('iframe')[0].src="";
    cur--;
    tabcontent[cur].style.display = "block";
    tabcontent[cur].getElementsByTagName('iframe')[0].src = links[cur];
  document.getElementById("b_name").innerHTML = "Lesson "+(cur+1);
}
}


</script>
