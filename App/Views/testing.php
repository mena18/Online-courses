<?php



foreach ($data['a'] as $course) {
  echo $course->play();
}

foreach ($data['b'] as $lesson) {
  echo $lesson->play2();
}
