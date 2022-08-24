<?php

include_once "loginControl.php";
include_once "config.php";


if($_POST){
    $word =  $_POST['word'];
    if(isset($word)){
        $my_words  = $_SESSION['my_quiz'];
        $quiz =$my_words['quiz'];
        $success = $my_words['success'];
        if($word==$success){
            $mesaj = "tip=1&quiz={$quiz}&success={$success}";
        }else{
            $mesaj = "tip=0&quiz={$quiz}&success={$success}";
        }
        header("Location:game.php?{$mesaj}");
    }
}else{
    echo 'ERROR 404';
}
