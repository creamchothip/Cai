<?php
session_start(); // เริ่ม session

// ตรวจสอบว่า SESSION มีชื่อผู้ใช้หรือไม่
if (!isset($_SESSION['stp3_name'])) {
    die("⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก");
}
$stp3_name = $_SESSION['stp3_name']; // ดึงชื่อจาก SESSION

// ตรวจสอบว่าผู้ใช้กดออกจากระบบ
if (isset($_POST['logout'])) {
    session_destroy(); // ทำลาย session
    header("Location: pages1.php"); // ไปยังหน้า pages1.php
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>สรุปผลการทดสอบเรื่องที่1</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url("../../picture_all/วอลสรุปอวกาศ.png");
            padding: 20px;
            text-align: center;
            overflow: hidden; /* ป้องกันการเลื่อนหน้าจอ */
        }
        h2 {
            font-size: 32px;
            color: white;
            font-weight: bold;
            margin-bottom: 20px;
        }
		p {
            font-size: 25px;
            color: white;
            font-weight: bold;
            margin-bottom: 20px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
		.audio-control {
            position: fixed;
            bottom: 80px;
            left: 20px;
        }
        .audio-control button {
            padding: 10px 15px;
            font-size: 20px;
            background-color: #F7D07A;
            border: 2px solid black; /* เพิ่มขอบกรอบสีดำ */
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        .audio-control button:hover {
            background-color: #FFF4C7;
        }
		.audio-control1 {
            position: fixed;
            bottom: 80px;
            left: 230px;
        }
        .audio-control1 button {
            padding: 10px 15px;
            font-size: 20px;
            background-color: #F7D07A;
            border: 2px solid black; /* เพิ่มขอบกรอบสีดำ */
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        .audio-control1 button:hover {
            background-color: #FFF4C7;
        }
    </style>
</head>
<body>
    <h2>📊 ผลการทดสอบของคุณ</h2>
    <p>👤 ชื่อผู้ใช้: <strong><?php echo $stp3_name; ?></strong></p>
    
    <?php
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

    // ดึงคะแนนเก่าจากฐานข้อมูล
    $sql_old_score = "SELECT PostLesson1 FROM stp3_scores WHERE stp3_name = '$stp3_name'";
    $result_old_score = mysqli_query($conn, $sql_old_score);

    if (mysqli_num_rows($result_old_score) > 0) {
        $row = mysqli_fetch_assoc($result_old_score);
        $old_score = $row['PostLesson1']; // คะแนนเก่า
    } else {
        $old_score = 0; // หากไม่มีคะแนนเก่าในฐานข้อมูล
    }

    // คำนวณคะแนนรวม (ไม่รวม q10)
    $total_score = $old_score; // ใช้แค่คะแนนที่มีอยู่จากฐานข้อมูล

    // คำนวณจำนวนข้อที่ถูกและผิด
    $total_questions = 10; // จำนวนข้อสอบทั้งหมด
    $correct_answers = $total_score;
    $wrong_answers = $total_questions - $correct_answers;
    $percentage = ($correct_answers / $total_questions) * 100;
    $result_text = ($percentage >= 60) ? "🎉 ผ่าน" : "❌ ไม่ผ่าน";
    $passStatus = ($percentage >= 60) ? "ผ่าน" : "ไม่ผ่าน";

    // แสดงผลลัพธ์
    echo "<p>📋 จำนวนข้อสอบทั้งหมด: <strong>$total_questions ข้อ</strong></p>";
    echo "<p>✅ จำนวนข้อที่ถูก: <strong>$correct_answers ข้อ</strong></p>";
    echo "<p>❌ จำนวนข้อที่ผิด: <strong>$wrong_answers ข้อ</strong></p>";
    echo "<p>📊 คะแนนที่ได้: <strong>$total_score คะแนน</strong></p>";
    echo "<p>📈 คิดเป็นร้อยละ: <strong>" . number_format($percentage, 2) . "%</strong></p>";
    echo "<p>🏆 สรุปผล: <strong>$result_text</strong></p>";

    // แสดงรูปภาพตามผลลัพธ์
    if ($passStatus == "ผ่าน") {
        echo '<img src="../../vedio_all/สุดยอด.gif" alt="ผ่าน">';
    } else {
        echo '<img src="../../vedio_all/เฮ้อ.gif" alt="ไม่ผ่าน">';
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
    ?>

    <!-- ปุ่ม "ออกจากระบบ" -->
    <form method="post" action="../pages1.php" class="audio-control">
        <button type="submit" name="logout" style="color: black">🏡ออกจากระบบ</button>
    </form>

    <div class="audio-control1">
        <button id="mute-button" onclick="toggleMute()" style="color: black">🔊 เปิดเสียง</button>
    </div>

    <audio id="background-music" loop>
        <source src="../../Sound_all/ประกอบ.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <script>
        let isMuted = false;

        window.addEventListener('load', function() {
            const backgroundMusic = document.getElementById('background-music');
            backgroundMusic.volume = 0.4;
            backgroundMusic.play();
        });

        function toggleMute() {
            const backgroundMusic = document.getElementById('background-music');
            isMuted = !isMuted;
            backgroundMusic.muted = isMuted;
            document.getElementById('mute-button').innerHTML = isMuted ? '🔇 ปิดเสียง' : '🔊 เปิดเสียง';
        }
    </script>
</body>
</html>
