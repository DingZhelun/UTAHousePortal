<?php
session_start();
$_SESSION['user_mail'] = "123@qq.com";
$email = $_SESSION['user_mail'];
echo "var name ="."'$email';";
// echo json_encode($email);
?>