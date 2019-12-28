<?php
require_once(app_path("views/instructor/instructor_header.php"));
$assignment = $data['assignment'];
$course = $assignment->course();
require_once(app_path("views/instructor/instructor_sidebar.php")); ?>

<h1>Show assignments</h1>



<?php require_once(app_path("views/instructor/instructor_footer.php")); ?>
