<?php
include('connect.php');
session_start();
$user_email = $_SESSION['user_mail'];
$sql="SELECT subdivision_name, subdivision_add, s.contact_email AS s_contact_email, building_number, building_add, ifnull(b.contact_email,'null') AS b_contact_email 
FROM (Apartments a INNER JOIN Buildings b ON a.building_id=b.building_id) INNER JOIN Subdivisions s on b.subdivision_id = s.subdivision_id 
WHERE a.contact_email='$user_email';";
$result = $conn->query($sql);
$res="";
while($rows=$result->fetch_assoc()){
    $res = $res."<div class='building_board'>
    <table class='apartment_board'>
    <tr>
    <th>subdivision name</th>
    <th>subdivision address</th>
    <th>contact email</th>
    <th>chat</th>
    </tr>
    <tr>
        <td>".$rows['subdivision_name']."</td>
        <td>".$rows['subdivision_add']."</td>
        <td>".$rows['s_contact_email']."</td>
        <td><a href=''>Click here</a></td>
        </tr>
    </table>
    <table class='apartment_board'>
        <tr>
        <th>building number</th>
        <th>building address</th>
        <th>contact email</th>
        <th>chat</th>
        </tr>
        <tr>
        <td>".$rows['building_number']."</td>
        <td>".$rows['building_add']."</td>
        <td>".$rows['b_contact_email']."</td>
        <td><a href=''>Click here</a></td>
        </tr>
    </table>
    </div>";
}
echo $res;

?>