<?php
include('connect.php');
$sql = "select * from Contacts";
$result = $conn->query($sql);
$res="<div class='building_board'>
<table class='apartment_board'>
<tr>
<th>email</th>
<th>name</th>
<th>tel</th>
<th>password</th>
<th>role</th>
<th>option</th>
</tr>";
while($rows=$result->fetch_assoc()){
    $email = $rows['contact_email'];
    $res=$res."<tr>
    <td>".$rows['contact_email']."</td>
    <td>".$rows['contact_name']."</td>
    <td>".$rows['contact_tel']."</td>
    <td>".$rows['password']."</td>
    <td>".$rows['role']."</td>
    <td>
    <a href='Superuser_modify.html' onclick=\"modifyUser('".$email."')\">modify</a>
    <a href='#' onclick=\"deleteUser('".$email."')\">delete</a>
    </td>
    </tr>";
}
$res=$res."</table></div>";
echo $res;
?>