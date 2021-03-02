<?php
include('connect.php');

$subdivision = $_POST['subdivision'];
$building_available = $_POST['building_available'];

//$subdivision = "BaoLi";
//$building_available = 1;
if ($building_available==1) {
    $sql = "select building_number
        from Subdivisions , Buildings
        where subdivision_name='$subdivision' and Subdivisions.subdivision_id = Buildings.subdivision_id and Buildings.available=1;";
}else{
    $sql = "select building_number
        from Subdivisions , Buildings
        where subdivision_name='$subdivision' and Subdivisions.subdivision_id = Buildings.subdivision_id;";
}
$result = $conn->query($sql);
$arr = array();

while($rows=$result->fetch_assoc()){
    $arr[] = $rows;
}

echo json_encode($arr);