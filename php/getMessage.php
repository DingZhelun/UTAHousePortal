<?php
include('connect.php');
session_start();
$user_email = $_SESSION['user_mail'];
$sql="select * from Chats where to_contact_email='$user_email';";
$result = $conn->query($sql);
$res="<div class='building_board'>
<p>INBOX</p>
<table class='apartment_board'>
<tr>
<th>From</th>
<th>time</th>
<th>content</th>
</tr>";
while($rows=$result->fetch_assoc()){
    $res=$res."<tr>
    <td>".$rows['from_contact_email']."</td>
    <td>".$rows['time']."</td>
    <td>".$rows['chat_content']."</td>
    </tr>";
}
$sql="select * from Chats where from_contact_email='$user_email';";
$result = $conn->query($sql);
$res = $res."</table></div>
<div class='building_board'>
<p>OUTBOX</p>
<table class='apartment_board'>
<tr>
<th>To</th>
<th>time</th>
<th>content</th>
</tr>";
while($rows=$result->fetch_assoc()){
    $res=$res."<tr>
    <td>".$rows['to_contact_email']."</td>
    <td>".$rows['time']."</td>
    <td>".$rows['chat_content']."</td>
    </tr>";
}
$res = $res."</table></div>";
echo $res;
?>