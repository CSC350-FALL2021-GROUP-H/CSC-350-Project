<?php
require_once 'C:\xampp\htdocs\extra\functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
</head>
<body>
    <section class="signup_form">
        <h2>Sign Up</h2>
        <form action="extra\signup-function.php" method="POST">
            <input type="text" name="user_name" placeholder="User Name">
            <input type="password" name="pw" placeholder="Password">
            <input type="password" name="cpw" placeholder="Confirm Password">
            <input type="text" name="apt_num" placeholder="Apartment Number">
            <button type="submit" name="submit">Sign Up</button>
            <a href="login.php">Already have an account? Log in</a>
        </form>
    </section>
</body>
</html>