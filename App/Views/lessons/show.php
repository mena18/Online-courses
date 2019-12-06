<?php

require_once("App/views/header.php");
$lesson = $data['lesson'];

print_array($lesson);
?>


<iframe width="1080" height="720"
src="https://www.youtube.com/embed/<?=$lesson['path']?>">
</iframe>

<?php
  if($data['watched'] == 1){
    ?>
    <a class="m5 p5 btn btn-secondary"  href="/courses/lesson/mark/<?=$lesson['id']?>">Mark as Un Watched</a>
  <?php }else{ ?>
    <a class="m5 p5 btn btn-primary"  href="/courses/lesson/mark/<?=$lesson['id']?>">Mark as Watched</a>
  <?php } ?>
<div class="mb-5">
  <h1><?=$lesson['description']?></h1>
</div>
