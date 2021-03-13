<?php
session_start();
include('connect.php');
$user = $_SESSION['modify'];
$sql = "select * from Contacts where contact_email='$user';";
$result = $conn->query($sql);
$res;
while($rows=$result->fetch_assoc()){
    $res = $rows;
}
echo json_encode($res);
?>