<?php

if (isset($_POST['submit'])) {
$user_name = $_POST['user_name'];
$pw = $_POST['pw'];
$cpw = $_POST['cpw'];
$apt_num = $_POST['apt_num'];

$sql = "INSERT INTO users (user_name,pw,cpw,apt_num) VALUES ('".$user_name."','".$pw."','".$cpw."','".$apt_num."')";
header("Location: ..\login.php");
echo "Your account has been created";
      }
    elseif(username_exist($conn,$user_name) == true){
        echo "Username already taken";
        exit();
    }

else {
     echo "cannot complete signup";
}
