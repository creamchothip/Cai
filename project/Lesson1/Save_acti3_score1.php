<?php
session_start();

// ตรวจสอบว่ามี session ของชื่อหรือไม่
if (!isset($_SESSION['stp3_name'])) {
    die("⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก");
}

$stp3_name = $_SESSION['stp3_name']; // ดึงชื่อจาก session

// เชื่อมต่อฐานข้อมูล
$host = "localhost";
$username = "Chothip294980";
$password = "Chothip294980";
$database = "data_stp3";
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("❌ ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . mysqli_connect_error());
}

// รับค่าคะแนนจาก AJAX
$score = isset($_POST['score']) ? intval($_POST['score']) : 0;

// อัปเดตคะแนน acti3_score1 ตามชื่อผู้เล่น
$sql = "UPDATE stp3_scores SET acti3_score3 = '$score' WHERE stp3_name = '$stp3_name'";

if (mysqli_query($conn, $sql)) {
    echo "✅ บันทึกคะแนนสำเร็จ!";
} else {
    echo "❌ เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
