<?php
include('connect.php');
session_start();
$user_email = $_SESSION['user_mail'];
$sql="select subdivision_name, subdivision_add, s.contact_email, building_id 
from Buildings b inner join Subdivisions s 
on b.subdivision_id=s.subdivision_id where b.contact_email='$user_email';";
$result = $conn->query($sql);
$res="";
$building;
while($rows=$result->fetch_assoc()){
    $building=$rows['building_id'];
    $res = $res."<div class='building_board'>
    <p>Subdivision Contacts</p>
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
        <td>".$rows['contact_email']."</td>
        <td><a href='SendMessage.html' onclick=\"setTo('".$rows['contact_email']."')\">Click here</a></td>
        </tr>
    </table>
    </div>";
}
$sql = "SELECT apartment_number, ifnull(c.contact_email, 'null') as 'contact_email', contact_name,contact_tel , ele_count, water_count, gas_count, int_count FROM Apartments a LEFT OUTER JOIN Contacts c on a.contact_email = c.contact_email WHERE building_id='$building';";
$sub_result = $conn->query($sql);
$res = $res."<div class='building_board'>
    <p>Apartments</p>
    <table class='apartment_board'>
    <tr>
    <th>apartment_number</th>
    <th>contact</th>
    <th>tel</th>
    <th>electricity</th>
    <th>water</th>
    <th>gas</th>
    <th>chat</th>
    </tr>";
while($sub_rows=$sub_result->fetch_assoc()){
    $c_email=$sub_rows['contact_email'];
    if($c_email=="null"){
        $res = $res."<tr>
        <td>".$sub_rows['apartment_number']."</td>
        <td>null</td>
        <td>null</td>
        <td>".$sub_rows['ele_count']."</td>
        <td>".$sub_rows['water_count']."</td>
        <td>".$sub_rows['gas_count']."</td>
        <td>null</td>
    </tr>";
    }
    else{
        $res = $res."<tr>
    <td>".$sub_rows['apartment_number']."</td>
    <td>".$sub_rows['contact_email']."</td>
    <td>".$sub_rows['contact_tel']."</td>
    <td>".$sub_rows['ele_count']."</td>
    <td>".$sub_rows['water_count']."</td>
    <td>".$sub_rows['gas_count']."</td>
    <td><a href='SendMessage.html' onclick=\"setTo('".$c_email."')\">Click here</a></td>
</tr>";
    }
    
}
$res = $res."</table></div>";
echo $res;


?>