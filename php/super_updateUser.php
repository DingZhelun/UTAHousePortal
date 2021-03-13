<?php
include('connect.php');
$email=$_POST['email'];
$name=$_POST['name'];
$tel=$_POST['tel'];
$password=$_POST['password'];
$role=$_POST['role'];
$sql = "UPDATE Contacts SET contact_name='$name', contact_tel='$tel', password='$password', role='$role' WHERE contact_email='$email';";
$result = $conn->query($sql);
?>