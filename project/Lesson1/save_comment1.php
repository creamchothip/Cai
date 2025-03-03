<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>บันทึกคอมเม้นต์นักเรียน</title>
</head>

<body>
	<?php
session_start(); // เริ่ม session

// ตรวจสอบ SESSION ว่ามีชื่อผู้ใช้หรือไม่
if (!isset($_SESSION['stp3_name'])) {
    die("⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก");
}
$stp3_name = $_SESSION['stp3_name']; // ดึงชื่อจาก SESSION

// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$host = "localhost";
$username = "Chothip294980";
$password = "Chothip294980";
$database = "data_stp3";

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli($host, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("❌ การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// รับค่าความคิดเห็นจากฟอร์ม
$comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

if (!empty($comment)) {
    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("UPDATE stp3_scores SET comment_study1 = ? WHERE stp3_name = ?");
    $stmt->bind_param("ss", $comment, $stp3_name);

    if ($stmt->execute()) {
        echo "✅ ความคิดเห็นของคุณถูกบันทึกเรียบร้อยแล้ว!";
        header("Location: ../EXPost Lesson1.html"); // เปลี่ยนไปหน้าถัดไป (เปลี่ยนเป็นชื่อไฟล์จริง)
        exit();
    } else {
        echo "❌ เกิดข้อผิดพลาดในการบันทึก: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "⚠ กรุณากรอกความคิดเห็นก่อนส่ง";
}

$conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
?>
</body>
</html>