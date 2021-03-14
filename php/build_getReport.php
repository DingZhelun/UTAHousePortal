<?php
session_start();
$user_email = $_SESSION['user_mail'];
include('connect.php');
$sql = "SELECT apartment_number, r.contact_email, report_time, r.water, r.gas, r.electricity, r.internet
 FROM (Reports r inner join Apartments a 
on r.contact_email=a.contact_email) inner join Buildings b 
on a.building_id=b.building_id WHERE b.contact_email='$user_email';";
$result = $conn->query($sql);
$res="<div class='building_board'>
<p>Reports</p>
<table class='apartment_board'>
<tr>
<th>apartment</th>
<th>contact</th>
<th>report time</th>
<th>electricity</th>
<th>gas</th>
<th>water</th>
<th>Internet</th>
</tr>";
while($rows=$result->fetch_assoc()){
    $res=$res."<tr>
    <td>".$rows['apartment_number']."</td>
    <td>".$rows['contact_email']."</td>
    <td>".$rows['report_time']."</td>
    <td>".$rows['electricity']."</td>
    <td>".$rows['gas']."</td>
    <td>".$rows['water']."</td>
    <td>".$rows['internet']."</td>
    </tr>";
}
$res=$res."</table></div>";

$sql = "SELECT apartment_number, r.contact_email, request_time, request_content
 FROM (Requests r inner join Apartments a 
on r.contact_email=a.contact_email) inner join Buildings b 
on a.building_id=b.building_id WHERE b.contact_email='$user_email';";
$result = $conn->query($sql);
$res=$res."<div class='building_board'>
<p>Requests</p>
<table class='apartment_board'>
<tr>
<th>apartment</th>
<th>contact</th>
<th>request time</th>
<th>content</th>
</tr>";
while($rows=$result->fetch_assoc()){
    $res=$res."<tr>
    <td>".$rows['apartment_number']."</td>
    <td>".$rows['contact_email']."</td>
    <td>".$rows['request_time']."</td>
    <td>".$rows['request_content']."</td>
    </tr>";
}
$res=$res."</table></div>";
echo $res;
?>