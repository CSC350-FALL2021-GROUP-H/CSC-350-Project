<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <section class="signup_form">
        <form method="post">
            <h2>Login</h2>
            <input type="text" name="user_name" placeholder="User Name">
            <input type="password" name="pw" placeholder="Password">
            <input type="text" name="apt_num" placeholder="Apartment Number">
            <button type="submit" name="submit">Log In</button>

            <a href="signup.php">Don't have an account? Sign up</a>
        </form>
        
        <?php
            if(isset($_POST['submit'])){
                $user_name = $_POST["user_name"];
                $pw = $_POST["pw"];
                $apt_num = $_POST["apt_num"];

                require_once 'C:\xampp\htdocs\extra\dbc.php';

                $query = 'SELECT * from users where user_name = $user_name AND pw = $pw AND apt_num = $apt_num';

                $res = mysqli_query($conn, $query);

                if($res === TRUE) {
                    session_start();
                    echo 'Login Complete!';
                    header("location: ../index.php");
                } else {
                    header("location: ../login.php?error=loginfail");
                }
            }
        ?>
    </section>
</body>
</html>
