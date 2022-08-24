<?php
include_once "config.php";
include_once "db.php";

$id = $_COOKIE["user"];

$query = "SELECT email,fullname,photo,status  FROM users WHERE id={$id} AND status=1";
$result = mysqli_query($mysql, $query);
$result = mysqli_fetch_assoc($result);

if(!$result) header("Location:logout.php");
else $userInfo = $result;