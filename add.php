<?php
include_once "loginControl.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Dictionary</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!--Main Navigation-->
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <h3><?php echo isset($_GET['msg']) ? "<div class='alert alert-primary' role='alert'><h4>{$_GET['msg']}</h4></div>" : ''; ?></h3>
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Dictionary</h3>
                        <form action="_add.php" method="post">
                            <div class="row">
                                <div class="col-md-12 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="word_lang_1">Word Language 1</label>
                                        <input type="text" id="word_lang_1" name="word_lang_1" class="form-control form-control-lg" placeholder="Word Language 1"/>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="word_lang_2">Word Language 2</label>
                                        <input type="text" id="word_lang_2" name="word_lang_2" class="form-control form-control-lg" placeholder="Word Language 2"/>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 pt-2">
                                <input class="btn btn-success btn-lg" type="submit" value="Add"/>
                                <input class="btn btn-danger btn-lg" type="reset" value="Reset"/>
                                <a href="home.php" class="btn btn-primary btn-lg">&laquo; Previous</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/Footer-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>