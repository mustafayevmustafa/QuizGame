<?php

include_once 'config.php';
include_once 'db.php';

if($_POST){
    $word_lang_1 = htmlspecialchars(strip_tags(trim($_POST['word_lang_1'])));
    $word_lang_2 = htmlspecialchars(strip_tags(trim($_POST['word_lang_2'])));


    if(isset($word_lang_1) && isset($word_lang_2) && strlen($word_lang_1)>0 && strlen($word_lang_2)>0){

        $user_id = $_COOKIE['user'];
        $query =  "SELECT COUNT(*) AS say FROM dictionary WHERE word_lang_1='{$word_lang_1}' AND word_lang_2='{$word_lang_2}' AND user_id={$user_id}";
        $result =  mysqli_query($mysql,$query);
        $result =  mysqli_fetch_assoc($result);


        if($result['say']<=0){

            $query = "INSERT INTO dictionary(word_lang_1,word_lang_2,user_id) VALUES('{$word_lang_1}','{$word_lang_2}',{$user_id})";
            $result =  mysqli_query($mysql, $query);

            if($result){
                header("Location:add.php?msg=Melumatlar elave olundu!");
            }else{
                header("Location:add.php?msg=Melumatlarin elave olunmasinda problem yasandi!");
            }
        }else{
            header("Location:add.php?msg=Daxil etdiyiniz soz artiq bazada var!");
        }

    }else{
        header("Location:add.php?msg=Melumatlari tam doldurun!");
    }

}else{
    echo "Error 404";
}