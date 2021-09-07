<?php
session_start();
require_once('class/database.php');
class registration extends database
{
    public function registerFunction()
    {
        if (isset($_POST['submit'])) {
            $username = addslashes(trim($_POST['username']));
            $email = addslashes(trim($_POST['email']));
            $password = addslashes(trim($_POST['password']));
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);
            $pass = password_hash($password, PASSWORD_DEFAULT);



            if (!empty($username) || !empty($email) || !empty($password)) {
                $sqlFind = "SELECT * from user_tbl where username = '$username' ";
                $resFind = mysqli_query($this->link, $sqlFind);
                if (mysqli_num_rows($resFind) > 0) {
                    $msg = '<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Username Taken</strong>
              </div>';
                    return $msg;
                } else {
                    $sql = "INSERT INTO `user_tbl` (`user_id`, `username`, `email`, `password`, `token`, `created`) VALUES (NULL, '$username', '$email', '$pass', '$token', CURRENT_TIMESTAMP)";
                    $res = mysqli_query($this->link, $sql);
                    if ($res) {
                        $_SESSION['username'] = $username;
                        header('location:profile.php');
                        echo "Added";
                    } else {
                        echo "Not Added";
                    }
                }
            } else {
                $msg = '<div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Invalid Information</strong>
              </div>';
                return $msg;
            }
        }

        # code...
    }
}
$obj = new registration;
$objRegister = $obj->registerFunction();



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
            <h1 class="text-center p-5" style="font-family: 'Passion One', cursive; color:#2B1200">Create New
                Account</h1>
            <form action="" class="form-group" method="post" data-parsley-validate>
                <div class="row">
                    <div class="col-md-4 offset-md-4 col-12">
                        <?php echo $objRegister; ?>
                    </div>
                    <div class="col-md-4 offset-md-4 col-12">
                        <input type="text" name="username" class="form-control p-3 border-0 shadow"
                            placeholder="Username" id="username" required>
                        <div id="output"></div>
                    </div>
                    <div class="col-md-4 offset-md-4 mt-4 col-12">
                        <input type="email" name="email" class="form-control p-3 border-0 shadow" placeholder="Email"
                            required>
                    </div>
                    <div class="col-md-4 offset-md-4 mt-4 col-12">
                        <input type="password" name="password" class="form-control p-3 border-0 shadow"
                            placeholder="Password" data-parsley-min="6" required>
                    </div>
                    <div class="col-md-4 offset-md-4 mt-4 col-12 text-center">
                        <input type="submit" name="submit" class="btn btn-light btn-lg shadow" value="Create Account">
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    $(document).ready(function() {
        $('#username').keyup(function() {
            let username = $(this).val();
            if (username.length != '') {
                $.ajax({
                    type: 'POST',
                    url: 'find.php',
                    data: {
                        username: username
                    },
                    dataType: 'text',
                    success: function(response) {
                        $('#output').fadeIn();
                        $('#output').html(response);
                    },
                });
            } else {
                $('#output').fadeOut();
                $('#output').html("");
            }
        });
    });
    </script>

</body>

</html>