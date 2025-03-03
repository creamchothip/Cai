<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>บันทึกคะแนนกิจกรรมที่1</title>
</head>
<body>
    <?php
    session_start(); // เริ่ม session
    if (!isset($_SESSION['stp3_name'])) {
        echo "⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก";
        exit();
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

    // รับค่าจากฟอร์ม
    $Ans_PB1_1 = isset($_POST['Ans_PB1']) ? intval($_POST['Ans_PB1']) : 0;
   	$Ans_PB1_2 = isset($_POST['Ans_PB2']) ? intval($_POST['Ans_PB2']) : 0;

    // คำนวณคะแนนรวมจากคำตอบที่เลือก
    $total_acti1_score1= $Ans_PB1_1  + $Ans_PB1_2;

    // SQL Query เพื่ออัปเดตคะแนนลงในฐานข้อมูล
    $sql = "UPDATE stp3_scores SET acti1_score1 = ' $total_acti1_score1' WHERE stp3_name = '$stp3_name'";
    $sql_connect = mysqli_query($conn, $sql);

if ($sql_connect) {
        // หากบันทึกข้อมูลสำเร็จ
        echo "✅ บันทึกข้อมูลสำเร็จ! คะแนนรวม: " .  $total_acti1_score1;
        header("Location: Lesson1.3.php");
        exit(); // ออกจากการทำงานของสคริปต์
    } else {
        echo "❌ เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
    }

    mysqli_close($conn); // ปิดการเชื่อมต่อฐานข้อมูล
    ?>
</body>
</html>