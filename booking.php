<?php
require_once 'C:\xampp\htdocs\extra/dbc.php';
require_once 'C:\xampp\htdocs\extra/functions.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Please select your time slot</title>
</head>
<body>
    <form method="post">
        <center>
            <h1>Please Select your Time slot</h1>
            <label for="">Time Slots</label>
            <select name="slot" id="">
                <option >---Time--</option>
                <option value="12:00am-3:00am">12:00am-3:00am</option>
                <option value="3:00am-6:00am">3:00am-6:00am</option>
                <option value="6:00am-9:00am">6:00am-9:00am</option>
                <option value="9:00am-12:00pm">9:00am-12:00pm</option>
                <option value="12:00pm-3:00pm">12:00pm-3:00pm</option>
                <option value="3:00pm-6:00pm">3:00pm-6:00pm</option>
                <option value="6:00pm-9:00pm">6:00pm-9:00pm</option>
                <option value="9:00pm-12:00pm">9:00pm-12:00pm</option>
            </select>
            <input type="submit" name="submit" value="Submit">
        </center>
    </form>

    <?php
        if(isset($_POST['submit'])){
            $date = $_GET["date"];
            if(!empty($_POST['slot'])) {
                // time_slot to save
                $selected = $_POST['slot'];

                // Update specific user's time_slot and booked_date columns
                $id = $_SESSION['user_id'];
                $query = "UPDATE users WHERE user_id = $id SET time_slot = $selected, booked_date = $date";
                $res = mysqli_query($conn, $query);
                if($res === TRUE) {
                    echo 'You successfully booked a slot for: ' . $selected . ' on ' . $date;
                }
            }
        }
    ?>

    <div><a href='index.php'class='btn btn-success btn-m'>Home</a></div>
</body>
</html>
