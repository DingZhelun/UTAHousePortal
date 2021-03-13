<?php
session_start();
$user_email = $_SESSION['user_mail'];
include('connect.php');
$sql = "SELECT r.contact_email,r.report_time , a.apartment_id, a.building_id ,r.electricity, r.water, r.gas, r.internet FROM 
((Reports r INNER JOIN Apartments a on r.contact_email=a.contact_email) 
INNER JOIN Buildings b on a.building_id=b.building_id) INNER JOIN Subdivisions s on b.subdivision_id=s.subdivision_id
 WHERE s.contact_email='$user_email'; ";
$result = $conn->query($sql);
$res="<div class='building_board'>
<table class='apartment_board'>
<tr>
<th>building</th>
<th>apartment</th>
<th>contact email</th>
<th>report time</th>
<th>electricity</th>
<th>gas</th>
<th>water</th>
<th>Internet</th>
</tr>";
while($rows=$result->fetch_assoc()){
    $res=$res."<tr>
    <td>".$rows['building_id']."</td>
    <td>".$rows['apartment_id']."</td>
    <td>".$rows['contact_email']."</td>
    <td>".$rows['report_time']."</td>
    <td>".$rows['electricity']."</td>
    <td>".$rows['gas']."</td>
    <td>".$rows['water']."</td>
    <td>".$rows['internet']."</td>
    </tr>";
}
$res=$res."</table></div>";
echo $res;
?>