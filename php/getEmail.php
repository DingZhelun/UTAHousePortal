<?php
include('connect.php');

$email = $_POST['email'];

$sql = "select * from Contacts where contact_email='$email';";

$result = $conn->query($sql);
$arr = array();

while($rows=$result->fetch_assoc()){
    $arr[] = $rows;
}

echo json_encode($arr);
