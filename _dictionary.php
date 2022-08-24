<?php
include_once "loginControl.php";
include_once "config.php";
include_once "db.php";

$user_id =  $_COOKIE['user'];

$dictionaryList =  [];
$query  = "SELECT id,word_lang_1,word_lang_2 FROM dictionary WHERE user_id ={$user_id}";
$result = mysqli_query($mysql, $query);

while ($response = mysqli_fetch_assoc($result))
{
    array_push($dictionaryList,$response);
}


