<?php
$servername = "167.99.105.36";
$username = "zxc9069_czy";
$password = "Czy674407238";
$dbname = "zxc9069_youareondefault";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
?>