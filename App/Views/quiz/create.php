<?php require_once(app_path('views/header.php')); ?>

<style type="text/css">
    p{
        font-size: 30px;
    }
</style>



<div class="container">

<h3>Create New Quiz</h3>

    <form id="form" action="<?=url('quiz/store')?>" method="POST">


        <input type="hidden" id='hidden' name="value">
    </form>


    <div class="pt-2">
        <button class="float-right btn btn-primary " onclick="add()">Add new Question</button>
    </div>

    <br><br><br>

    <div class="text-center mb-5">
        <button class="w-25 btn btn-success align-center" onclick="save()"> SAVE </button>
    </div>









</div>







<?php require_once(app_path('views/footer.php')); ?>
