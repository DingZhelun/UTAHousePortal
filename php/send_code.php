<?php
include_once("connect.php");//连接数据库
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$role = $_POST['role'];
$password = $_POST['password'];

//$name = "zhelunding";
//$email = "zxd8813@mavs.uta.edu";

$sendmail = '1026130346@qq.com';
$sendmailpswd = "rizuvesdkiqkbbjg";
$send_name = 'Verification Code';
$toemail = $email;
$to_name = $name;
$mail = new PHPMailer();
$mail->isSMTP();
$mail->CharSet = "utf8";
$mail->Host = "smtp.qq.com";
$mail->SMTPAuth = true;
$mail->Username = $sendmail;
$mail->Password = $sendmailpswd;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->setFrom($sendmail, $send_name);
$mail->addAddress($toemail, $to_name);
$mail->Subject = "Verification Code";
$code=rand(100000,999999);
$mail->Body = "Your verification code is: $code, if not your own operation does not need to operate！";

if (!$mail->send()) { // 发送邮件
    echo "Message could not be sent.";
    echo "Mailer Error: " . $mail->ErrorInfo;// 输出错误信息
} else {
    $sql = "select * from Contacts where contact_email='$email';";

    $result = $conn->query($sql);
    $rows=$result->fetch_assoc();

    if ($result->num_rows==0){
        $sql ="INSERT INTO `zxc9069_youareondefault`.`Contacts` (`contact_email`, `contact_name`, `contact_tel`, `password`, `role`, `address`, `available`, `token`) VALUES ('$email', '$name', '$phone', '$password', '$role', '$address', '0', '$code');";
        $conn->query($sql);
    }else if ($rows.available==0){
        $sql="UPDATE `zxc9069_youareondefault`.`Contacts` SET `contact_name` = '$name', `contact_tel` = '$phone', `password` = '$password', `role` = '$role', `address` = '$address', `available` = '0', `token` = '$code' WHERE (`contact_email` = '$email');";
        $conn->query($sql);
    }

}