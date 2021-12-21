<?php

function invaild_username($user_name){
    $result;

    if(!preg_match("/^[a-z,A-Z,0-9]*$/", $user_name)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}
function invaild_pwmatch($pw,$cpw){

    $result;

    if( $pw != $cpw){

        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}
function invaild_apartment($apt_num){

    $result;

    if(!preg_match("/^[0-9]*$/", $apt_num)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}

function emptysignup($user_name,$pw,$cpw,$apt_num ){
   $result;
    if(empty($user_name) || empty($pw) ||empty($cpw) || empty($apt_num)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}

function username_exist($conn,$user_name){
    $sql = "SELECT * FROM users WHERE user_name = $user_name";
    if ($match > 0){
      echo "User name already taken";
    }
}
function createuser($conn, $user_name ,$pw, $apt_num){
    $sql = "INSERT INTO users (user_name,pw,apt_num) VALUES ('".$user_name."','".$pw."','".$apt_num."')";
    $result = mysqli_query($connect,$sql);
	  $connect->close();
    header("Location: login.php");

    $hashedpw = password_hash($pw, PASSWORD_DEFAULT);

    mysqli_smth_bind_param($smth, "sss" , $user_name ,$hashedpw, $apt_num);
    mysqli_smth_execute($smth);
    mysqli_smth_close($smth);
        exit();}

function emptylogin($user_name,$pw,$apt_num ){

    $result ;

      if(empty($user_name) || empty($pw) || empty($apt_num)){

          $result = true;
      }
      else{
          $result = false;
      }
      return $result;

  }
function loginuser($conn,$user_name,$pw,){

    $user_exist = username_exist($conn,$user_name,$pw);

    $pwhashed = $user_exist["pw"];

    $checkpw = password_verify($pw, $pwhashed);

    if($checkpw === false){
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if($checkpw === true){
        session_start();
        $_SESSION["user_id"] = $user_exist["user_id"];
        $_SESSION["user_name"] = $user_exist["user_name"];
        header("location: ../index.php");
        exit();

    }
}
function build_calendar($month,$year){
    $daysofweek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');

    $firstdayofmonth = mktime(0,0,0,$month,1,$year);

    $num_days = date('t',$firstdayofmonth);

    $datecomp = getdate($firstdayofmonth);

    $month_name = $datecomp['month'];

    $daysofweek = $datecomp['wday'];

    $datetoday = date('m-d-Y');

    $calendar="<table class ='table table-bordered'>";
    $calendar.= "<center><h2>$month_name $year</h2></center>";



    $calendar.= "<tr>";

    foreach($daysofweek as $day){
        $calendar.="<th class='header'>$day</th>";
        }

    $calendar.= "</tr><tr>";

    if($daysofweek > 0){
        for($k = 0; $k < $daysofweek; $k++){
            $calendar.="<td></td>";
        }
    }

    $curr_day = $day;

    $month = str_pad($month,2,"0",STR_PAD_LEFT);

    while($curr_day <= $num_days){

        if($daysofweek == 7){
            $daysofweek =0;
            $calendar.="</tr><tr>";
        }
        $curr_dayrel = str_pad($curr_day,2,"0",STR_PAD_LEFT);
        $date = "$month-$curr_dayrel-$year";
        $day_name = strtolower(date('l',strtotime($date)));
        $event_num =0;
        $today = $date = date('m-d-Y')? "today" : "";
        if($date<date('m-d-Y')){
            $calendar.="<td><h4>$curr_day</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        }else{
            $calendar.="<td class='$today'><h4>$curr_day</h4> <a href='booking.php?date=".$date."'class='btn btn-success btn-s'>Select time</a";
        }

        $calendar.="<td><h4>$curr_day</h4>";

        $calendar.="</td>";

        $curr_day++;
        $daysofweek++;
    }

    if($daysofweek != 7){
        $remaining_days = 7 - $daysofweek;

        for($i=0;$i<$remaining_days;$i++){
            $calendar.= "<td></td>";
        }
    }

    $calendar.="</tr>";
    $calendar.="</table>";

    echo $calendar;



}
function check_login($conn)
{

    if(isset($_SESSION['user_id'])){

        $id = $_SESSION['user_id'];
        $query = "select * from user where user_id = '$id' limit 1";

        $res = mysqli_query($conn, $query);

        if($res && mysqli_num_rows($res) > 0){

            $user_data = mysqli_fetch_assoc($res);

            return $user_data;
        }
    }
}

function time_slot($conn){
    if(isset($_POST['submit']))
    {
        $time = $_POST['time_slot'];
        $sql = $conn -> prepare("INSERT into users (time_slot)
        values (:time)");
        $conn->begintransaction();
        $sql->execute(array(':time' =>$time));
        echo "<h2>Time slot saved successfully</h2>";
        $conn->commit();


    }
    header("location: ../index.php");
    //$conn -> null;
}
function check_time($conn){
    $sql = "SELECT * FROM users;";
    $results = mysqli_query($conn, $sql);
    $rescheck = mysqli_num_rows($results);
    if($rescheck > 0){
        while($row = mysqli_fetch_assoc($results)){
            echo $row['time_slot'];
        }
    }else{
        echo "<h4>You can book your slot below</h4>";

    }

}
