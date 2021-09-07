<?php
session_start();
require_once('class/database.php');
class stuff extends database
{
    public function stuffFunction()
    {
        $sql = "SELECT * from staff";
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
            <h1 class="text-center p-5" style="font-family: 'Passion One', cursive;">Stuff Page</h1>
            <div class="bg-white p-5 shadow">
                <table id="example" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Staff Id</th>
                            <th>Job Type</th>
                            <th>Staff Name</th>
                            <th>Branch</th>
                            <th>Staff Nationality</th>
                            <th>Credit Hour</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($objStuff)) { ?>
                        <tr>
                            <td><?php echo $row['staff_id']; ?></td>
                            <td><?php echo $row['job_type']; ?></td>
                            <td><?php echo $row['staff_name']; ?></td>
                            <td><?php echo $row['branch']; ?></td>
                            <td><?php echo $row['staff_nationality']; ?></td>
                            <td><?php echo $row['credit_hour']; ?></td>
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