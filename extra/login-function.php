<?php

if(isset($_POST['submit'])){

    $user_name = $_POST["user_name"];
    $pw = $_POST["pw"];
    $apt_num = $_POST["apt_num"];
    $query = "SELECT * from users where user_name = '$user_name' AND pw = '$pw' AND apt_num = '$apt_num";

              $res = mysqli_query($conn, $query);

              if($res === TRUE) {
                  session_start();
                  echo 'Login Complete!';
                  header ("C:\xampp\htdocs\index.php");
              }
              else{
               echo "Not complete"; }
}

?>
