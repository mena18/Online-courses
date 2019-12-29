<?php $course = $data['course']; ?>
<nav id="sidebar">
    <div class="sidebar-header">
        <h3><a href="<?= url('courses/index') ?>">Courses Website</a></h3>
    </div>

    <ul class="list-unstyled components">
        <p><a href="<?= url('course/show/'.$course->id) ?>"><?=$course->name?></a></p>

        <li class="active">
            <a href="<?= url('course/show/'.$course->id) ?>">Home</a>
        </li>

        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Weeks</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
              <?php for($i=1;$i<=$course->duration_weeks;$i++){ ?>
                <li>
                    <a href="<?=url("course/week/".$course->id.'/'.$i)?>">Week <?=$i?></a>
                </li>
              <?php }?>
            </ul>
        </li>

        <li>
            <a href="#assginment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assignments</a>
            <ul class="collapse list-unstyled" id="assginment">
                <?php foreach ($course->assignments() as $assignment) { ?>
                  <li>
                      <a href="<?=url("assignment/show/".$assignment->id)?>"><?=$assignment->name?></a>
                  </li>
                <?php } ?>
            </ul>
        </li>


        <li>
            <a href="#quizzes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quizzes</a>
            <ul class="collapse list-unstyled" id="quizzes">
              <?php foreach ($course->quizzes() as $quiz) { ?>
                <li>
                    <a href="<?=url('quiz/take/'.$quiz->id)?>"><?=$quiz->name?></a>
                </li>
              <?php } ?>
            </ul>
        </li>
        <li>
            <a href="<?=url("course/contact_instructor/".$course->id)?>">Contact</a>
        </li>
        <li>
            <a href="<?=url("course/info/".$course->id)?>" >Course info</a>
        </li>
        <li>
            <a href="<?=url("resourses/all/".$course->id)?>" >Course resourses</a>
        </li>
    </ul>

</nav>

<!-- Page Content  -->
<div id="content">
