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
$PostLesson2_1 = isset($_POST['q9']) ? intval($_POST['q9']) : 0;

// ดึงคะแนนเก่าจากฐานข้อมูล
$sql_old_score = "SELECT PostLesson1 FROM stp3_scores WHERE stp3_name = '$stp3_name'";
$result_old_score = mysqli_query($conn, $sql_old_score);

if (mysqli_num_rows($result_old_score) > 0) {
    $row = mysqli_fetch_assoc($result_old_score);
    $old_score = $row['PostLesson1']; // คะแนนเก่า
} else {
    $old_score = 0; // หากไม่มีคะแนนเก่าในฐานข้อมูล
}

// คำนวณคะแนนรวม (บวกคะแนนเก่ากับคะแนนใหม่)
$total_score2_1 = $old_score + $PostLesson2_1;

// SQL อัปเดตข้อมูลคะแนนของผู้ใช้
$sql_update_score = "UPDATE stp3_scores SET PostLesson1 = '$total_score2_1' WHERE stp3_name = '$stp3_name'";

if (mysqli_query($conn, $sql_update_score)) {
    echo "✅ บันทึกข้อมูลสำเร็จ! คะแนนรวม: " . $total_score2_1;

    // เปลี่ยนเส้นทางไปหน้า Lesson1.1.html
    header("Location: PostLesson1.10.php");
    exit(); // ออกจาก script ทันทีหลัง redirect
} else {
    echo "❌ เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

</body>
</html>
