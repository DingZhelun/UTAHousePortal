<?php
session_start();
// $_SESSION['to']="41@qq.com";
$to = $_SESSION['to'];
echo json_encode($to);
?>