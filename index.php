<?php

require_once 'C:\xampp\htdocs\extra\dbc.php';
require_once 'C:\xampp\htdocs\extra\functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Welcome Tenants to the Laundry System</title>
    <style>
        table{
            table-layout: fixed;
        }
        td{
            width: 35%;
         }
        .today{
            background-color: offwhite;
        }

    </style>
</head>
<body>
    <?php $sql = "SELECT * FROM users;";
    $results = mysqli_query($conn, $sql);
    $rescheck = mysqli_num_rows($results);
    if($rescheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo $row['time_slot'];
        }
    }else{
        echo "<h4>You don't have a time slot, You can book one here</h4>";
    }?>
    <center><h3>Welcome Tenant from Apartment:
    <?php $sql = "SELECT * FROM users;";$results = mysqli_query($conn, $sql);
    $rescheck = mysqli_num_rows($results);
    if($rescheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo $row['apt_num'];
        }

    }

    ?> </h3></center>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $datecomp = getdate();
                $month = $datecomp['mon'];
                $year = $datecomp['year'];
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
    <a href='logout.php'class='btn btn-danger btn-s'>Log Out</a>

</body>
</html>
