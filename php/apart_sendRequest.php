<?php
session_start();
$user_email = $_SESSION['user_mail'];
include('connect.php');
$msg = $_POST['msg'];
$sql = "INSERT INTO Requests (request_content,contact_email) VALUES ('$msg','$user_email');";
$conn->query($sql)
?>