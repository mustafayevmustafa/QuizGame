<?php

require_once '_access.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!--Main Navigation-->
<section class="vh-100" style="background-color: #2779e2;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">

                <h1 class="text-white mb-4">Forget Password</h1>

                <form action="_forget.php" method="post">
                    <div class="card" style="border-radius: 15px;">

                        <div class="card-body">
                            <h3 style="color: red"><?php echo isset($_GET['msg']) ? $_GET['msg'] : ''; ?></h3>

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <h6 class="mb-0">Email</h6>

                                </div>
                                <div class="col-md-9 pe-5">

                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter Email" required/>

                                </div>
                            </div>

                            <div class="px-5 py-4">
                                <a href="index.php" class="btn btn-primary btn-lg">&laquo; Previous</a>
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>