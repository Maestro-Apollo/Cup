<?php
session_start();

// echo $_SERVER['REMOTE_ADDR'];
// echo $_SERVER['HTTP_USER_AGENT'];
// $pt = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
// echo $pt;
// $_SESSION['token'] = $pt;

// echo $_SESSION['joke'] = "Joker";




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once('layout/style.php'); ?>
    <style>
    .back_color {
        background-color: #F1D26C !important;
        height: 91vh;
    }
    </style>
</head>

<body>
    <?php include_once('layout/navbar.php'); ?>
    <div class="back_color p-2">
        <div class="container">
            <h1 class="text-center p-5" style="font-family: 'Passion One', cursive; color:#2B1200">Log In</h1>

            <form action="" class="form-group" method="post" data-parsley-validate>
                <div class="row">
                    <div class="col-md-4 offset-md-4 col-12">
                        <?php echo $objLogin; ?>
                    </div>
                    <div class="col-md-4 offset-md-4 col-12">
                        <input type="text" name="username" class="form-control p-3 border-0 shadow"
                            placeholder="Username" id="username" required>
                        <div id="output"></div>
                    </div>

                    <div class="col-md-4 offset-md-4 mt-4 col-12">
                        <input type="password" name="password" class="form-control p-3 border-0 shadow"
                            placeholder="Password" required>
                    </div>
                    <div class="col-md-4 offset-md-4 mt-4 col-12 text-center">
                        <input type="submit" name="submit" class="btn btn-light btn-lg shadow" value="Log In">
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/custom.js"></script>


</body>

</html>