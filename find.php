<?php
require_once('class/database.php');
class registration extends database
{
    public function registerFunction()
    {
        if (isset($_POST['username'])) {
            $username = addslashes(trim($_POST['username']));
            if (strlen($username) > 5) {
                $sqlFind = "SELECT * from user_tbl where username = '$username' ";
                $resFind = mysqli_query($this->link, $sqlFind);
                if (mysqli_num_rows($resFind) > 0) {
                    echo '<span class="text-danger font-weight-bold">Username is taken<span>';
                } else {
                    echo '<span class="text-success font-weight-bold">Username is available<span>';
                }
            } else {
                echo '<span class="text-danger font-weight-bold">Minimum 6 characters<span>';
            }
        }

        # code...
    }
}
$obj = new registration;
$objRegister = $obj->registerFunction();