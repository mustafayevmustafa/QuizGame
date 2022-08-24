<?php


require_once 'config.php';
require_once 'db.php';

if ($_GET) {
    $code = $_GET['code'];
    if (isset($code)) {
        $query = "SELECT email FROM veritifation WHERE code='{$code}' AND status=1";
        $result = mysqli_query($mysql, $query);
        $result = mysqli_fetch_assoc($result);
        $email = $result['email'];
        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
        if (isset($email)) {
            echo "
            <form action='_password-reset.php' method='post' align='center'>
            <h1>New Password</h1>
                <input type='hidden' name='email' value = '{$email}' required><br><br>
                <input type='hidden' name='code' value = '{$code}' required><br><br>
                <input type='password' name='password' placeholder='Password' required minlength='8'><br><br>
                <input type='password' name='confirm' placeholder='Confirm Password' required minlength='8'><br><br>
                <button type='submit'>Reset</button>
                <h3>{$msg}</h3>
        </form><br>";
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }
} else {
    echo "ERROR 404";
}
