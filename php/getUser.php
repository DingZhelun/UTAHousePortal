<?php
session_start();
// $_SESSION['user_mail'] = "2@qq.com";
// unset($_SESSION['user_mail']);
$email;
if(isset($_SESSION['user_mail']))
{
    $email = $_SESSION['user_mail'];
    echo json_encode($email);
}
//$_SESSION['user_mail'] = "zxd8813@mavs.uta.edu";
// $_SESSION['user_mail'] = "admin";
else{
    echo 0;
}

// 
?>