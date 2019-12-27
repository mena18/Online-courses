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
                <li>
                    <a href="#">Week 1</a>
                </li>
                <li>
                    <a href="#">Week 2</a>
                </li>
                <li>
                    <a href="#">Week 3</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#assginment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Assignments</a>
            <ul class="collapse list-unstyled" id="assginment">
                <li>
                    <a href="#">Assignment 1</a>
                </li>
                <li>
                    <a href="#">Assignment 2</a>
                </li>
                <li>
                    <a href="#">Assignment 3</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="#quizzes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quizzes</a>
            <ul class="collapse list-unstyled" id="quizzes">
                <li>
                    <a href="#">Quiz 1</a>
                </li>
                <li>
                    <a href="#">Quiz 2</a>
                </li>
                <li>
                    <a href="#">Quiz 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
        <li>
            <a href="#">Course info</a>
        </li>
    </ul>

</nav>

<!-- Page Content  -->
<div id="content">
