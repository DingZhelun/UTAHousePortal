<?php
include('connect.php');
session_start();
$user_email = $_SESSION['user_mail'];
$sql = "select apartment_number, a.ele_count, a.gas_count, a.water_count
from Apartments a INNER JOIN Buildings b on a.building_id=b.building_id
where b.contact_email='$user_email';";
$result = $conn->query($sql);
$building;
$ele;
$gas;
$water;
while($rows=$result->fetch_assoc()){
    $building[]=$rows['apartment_number'];
    $ele[] = $rows['ele_count'];
    $gas[] = $rows['gas_count'];
    $water[] = $rows['water_count'];
}
$res = array($building,$ele,$gas,$water);
echo json_encode($res);
?>