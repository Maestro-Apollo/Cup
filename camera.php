<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Display Webcam Stream</title>
    <?php include_once('layout/style.php'); ?>
    <style>
    /* #container {
        margin: 0px auto;
        width: 500px;
        height: 375px;
        border: 10px #333 solid;
    } */

    #videoElement {
        width: 500px;
        height: 375px;
        background-color: #666;
        margin: 0 auto;
    }
    </style>
</head>

<body style="background-color:#F1D26C">
    <?php include_once('layout/navbar.php'); ?>
    <div class="back_color">
        <div class="container">
            <h1 class="text-center p-5 text-white" style="font-family: 'Passion One', cursive;">Check Camera</h1>
            <div id="container" class="text-center">
                <video autoplay="true" id="videoElement">

                </video>
            </div>
        </div>
    </div>


    <?php include_once('layout/script.php'); ?>

    <script>
    var video = document.querySelector("#videoElement");

    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function(stream) {
                video.srcObject = stream;
            })
            .catch(function(err0r) {
                console.log("Something went wrong!");
            });
    }
    </script>
</body>

</html>