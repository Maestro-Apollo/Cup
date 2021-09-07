<?php
session_start();
require_once('class/database.php');
class stuff extends database
{
    public function stuffFunction()
    {
        $sql = "SELECT *
        FROM sale_status
        INNER JOIN inventory
        ON inventory.itemID = sale_status.invoice_ID INNER JOIN staff ON sale_status.staff_ID = staff.staff_id";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
    public function sellerFunction()
    {
        $sql = "SELECT staff.staff_name, sale_status.frequent_sale, sale_status.least_frequent 
        FROM sale_status
        INNER JOIN inventory
        ON inventory.itemID = sale_status.invoice_ID INNER JOIN staff ON sale_status.staff_ID = staff.staff_id where sale_status.Ivoice_num = (SELECT max(Ivoice_num) from sale_status)";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
    public function seller2Function()
    {
        $sql = "SELECT staff.staff_name, sale_status.frequent_sale,sale_status.least_frequent 
        FROM sale_status
        INNER JOIN inventory
        ON inventory.itemID = sale_status.invoice_ID INNER JOIN staff ON sale_status.staff_ID = staff.staff_id where sale_status.Ivoice_num = (SELECT min(Ivoice_num) from sale_status)";
        $res = mysqli_query($this->link, $sql);
        if (mysqli_num_rows($res) > 0) {
            return $res;
        } else {
            return false;
        }
        # code...
    }
}
$obj = new stuff;
$objStuff = $obj->stuffFunction();
$objSeller = $obj->sellerFunction();
$objSeller2 = $obj->seller2Function();

$row = mysqli_fetch_assoc($objSeller);
$row2 = mysqli_fetch_assoc($objSeller2);


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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
</head>

<body style="background-color:#F1D26C">
    <?php include_once('layout/navbar.php'); ?>
    <div class="back_color p-2">


        <div class="container">
            <h1 class="text-center p-5" style="font-family: 'Passion One', cursive;">Presentation Page</h1>
            <div class="row bg-white shadow p-5">
                <div class="col-md-6">
                    <h5>Best Seller: <?php echo $row['staff_name']; ?></h5>
                    <h5>Least Seller: <?php echo $row2['staff_name']; ?></h5>
                </div>
                <div class="col-md-6">
                    <h5>Most Frequent Hour: <?php echo $row['frequent_sale']; ?></h5>
                    <h5>Least Frequent Hour: <?php echo $row2['least_frequent']; ?></h5>
                </div>
            </div>



        </div>
    </div>
    <?php include_once('layout/script.php'); ?>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>

</body>

</html>