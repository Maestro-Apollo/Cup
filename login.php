<?php
session_start();
require_once('class/database.php');
class login extends database
{
    public function loginFunction()
    {
        if (isset($_POST['submit'])) {
            $username = addslashes(trim($_POST['username']));
            $password = addslashes(trim($_POST['password']));
            if (!empty($username) || !empty($password)) {
                $sqlFind = "SELECT * from user_tbl where username = '$username' ";
                $resFind = mysqli_query($this->link, $sqlFind);
                if (mysqli_num_rows($resFind) > 0) {
                    $row = mysqli_fetch_assoc($resFind);
                    $pass = $row['password'];
                    if (password_verify($password, $pass) == true) {
                        $_SESSION['username'] = $username;
                        header('location:profile.php');
                    } else {
                        $msg = '<div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Wrong Password</strong>
                      </div>';
                        return $msg;
                    }
                } else {
                    $msg = '<div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Invalid Information</strong>
                      </div>';
                    return $msg;
                }
            } else {
                $msg = '<div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Fields are empty! </strong>
                      </div>';
                return $msg;
            }
        }

        # code...
    }
}
$obj = new login;
$objLogin = $obj->loginFunction();





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