<?php
include_once "loginControl.php";
include_once "_dictionary.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dictionary</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!--Main Navigation-->
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <h1 class="text-success">My Dictionary</h1><br>

            <ol  class="list-group list-group-light list-group-numbered">
                <?php  foreach ($dictionaryList as $dictionary) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?=  $dictionary['word_lang_1'] ?></div>
                        <?=  $dictionary['word_lang_2'] ?>
                    </div>
                </li>
                <?php endforeach;   ?>
            </ol>
        <br>
        <a href="home.php" class="btn btn-primary btn-lg">&laquo; Previous</a>

    </div>
</section><!--/Footer-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>