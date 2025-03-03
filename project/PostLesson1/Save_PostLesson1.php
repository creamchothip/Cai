<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>บันทึกข้อมูล</title>
</head>
<body>
    <?php
session_start(); // เริ่ม session

// ตรวจสอบว่า SESSION มีชื่อผู้ใช้หรือไม่
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
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("❌ ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . mysqli_connect_error());
}

// รับค่าจากฟอร์ม (ตรวจสอบให้แน่ใจว่าฟอร์ม POST มีค่าถูกต้อง)
$PostLesson2_1 = isset($_POST['q1']) ? intval($_POST['q1']) : 0;

// คำนวณคะแนนรวม
$total_score2_1  = $PostLesson2_1 ;

// SQL อัปเดตข้อมูลคะแนนของผู้ใช้
$sql = "UPDATE stp3_scores SET PostLesson1 = '$total_score2_1' WHERE stp3_name = '$stp3_name'";

if (mysqli_query($conn, $sql)) {
    echo "✅ บันทึกข้อมูลสำเร็จ! คะแนนรวม: " . $total_score2_1;

    // เปลี่ยนเส้นทางไปหน้า Lesson1.1.html
    header("Location: PostLesson1.2.php");
    exit(); // ออกจาก script ทันทีหลัง redirect
} else {
    echo "❌ เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

</body>
</html>
