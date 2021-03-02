<?php
include('connect.php');

$subdivision = $_POST['subdivision'];

$sql = "select electricity,water,gas
        from Subdivisions
        where subdivision_name='$subdivision';";

$result = $conn->query($sql);
$arr = array();

while($rows=$result->fetch_assoc()){
    $arr[] = $rows;
}
echo json_encode($arr);