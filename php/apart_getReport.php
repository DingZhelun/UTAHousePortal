<?php
session_start();
$user_email = $_SESSION['user_mail'];
include('connect.php');
$sql = "SELECT * FROM `Reports` WHERE contact_email=$user_email;";
$result = $conn->query($sql);
$res="";
while($rows=$result->fetch_assoc()){
    
}
?>