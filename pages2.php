<?php 
session_start(); // เปิดใช้งาน session

// ตรวจสอบว่ามี session ชื่อหรือไม่
$stp3_name = isset($_SESSION['stp3_name']) ? $_SESSION['stp3_name'] : 'นักเรียน';
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>หน้าที่ 2 - เลือกบทเรียน</title>
		
    <link rel="stylesheet" href="stylepages2.css">
    <style>
        /* พื้นหลัง */
        body {
            background-image: url('../picture_all/วอลอวกาศ.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            font-family: Arial, sans-serif;
            text-align: center;
            color: white;
			height: 100vh; /* ให้มีความสูงเต็มหน้าจอ */
			overflow: hidden; /* ป้องกันการเลื่อนหน้าจอ */
        }
		.lesson-box {
    border-radius: 15px;
    text-align: center;
    color: white;
    font-weight: bold;
    margin-top: 150px;
        }
.lesson-box h2 {
    font-size: 50px; /* ขยายตัวอักษร */
        }
p {
    font-size: 50px; /* ขยายตัวอักษร */
        }
        /* ปุ่มเลือกบทเรียน */
        #lesson1-button {
            background-color: #D4DDFF;
            color: black;
            width: 450px;
            height: 100px;
            border-radius: 15px;
            margin-top: 50px;
            font-size: 25px;
            font-weight: bold;
            cursor: pointer;
            border: 2px solid black;
        }

        #lesson1-button:hover {
            background-color: #FEFFB5;
        }

        /* ปุ่มควบคุมเสียง */
        .audio-control, .exit-control {
            position: fixed;
            bottom: 80px;
            left: 20px;
        }

        .exit-control {
            left: 180px;
        }

        .audio-control button, .exit-control button {
            padding: 10px 15px;
            font-size: 20px;
            background-color: #F7D07A;
            border: 2px solid black;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .audio-control button:hover, .exit-control button:hover {
            background-color: #FFF4C7;
        }

        /* รูปภาพ */
        .image1pages2 {
            position: fixed;
            right: 5px;
            top: 470px;
            width: 420px;
            height: auto;
        }

        .welcome-box2 {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="lesson-box">
        <h2>🙏 ยินดีต้อนรับเข้าสู่บทเรียน 🙏</h2>
        <p>น้อง <strong><?php echo $stp3_name; ?> 🎉</strong></p>
    </div>

    <button id="lesson1-button" onclick="startLesson1()">
        👉🏻 เรื่อง "เดินทางสู่โลกออนไลน์<br> อย่างปลอดภัย!"
    </button>

    <div class="exit-control">
        <button onclick="window.location.href='pages1.php';">🏠 ออกจากบทเรียน</button>
    </div>
    
    <div class="audio-control">
        <button id="mute-button" onclick="toggleMute()">🔊 เปิดเสียง</button>
    </div>

    <img src="../vedio_all/จรวด3.gif" alt="จรวดเคลื่อนไหว" class="image1pages2">
    <img src="../picture_all/ดาวเทียม.png" alt="ดาวเทียม" class="image2pages2">

    <div class="welcome-box2">
        เลือกบทเรียนได้เลยครับ💡
    </div>

    <!-- เสียงพื้นหลัง -->
    <audio id="bg-music" loop>
        <source src="../Sound_all/ประกอบ.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <script>
        // ฟังก์ชันเริ่มบทเรียน 1
        function startLesson1() {
            stopMusic();  
            stopSpeech();
            window.location.href = "EXPre Lesson1.html";
        }

        // ฟังก์ชันหยุดเพลงพื้นหลัง
        function stopMusic() {
            const bgMusic = document.getElementById('bg-music');
            bgMusic.pause();
            bgMusic.currentTime = 0;
        }

        // ฟังก์ชันหยุดเสียงพูด
        function stopSpeech() {
            window.speechSynthesis.cancel();
        }

        // ฟังก์ชันให้ AI พูดคำต้อนรับ
        function speakWelcome() {
            var name = "<?php echo $stp3_name; ?>"; 
            var text = "ยินดีต้อนรับ " + "น้อง " +name + " เข้าสู่บทเรียน กรุณาเลือกบทเรียนได้เลยครับ";
            var speech = new SpeechSynthesisUtterance(text);
            speech.lang = "th-TH";
            speech.rate = 0.7;
            speech.volume = 1.0;
            window.speechSynthesis.speak(speech);
        }

        // เปิดเสียงพูดเมื่อโหลดหน้า
        window.addEventListener('load', speakWelcome);

        let isMuted = false;

        // ฟังก์ชันเปิด/ปิดเสียง
        function toggleMute() {
            const bgMusic = document.getElementById('bg-music');
            const muteButton = document.getElementById('mute-button');
            
            isMuted = !isMuted;
            bgMusic.muted = isMuted;
            muteButton.innerHTML = isMuted ? '🔇 ปิดเสียง' : '🔊 เปิดเสียง';
        }

        // เริ่มเล่นเพลงพื้นหลัง
        window.addEventListener('load', function() {
            const bgMusic = document.getElementById('bg-music');
            bgMusic.volume = 0.2;
            bgMusic.play();
        });
    </script>

</body>
</html>
