<?php
include('connect.php');
session_start();
$user_email = $_SESSION['user_mail'];
$to=$_POST['to'];
$msg=$_POST['msg'];

$sql="Insert into Chats (from_contact_email,to_contact_email,chat_content) values ('$user_email','$to','$msg');";
$result = $conn->query($sql);
?>