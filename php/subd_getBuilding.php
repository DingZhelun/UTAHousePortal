<?php
include('connect.php');
session_start();
$user_email = $_SESSION['user_mail'];
$sql = "select building_id, building_number, building_add, b.contact_email, contact_name, contact_tel
        from (Subdivisions s INNER JOIN Buildings b on s.subdivision_id=b.subdivision_id)
        LEFT OUTER JOIN Contacts c on b.contact_email=c.contact_email
        WHERE s.contact_email = '$user_email'
        order by building_number;";
$result = $conn->query($sql);
$res="";
while($rows=$result->fetch_assoc()){
  $res = $res."<div class='building_board'><div>
  <p class='type_info'>building number:</p> <p class='info'>".$rows['building_number']."</p>
  <p class='type_info'>address:</p><p class='info'>".$rows['building_add']."</p>
  <p class='type_info'>responsible contact:</p><p class='info'>".$rows['contact_email']."</p>
  <p class='type_info'>tel:</p><p class='info'>".$rows['contact_tel']."</p>
  <p class='type_info'>chat:</p><p class='info'><a href='SendMessage.html' onclick=\"setTo('".$rows['contact_email']."')\">click here</a></p></div>
  <p class='apartment_text'> apartments </p>
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
  $building = $rows['building_id'];
  $sql = "SELECT apartment_number, c.contact_email, contact_name,contact_tel , ele_count, water_count, gas_count, int_count FROM Apartments a LEFT OUTER JOIN Contacts c on a.contact_email = c.contact_email WHERE building_id='$building';";
  $sub_result = $conn->query($sql);
  while($sub_rows=$sub_result->fetch_assoc()){
    $c_email=$sub_rows['contact_email'];
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
  $res = $res."</table></div>";
}
echo $res;
?>