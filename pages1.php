<!DOCTYPE html> 
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>หน้าที่ 1 - เข้าสู่บทเรียน</title>
    <link rel="stylesheet" href="stylepages1.css">
</head>
<body>

    <div class="container">
        <h1>บทเรียนคอมพิวเตอร์ช่วยสอน</h1>
        <h2>เรื่อง ปฏิบัติตามข้อตกลงในการใช้อินเทอร์เน็ต</h2>

        <form action="data_stp3.php" method="post" onsubmit="return validateForm();">
            <div class="inputname">
                <input type="text" name="stp3_name" id="stp3_name" placeholder="กรุณากรอกชื่อของคุณ" required>
            </div>

            <div class="submit-btn">
                <button type="submit">ตกลง</button>
            </div>
        </form>

        <div class="welcome-box">
            กรุณากรอกชื่อก่อน<br>เข้าสู่บทเรียนนะครับ<br>เมื่อกรอกเสร็จแล้วกดปุ่ม ตกลง
        </div>

        <!-- ปุ่มเปิด/ปิดเสียง และปุ่มช่วยอ่าน -->
        <div class="audio-control">
            <button id="mute-button" onclick="toggleMute()">🔊 เปิดเสียง</button>
            <button id="read-aloud" onclick="readAloud()">📢 ช่วยอ่าน</button>
        </div>
    </div>

    <img src="../picture_all/ครูผช-removebg-preview.png" alt="รูปภาพ" class="image1">
    <img src="../picture_all/ดาวเทียม.png" alt="รูปภาพ" class="image2">
    <img src="../vedio_all/จรวด.gif" alt="รูปภาพ" class="image3">
    <audio id="background-music" loop>
        <source src="../Sound_all/ประกอบ.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <script>
        let isMuted = false;

        window.addEventListener('load', function() {
            const backgroundMusic = document.getElementById('background-music');
            backgroundMusic.volume = 0.4;
            backgroundMusic.play();
            readWelcomeMessage(); // เรียกให้พูดอัตโนมัติเมื่อโหลดหน้า
        });

        function toggleMute() {
            const backgroundMusic = document.getElementById('background-music');
            isMuted = !isMuted;
            backgroundMusic.muted = isMuted;
            document.getElementById('mute-button').innerHTML = isMuted ? '🔇 ปิดเสียง' : '🔊 เปิดเสียง';
        }

        function validateForm() {
            let nameInput = document.getElementById("stp3_name").value.trim();
            if (nameInput === "") {
                alert("กรุณากรอกชื่อก่อนเข้าสู่บทเรียน");
                return false;
            }
            return true;
        }

        function readAloud() {
            let text = "กรุณากรอกชื่อก่อนเข้าสู่บทเรียนนะครับ เมื่อกรอกเสร็จแล้วกดปุ่ม ตกลง";
            let speech = new SpeechSynthesisUtterance(text);
            speech.lang = "th-TH";
            speech.rate = 0.8;
            speech.volume = 1;
            window.speechSynthesis.speak(speech);
        }

        function readWelcomeMessage() {
            let text = "กรุณากรอกชื่อก่อนเข้าสู่บทเรียนนะครับ เมื่อกรอกเสร็จแล้วกดปุ่ม ตกลง";
            let speech = new SpeechSynthesisUtterance(text);
            speech.lang = "th-TH";
            speech.rate = 0.8;
            speech.volume = 1;
            window.speechSynthesis.speak(speech);
        }
    </script>

</body>
</html>
