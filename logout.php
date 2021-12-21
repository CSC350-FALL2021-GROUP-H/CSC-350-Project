<?php
require_once 'C:\xampp\htdocs\extra\dbc.php';
require_once 'C:\xampp\htdocs\extra\functions.php';

session_start();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

header("Location: ..\login.php");
