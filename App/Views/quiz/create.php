<?php require_once("App/views/header.php"); ?>

<style type="text/css">
    p{
        font-size: 30px;
    }
</style>



<div class="container">

<h3>Create New Quiz</h3>

    <form id="form" action="/courses/quiz/store" method="POST">
        

        <input type="hidden" id='hidden' name="value">
        <input type="submit" name="">
        
    </form>


    <div class="pt-2">
        <button class="float-right btn btn-primary " onclick="add()">Add new Question</button>    
    </div>

    <div class="text-center mb-5">
        <button class="w-25 btn btn-success align-center" type='submit' onclick="save()"> SAVE </button>
    </div>

    <br><br><br>


    




</div>







<?php require_once("App/views/footer.php"); ?>