<?php
session_start();
$user_email = $_SESSION['user_mail'];
include('connect.php');
$sql = "SELECT * FROM Reports WHERE contact_email='$user_email';";
$result = $conn->query($sql);
$res="<div class='building_board'>
<table class='apartment_board'>
<tr>
<th>report time</th>
<th>electricity</th>
<th>gas</th>
<th>water</th>
<th>Internet</th>
</tr>";
while($rows=$result->fetch_assoc()){
    $res=$res."<tr>
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