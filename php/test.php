<?php
include('connect.php');
session_start();
$user_email = $_SESSION['user_mail'];
$sql = "select building_id, building_number, building_add, IFNULL(b.contact_email,'null') as 'contact_email', contact_name, contact_tel
        from (Subdivisions s INNER JOIN Buildings b on s.subdivision_id=b.subdivision_id)
        LEFT OUTER JOIN Contacts c on b.contact_email=c.contact_email
        WHERE s.contact_email = '$user_email'
        order by building_number;";
$result = $conn->query($sql);
$res="";
while($rows=$result->fetch_assoc()){
    echo $rows['contact_email'];
  if($rows['contact_email']=="null"){
      echo 1;
  }
  else{
      echo 2;
  }
}
?>