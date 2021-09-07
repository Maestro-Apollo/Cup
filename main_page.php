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

<body>
    <?php include_once('layout/navbar.php'); ?>
    <div class="back_color p-2">
        <div class="container">
            <h1 class="text-center p-5 text-white" style="font-family: 'Passion One', cursive;">Main Menu</h1>
            <div class="">
                <div class="row">
                    <div class="col-md-4">
                        <a href="stuff.php" class="text-decoration-none">
                            <div class="card shadow border-0">
                                <img class="card-img-top" src="images/group2-hi5_25902484-300x300.jpg"
                                    alt="Card image cap">
                                <h3 class="text-center text-decoration-none p-5 text-dark"
                                    style="font-family: 'Passion One', cursive;">Check
                                    Employee</h3>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="camera.php" class="text-decoration-none">
                            <div class="card shadow border-0">
                                <img class="card-img-top" src="images/Untitled-1-19-300x300.jpg" alt="Card image cap">
                                <h3 class="text-center text-decoration-none p-5 text-dark"
                                    style="font-family: 'Passion One', cursive;">Check
                                    Camera</h3>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="inventory.php" class="text-decoration-none">
                            <div class="card shadow border-0">
                                <img class="card-img-top" src="images/inventory-management-300x300.jpg"
                                    alt="Card image cap">
                                <h3 class="text-center text-decoration-none p-5 text-dark"
                                    style="font-family: 'Passion One', cursive;">Check
                                    Inventory</h3>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col-md-4">
                        <a href="active.php" class="text-decoration-none">
                            <div class="card shadow border-0">
                                <img class="card-img-top" src="images/LMS_Pricing-Active_Users_with_border-300x300.png"
                                    alt="Card image cap">
                                <h3 class="text-center text-decoration-none p-5 text-dark"
                                    style="font-family: 'Passion One', cursive;">Who is Active</h3>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="presentation.php" class="text-decoration-none">
                            <div class="card shadow border-0">
                                <img class="card-img-top" src="images/2343.png_300.png" alt="Card image cap">
                                <h3 class="text-center text-decoration-none p-5 text-dark"
                                    style="font-family: 'Passion One', cursive;">Data presentation</h3>

                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="prediction.php" class="text-decoration-none">
                            <div class="card shadow border-0">
                                <img class="card-img-top" src="images/white-male-2064875_1280-300x300.jpg"
                                    alt="Card image cap">
                                <h3 class="text-center text-decoration-none p-5 text-dark"
                                    style="font-family: 'Passion One', cursive;">Last prediction</h3>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include_once('layout/script.php'); ?>

</body>

</html>