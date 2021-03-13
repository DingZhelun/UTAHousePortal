<?php
session_start();
// $_SESSION['user_mail'] = "123@qq.com";
//$_SESSION['user_mail'] = "zxd8813@mavs.uta.edu";
// $_SESSION['user_mail'] = "admin";
$email = $_SESSION['user_mail'];
echo "var name ="."'$email';";
// echo json_encode($email);
?>