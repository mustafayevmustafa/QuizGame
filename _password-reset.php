<?php

require_once 'config.php';
require_once 'db.php';

if($_POST){
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $confirm =  $_POST['confirm'];
    $code =  $_POST['code'];
    if(isset($email) && isset($password) && isset($confirm) && isset($code)){
        if($password===$confirm){
            $password =  sha1(md5($password));
            $query =  "UPDATE  users SET password = '{$password}' WHERE email='{$email}'";
            $result = mysqli_query($mysql,$query);
            if($result){
                header("Location:index.php?msg=Sifreniz ugurla deyisdi!");
            }

        }else{
            header("Location:password-reset.php?code={$code}&msg=Parollar bir-birine uygun deyil!");
        }
    }else{
        header("Location:password-reset.php?code={$code}&msg=Melumatlari tam daxil edin!");
    }
}else{
    echo 'ERROR 404';
}