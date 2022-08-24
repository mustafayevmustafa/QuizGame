<?php

session_start();

$page = $_SERVER['REQUEST_URI'];
$flag = '/';


switch ($page) {
    case "{$flag}veritification.php" :
    {
        if (!isset($_SESSION['email'])) header('Location:register.php');

    }
    case "{$flag}index.php" :

    case "{$flag}" :
    {
        if (isset($_COOKIE['user'])) header('Location:home.php');
    }
}