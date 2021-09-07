<?php
session_start();
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
    }

    img {
        width: 100%;
    }
    </style>
</head>

<body style="background-color: #F1D26C">
    <?php include_once('layout/navbar.php'); ?>
    <div class="back_color p-2">
        <div class="container">
            <h1 class="text-center p-5 text-white" style="font-family: 'Passion One', cursive;">WELCOME
                <span class="text-uppercase"><?php echo $_SESSION['username']; ?></span>
            </h1>

        </div>
    </div>





    <?php include_once('layout/script.php'); ?>

</body>

</html>