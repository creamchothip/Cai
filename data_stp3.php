<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เข้าถึงข้อมูล</title>
</head>
	
<body>
<?php
session_start(); // เริ่ม session เพื่อใช้เก็บข้อมูลข้ามหน้า

// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$host = "localhost";
$username = "Chothip294980";
$password = "Chothip294980";
$database = "data_stp3";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("❌ ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . mysqli_connect_error());
}

// ตรวจสอบว่ามีการส่งค่าชื่อเข้ามาหรือไม่
if (isset($_POST['stp3_name'])) {
    $stp3_name = mysqli_real_escape_string($conn, $_POST['stp3_name']);
    
    // เช็คว่ามีชื่อนี้อยู่ในฐานข้อมูลหรือไม่
    $check_query = "SELECT * FROM stp3_scores WHERE stp3_name = '$stp3_name'";
    $result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($result) == 0) {
        // ถ้ายังไม่มีชื่อ ให้เพิ่มชื่อเข้าไปก่อน
        $insert_query = "INSERT INTO stp3_scores (stp3_name) VALUES ('$stp3_name')";
        mysqli_query($conn, $insert_query);
    }

    // เก็บชื่อไว้ใน session และเปลี่ยนไปหน้าแบบทดสอบ
    $_SESSION['stp3_name'] = $stp3_name;
    header("Location: pages2.php"); 
    exit();
}
?>
</body>
</html>