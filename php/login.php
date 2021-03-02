<?PHP
header("Content-Type: text/html; charset=utf8");
if(!isset($_POST["submit"])){
    exit("错误执行");
}
include('connect.php');
$email = $_POST['email'];
$passowrd = $_POST['password'];

$sql = "select * from Contacts where contact_email = '$email' and password='$passowrd'";
$result = $conn->query($sql);
$rows=$result->fetch_assoc();
if($rows){
    $_SESSION['email'] = $rows['contact_email'];
    $_SESSION['name'] = $rows['contact_name'];
    $_SESSION['tel'] = $rows['contact_tel'];
    $_SESSION['role'] = $rows['role'];
    $_SESSION['address'] = $rows['address'];

    if ($rows['role']=="Subdivision"){
        echo "
    <script>
        alert('login success,Subdivision');
    </script>";
    }else if ($rows['role']=="Building"){
        echo "
    <script>
        alert('login success,Building');
    </script>";
    }else if ($rows['role']=="Apartment"){
        echo "
    <script>
        alert('login success,Apartment');
    </script>";
    }else if ($rows['role']=="SuperAdmin"){
        echo "
    <script>
        alert('login success,SuperAdmin');
    </script>";
    }


    exit;
}else{
    echo "
    <script>
        alert('password or email error');
    </script>";
}

$conn->close();//关闭数据库
?>
