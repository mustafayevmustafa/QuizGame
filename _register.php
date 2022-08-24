<?php
require_once 'config.php' ;
require_once 'db.php' ;

if($_POST){

    $fullname = trim(strip_tags($_POST['fullname']));
    $password = trim(strip_tags($_POST['password']));
    $email = trim(strip_tags($_POST['email']));
    $photo = $_FILES['photo'];

    if(strlen($fullname)<3 || strlen($password)<6 || strlen($email)<6){
        header("Location:register.php?msg=Gonderilen melumatlarda xeta var!!!");
        exit();
    }
    if($photo['type']!='image/png' && $photo['type']!='image/jpg' && $photo['type']!=""){
        header("Location:register.php?msg=JPG ve yaxud PNG formatinda sekiller yukleyin!!!");
        exit();
    }
    //photo upload
    if($photo['size']>0){
        $photoName = uniqid().'-'.uniqid().'.jpg';
        move_uploaded_file($photo['tmp_name'],"images/{$photoName}");
    }else{
        $photoName = 'user.jpg';
    }

    if(isset($photoName) && isset($fullname) && isset($password) && isset($email)){
        $password = sha1(md5($password));
        //user check
        $query = "SELECT count(*) as say FROM users WHERE email='{$email}'";
        $result = mysqli_query($mysql,$query);
       // $result = mysqli_fetch_array($result);
        $result = mysqli_fetch_assoc($result);
        //register success
        if($result['say']==0){
            $query = "INSERT INTO users(photo,fullname,password,email) VALUES('{$photoName}','{$fullname}', '{$password}', '{$email}')";
            $result =   mysqli_query($mysql, $query);
            //veritifaction
            if($result){
                $code = rand(1000,9999);
                $query = "INSERT INTO veritifation(email,code) VALUES('{$email}',{$code})";
                $result = mysqli_query($mysql,$query);
                $mail = mail($email,'Hesab Tesdiqi',"Hesabinizi tesdiqlemek ucun istifade edeceyiniz kod:{$code}", 'Quiz Game');

                if($result && $mail){
                    $_SESSION['email'] =  $email;
                    header('Location:veritification.php');
                }
            }
        }else{
            header("Location:register.php?msg=Bu email artiq istifade olunub");
        }
    }
}else{
    echo 'ERROR 404';
}
