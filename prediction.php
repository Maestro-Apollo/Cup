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
        $sql = "SELECT staff.staff_name 
        FROM sale_status
        INNER JOIN inventory
        ON inventory.itemID = sale_status.invoice_ID INNER JOIN staff ON sale_status.staff_ID = staff.staff_id where inventory.Ivoice_num = (SELECT max(Ivoice_num) from inventory)";
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
        $sql = "SELECT staff.staff_name 
        FROM sale_status
        INNER JOIN inventory
        ON inventory.itemID = sale_status.invoice_ID INNER JOIN staff ON sale_status.staff_ID = staff.staff_id where inventory.Ivoice_num = (SELECT min(Ivoice_num) from inventory)";
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
            <h1 class="text-center p-5" style="font-family: 'Passion One', cursive;">Prediction Page</h1>
            <div class="bg-white p-5 shadow">
                <table id="example" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Item Type</th>
                            <th>Ivoice Num</th>
                            <th>Staff Name</th>
                            <th>Total Fees</th>
                            <th>Item Remain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($objStuff)) { ?>
                        <tr>
                            <td><?php echo $row['itemID']; ?></td>
                            <td><?php echo $row['itemName']; ?></td>
                            <td><?php echo $row['itemType']; ?></td>
                            <td><?php echo $row['Ivoice_num']; ?></td>
                            <td><?php echo $row['staff_name']; ?></td>
                            <td><?php echo $row['total_fees']; ?></td>
                            <td><?php echo $row['remain']; ?></td>
                        </tr>
                        <?php } ?>


                    </tbody>
                </table>

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