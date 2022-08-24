<?php
include_once "loginControl.php";
include_once "_game.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz</title>
    <link rel="stylesheet" href="css/game.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body><br><br><br><br>
<?php
if(isset($_GET['tip']) && isset($_GET['quiz']) && isset($_GET['success'])){
    $tip = $_GET['tip'];
    $quiz = $_GET['quiz'];
    $success= $_GET['success'];

    if($tip==1){
        echo "<div class='alert alert-primary' role='alert'><h4>Dogrudur: {$quiz} -> {$success}</h4></div>";
    }else{
        echo "<div class='alert alert-danger' role='alert'><h4>Yanlisdir: {$quiz} -> {$success}</h4></div>";
    }
}


?>
<div class="container  mt-sm-5 my-1" style="background-image: linear-gradient(to right, #8360c3, #2ebf91);">
    <form action="_check.php" method="post">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><b>Q. What is mean "<?=$my_quiz['quiz'] ?>"?</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">

            <?php foreach ($my_quiz['variant'] as $value) : ?>
            <label class="options"><?=$value ?>
                <input type="radio" name="word" value="<?=$value?>">
                <span class="checkmark"></span>
            </label>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="d-flex align-items-center pt-3">
        <div id="prev">
            <a href="home.php" class="btn btn-primary">Previous</a>
        </div>
        <div class="ml-auto mr-sm-5">
            <button class="btn btn-success">Next</button>
        </div>
    </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>