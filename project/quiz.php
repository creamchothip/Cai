<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แบบทดสอบ</title>
	    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .quiz-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        fieldset {
            border: 2px solid #007BFF;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }
        legend {
            font-weight: bold;
            color: #007BFF;
        }
        label {
            display: block;
            margin: 8px 0;
            cursor: pointer;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    session_start(); // เรียกใช้งาน session
    if (!isset($_SESSION['stp3_name'])) {
        echo "⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก";
        exit();
    }
    $stp3_name = $_SESSION['stp3_name']; // ดึงชื่อจาก session
    ?>

    <div class="quiz-container">
        <form action="save_quiz.php" method="post">
            <fieldset>
                <legend>ข้อ 1: คุณควรทำอย่างไรเมื่อต้องการโพสต์ข้อมูลลงโซเชียลมีเดีย?</legend>
                <label><input type="radio" name="q1" value="0"> ก. โพสต์ทุกอย่างที่ต้องการโดยไม่คิดหน้าคิดหลัง</label><br>
                <label><input type="radio" name="q1" value="1"> ข. ตรวจสอบความเหมาะสมของเนื้อหาและผลกระทบก่อนโพสต์</label><br>
                <label><input type="radio" name="q1" value="0"> ค. แชร์ข้อมูลส่วนตัวของผู้อื่นโดยไม่ได้รับอนุญาต</label><br>
            </fieldset>

            <!-- ส่งชื่อลงไปด้วย แต่ไม่ให้แก้ไข -->
            <input type="hidden" name="stp3_name" value="<?php echo $stp3_name; ?>">

            <input type="submit" name="submit_quiz" value="Submit">
        </form>
    </div>
</body>
</html>
