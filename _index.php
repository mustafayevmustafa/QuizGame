<?php

//a@gmail.com' OR id = 1 -- a

require_once 'config.php';
require_once 'db.php';

if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(trim(isset($email)) && trim(isset($password))){
        $password =  sha1(md5($password));
        $query =  "SELECT id FROM users WHERE email='{$email}' AND password='{$password}' AND status=1";

        $result =  mysqli_query($mysql,$query);
        $result = mysqli_fetch_assoc($result);
        if($result){
          setcookie('user',$result['id'],time()+3600);
            header("Location:home.php");
        }else{
            header("Location:index.php?msg=Daxil olunan melumatlar dogru deyil!");
        }
    }
}else{
    echo 'ERROR 404';
}
