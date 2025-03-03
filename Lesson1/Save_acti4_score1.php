<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>บันทึกกิจกรรมที่ 4</title>
</head>

<body>
	<?php
session_start();

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
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

// ตรวจสอบว่า session มีชื่อหรือไม่
if (!isset($_SESSION['stp3_name'])) {
    die("⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก");
}

$stp3_name = $_SESSION['stp3_name']; // ดึงชื่อจาก session

// ดึงคะแนนเดิมจากฐานข้อมูล
$sql_get_score = "SELECT acti4_score4 FROM stp3_scores WHERE stp3_name = '$stp3_name'";
$result = mysqli_query($conn, $sql_get_score);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $current_score = $row['acti4_score4'];
    $new_score = $current_score + $score; // บวกคะแนนใหม่กับคะแนนเดิม
} else {
    $new_score = $score; // ถ้าไม่มีคะแนนเดิม ให้คะแนนใหม่เป็นคะแนนเดียว
}

// อัปเดตคะแนนใหม่ในฐานข้อมูล
$sql_update = "UPDATE stp3_scores SET acti4_score4 = '$new_score' WHERE stp3_name = '$stp3_name'";

if (mysqli_query($conn, $sql_update)) {
    echo "✅ บันทึกคะแนนสำเร็จ!";
} else {
    echo "❌ เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>

</body>
</html>