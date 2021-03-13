<?php
include('connect.php');
$user = $_POST['user'];
$sql="delete from Contacts where contact_email='$user';";
$conn->query($sql);
?>