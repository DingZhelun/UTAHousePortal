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

    if ($rows['available']==1) {
        session_start();
        $_SESSION['user_mail'] = $rows['contact_email'];
        $_SESSION['name'] = $rows['contact_name'];
        $_SESSION['tel'] = $rows['contact_tel'];
        $_SESSION['role'] = $rows['role'];
        $_SESSION['address'] = $rows['address'];

        if ($rows['role'] == "Subdivision") {
            echo "
                <script>
                    alert('login success,Subdivision');
                    window.location.href=\"../Subdivision_role.html\";
                </script>";
        } else if ($rows['role'] == "Building") {
            echo "
                <script>
                    alert('login success,Building');
                    window.location.href=\"../Building_role.html\";
                </script>";
        } else if ($rows['role'] == "Apartment") {
            echo "
                <script>
                    alert('login success,Apartment');
                    window.location.href=\"../Apartment_role.html\";
                </script>";
        } else if ($rows['role'] == "Admin") {
            echo "
                <script>
                    alert('login success,Admin');
                    window.location.href=\"../Superuser_role.html\";
                </script>";
        }
        exit;
    }else{
        echo "
            <script>
                alert('Account not activated');
            </script>";
    }
}else{
    echo "
    <script>
        alert('password or email error');
        window.location.href=\"../login.html\";
    </script>";
}

$conn->close();//关闭数据库
?>
