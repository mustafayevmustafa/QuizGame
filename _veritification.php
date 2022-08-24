<?php

require_once 'config.php';
require_once 'db.php';

if($_POST && $_SESSION){
    $code =  $_POST['code'];
    $email =  $_SESSION['email'];
    if(isset($code)){
        $query = "SELECT count(*) as say FROM veritifation WHERE email='{$email}' and code ={$code}";
        $result = mysqli_query($mysql,$query);
        $result = mysqli_fetch_assoc($result);
        if($result['say']>0){
            $query =  "UPDATE users SET status = 1 WHERE  email='{$email}'";
            $result = mysqli_query($mysql,$query);
            if($result){
                $query = "DELETE FROM veritifation WHERE email = '{$email}'";
                $result = mysqli_query($mysql,$query);
                if($result){
                    header("Location:index.php");
                }
            }
        }
//        print_r($result);
    }
}else{
    echo 'ERROR 404';
}
