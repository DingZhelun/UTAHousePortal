<?php
include('connect.php');

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$subdivision=$_POST['subdivision'];
$building=$_POST['building'];
$apartment=$_POST['apartment'];
$water=$_POST['water'];
$gas=$_POST['gas'];
$electricity=$_POST['electricity'];
$Internet=$_POST['Internet'];
$role = $_POST['role'];
$password = $_POST['password'];
$code = $_POST['code'];

//$name="ZhelunDing";
//$email="zxd8813@mavs.uta.edu";
//$phone="13126772577";
//$address="QingDao";
//$subdivision="May Flower";
////$building=$_POST['building'];
////$apartment=$_POST['apartment'];
//$water="water ";
//$gas="gas ";
//$electricity="electricity ";
////$Internet=$_POST['Internet'];
//$role = "Subdivision";
//$password = "123456";
//$code = 619205;

$water = $water=="water "? 1:0;
$gas = $gas=="gas "? 1:0;
$electricity = "electricity "? 1:0;
$Internet = "Internet "? 1:0;

$sql ="select token from Contacts where contact_email='$email'";
$result = $conn->query($sql);
$rows=$result->fetch_assoc();

if ($rows["token"]==$code){
    $sql ="UPDATE `zxc9069_youareondefault`.`Contacts` SET `available` = '1' WHERE (`contact_email` = '$email');";
    $conn->query($sql);

    switch ($role){
        case "Subdivision":
            $sql = "UPDATE `zxc9069_youareondefault`.`Subdivisions` 
                    SET `contact_email` = '$email',`available` = 0,`electricity` = '$electricity', `gas`='$gas',`water`='$water'
                    WHERE `subdivision_name`='$subdivision';";
            $conn->query($sql);
            echo 1;
            break;
        case "Building":
            $sql = "UPDATE `zxc9069_youareondefault`.`Buildings` 
                    SET `contact_email` = '$email',`available` = 0
                    WHERE (`building_number` = '$building' and `subdivision_id` in (select subdivision_id as name from Subdivisions where subdivision_name='$subdivision'));";
            $conn->query($sql);
            echo 2;
            break;
        case "Apartment":
            $sql = "UPDATE `zxc9069_youareondefault`.`Apartments` 
                    SET `contact_email` = '$email', `available` = '0', `electricity` = '$electricity', `water` = '$water', `gas` = '$water', `internet` = '$Internet' 
                    WHERE (`apartment_number` = '$apartment' and `building_id` in (select building_id from Buildings where building_number='$building' and subdivision_id in (select subdivision_id from Subdivisions where subdivision_name='$subdivision')) );";
            $conn->query($sql);
            echo 3;
            break;
    }

}else{
    echo 0;
}

