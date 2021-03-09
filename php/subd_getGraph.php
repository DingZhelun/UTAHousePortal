<?php
include('connect.php');
session_start();
// $user_email = $_SESSION['user_mail'];
$user_email ="zxd8813@mavs.uta.edu";
$sql = "select building_number, ele_count, gas_count, water_count
from Subdivisions s INNER JOIN Buildings b on s.subdivision_id=b.subdivision_id
where s.contact_email='$user_email';";
$result = $conn->query($sql);
$building;
$ele;
$gas;
$water;
while($rows=$result->fetch_assoc()){
    $building[]=$rows['building_number'];
    $ele[] = $rows['ele_count'];
    $gas[] = $rows['gas_count'];
    $water[] = $rows['water_count'];
}
$res = array($building,$ele,$gas,$water);
echo json_encode($res);
?>