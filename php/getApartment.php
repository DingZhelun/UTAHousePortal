<?php
include('connect.php');

//$building_number = $_POST['$building_number'];
$subdivision = $_POST['subdivision'];
//$subdivision = "BaoLi";
$building_number = $_POST['building_number'];

$sql="select apartment_number
    from Subdivisions,Buildings,Apartments
    where Subdivisions.subdivision_name='$subdivision'
    and Subdivisions.subdivision_id = Buildings.subdivision_id 
    and Apartments.building_id = Buildings.building_id 
    and Apartments.available=1 
    and Buildings.building_number='$building_number';";

$result = $conn->query($sql);
$arr = array();

while($rows=$result->fetch_assoc()){
    $arr[] = $rows;
}
echo json_encode($arr);