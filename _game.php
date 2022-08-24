<?php

include_once "loginControl.php";
include_once "config.php";
include_once "db.php";

//session_destroy();

if (!isset($_SESSION['word_count'])) {
    $user_id = $_COOKIE['user'];

    $my_words = [];

    $query = "SELECT  id  FROM dictionary WHERE user_id={$user_id}";
    $result = mysqli_query($mysql, $query);

    while ($my_word = mysqli_fetch_assoc($result)) array_push($my_words, $my_word['id']);

    $_SESSION['my_words'] = $my_words;

}

$index = [rand(1, count($_SESSION['my_words'])-1)];

$word_id = $_SESSION['my_words'][$index[0]];

$query =  "SELECT word_lang_1,word_lang_2 FROM dictionary WHERE id={$word_id}";
$result = mysqli_query($mysql,$query);
$result =  mysqli_fetch_assoc($result);
$my_quiz = [];

$my_quiz['quiz'] = $result['word_lang_1'];
$my_quiz['success'] = $result['word_lang_2'];

$my_quiz['variant'] = [$my_quiz['success']];

for ($i=0;$i<3;$i++){
    do{
        $fake_index = rand(1, count($_SESSION['my_words'])-1);
    }while(in_array($fake_index, $index));

    array_push($index,$fake_index);
}

for ($i=1;$i<count($index);$i++){
    $word_id = $_SESSION['my_words'][$index[$i]];

    $query =  "SELECT word_lang_2 FROM dictionary WHERE id={$word_id}";
    $result = mysqli_query($mysql,$query);
    $result =  mysqli_fetch_assoc($result);
    array_push($my_quiz['variant'] ,$result['word_lang_2']);
}

shuffle($my_quiz['variant']);


$_SESSION['my_quiz'] = $my_quiz;

