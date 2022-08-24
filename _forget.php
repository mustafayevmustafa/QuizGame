<?php

require_once 'config.php' ;
require_once 'db.php' ;

if($_POST){
    $email =  $_POST['email'];
    if(isset($email)){
        $query = "SELECT count(*) as say FROM users WHERE email='{$email}' AND status=1";
        $result =  mysqli_query($mysql, $query);
        $result = mysqli_fetch_assoc($result);
        if($result['say']>0){
             $code  = 'reset-'.uniqid().'-'.uniqid().'-'.uniqid();
             $query = "INSERT INTO veritifation(email,code) VALUES('{$email}','{$code}')";
             $result = mysqli_query($mysql,$query);
             if($result){
                $mail =  mail($email,"Sifreni yenileme kod",
                    "Sifrenizi yenilemek ucun asagdaki linke daxil olun: http://quizgame.test/password-reset.php?code={$code}");
                if($mail){
                  echo "<h1 align='center'>Sifrenizi yenilemek ucun link email adresinize gonderildi. Xais edirik mail qutunuzu kontrol edin.</h1>";
                }
             }else{
                 header("Location:forget.php?msg=Sifreni yenilemek ucun link artiq size gonderilib. Mailinizi kontrol edin!");
             }
        }else{
            header("Location:forget.php?msg=Bele bir email movcud deyil!");
        }
    }
}else{
    echo 'ERROR 404';
}
