<?php
include('connect.php');

$subdivision = $_POST['subdivision'];
$role = $_POST['role'];


switch ($role){
    case "Subdivision":
        $sql = "select available
                from Subdivisions
                where subdivision_name = '$subdivision';";
        break;
    case "Building":
        $sql = "select building_number
                from Subdivisions , Buildings
                where subdivision_name='$subdivision' and Subdivisions.subdivision_id = Buildings.subdivision_id and Buildings.available=1;";
        break;
    case "Apartment":
        $sql = "select building_number
            from Subdivisions , Buildings
            where subdivision_name='$subdivision' and Subdivisions.subdivision_id = Buildings.subdivision_id;";
        break;
}
$result = $conn->query($sql);
$arr = array();

while($rows=$result->fetch_assoc()){
    $arr[] = $rows;
}

echo json_encode($arr);