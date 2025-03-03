<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>เนื้อเรื่อง</title>
    <link rel="stylesheet" href="styleLesson1.5.css"> <!-- เชื่อมกับไฟล์ CSS -->
    <style>
        body {
            background-image: url("../../picture_all/วอลอวกาศ.png");
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            text-align: center;
            overflow: hidden; /* ป้องกันการเลื่อนหน้าจอ */
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

        .buttoninput_extest1 {
            padding: 10px 30px;
            font-size: 22px;
            border: none;
            color: aliceblue;
            background-color: #EB4343;
            cursor: pointer;
            border-radius: 15px;
            margin-top: 500px;
            width: 90%; /* ให้ปุ่มยาวเต็มพื้นที่ */
            max-width: 150px; /* กำหนดความยาวสูงสุดของปุ่ม */
            display: block; /* ให้ปุ่มแสดงในบรรทัดใหม่ */
            margin-left: auto; /* จัดปุ่มให้อยู่ตรงกลาง */
            margin-right: auto; /* จัดปุ่มให้อยู่ตรงกลาง */
        }

        .buttoninput_extest1:hover {
            background-color: #45a049;
        }

        /* ปรับสไตล์ของปุ่มเมื่อถูกล็อค */
        .buttoninput_extest1:disabled {
            background-color: #D3D3D3; /* สีเทา */
            cursor: not-allowed; /* เปลี่ยนเคอร์เซอร์เป็นแบบไม่สามารถคลิกได้ */
        }

        #timer-box1_5 {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #f44336;
            color: white;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="text_study1_5">📔แนวทางการใช้อินเทอร์เน็ตอย่างปลอดภัย📔</div>
    <div class="lesson-box1_5"> 
        <p><br>1.4 หลีกเลี่ยงการใช้รหัสผ่านหรือข้อมูลส่วนตัวในการตั้งชื่อผู้ใช้งานหรือการตอบคำถามรักษาความปลอดภัยที่อาจเดาได้ง่าย</p>
        <p><br>1.5 ควรระมัดระวังในการแชร์ข้อมูลส่วนตัวในเว็บไซต์ที่ไม่คุ้นเคยหรือไม่น่าเชื่อถือ</p>
    </div>
    <img src='../../picture_all/ไม่เผยแพร่.png' alt="รูปภาพ" class="image2_extest1_5">
    
    <div class="audio-control">
        <button onclick="speakText()"> 🔊ช่วยอ่าน </button>
    </div>

    <!-- กล่องจับเวลา -->
    <div id="timer-box1_5">01:45</div>

    <script>
        // ฟังก์ชันอ่านออกเสียง
        function speakText() {
            let text = document.querySelector(".lesson-box1_5").innerText;
            let speech = new SpeechSynthesisUtterance();
            speech.lang = "th-TH"; // ภาษาไทย
            speech.text = text;
            speech.rate = 0.8; // ความเร็วปกติ
            speech.pitch = 1; // ระดับเสียงปกติ

            let voices = window.speechSynthesis.getVoices();
            let femaleVoice = voices.find(voice => voice.name.toLowerCase().includes('หญิง') || voice.name.toLowerCase().includes('female'));
            if (femaleVoice) {
                speech.voice = femaleVoice;
            }

            window.speechSynthesis.speak(speech);

            // เมื่อเริ่มพูด, ให้ปุ่ม "ต่อไป" ถูกล็อค
            document.querySelector(".buttoninput_extest1").disabled = true;

            // เมื่อพูดเสร็จ ให้ปลดล็อคปุ่ม "ต่อไป"
            speech.onend = function() {
                document.querySelector(".buttoninput_extest1").disabled = false;
            };
        }

        window.onload = function() {
            setTimeout(speakText, 1000); // อ่านออกเสียงอัตโนมัติเมื่อโหลดหน้า
            startTimer(); // เริ่มจับเวลา
        };

        // ฟังก์ชันจับเวลา 1 นาที 45 วินาที
        function startTimer() {
            let timeRemaining = 105; // 105 วินาที (1 นาที 45 วินาที)
            let timerBox = document.getElementById('timer-box1_5');

            let interval = setInterval(function() {
                let minutes = Math.floor(timeRemaining / 60);
                let seconds = timeRemaining % 60;

                timerBox.textContent = `${padTime(minutes)}:${padTime(seconds)}`;

                if (timeRemaining <= 0) {
                    clearInterval(interval);
                    alert("หมดเวลา! กรุณากดปุ่มต่อไป"); // แจ้งเตือนเมื่อหมดเวลา
                }
                timeRemaining--;
            }, 1000);
        }

        // ฟังก์ชันเพิ่มศูนย์นำหน้าเวลา
        function padTime(time) {
            return time < 10 ? '0' + time : time;
        }

        // ฟังก์ชันหยุดเสียงเมื่อไปยังหน้าใหม่
        function stopSpeech() {
            window.speechSynthesis.cancel();
        }

        // เรียกใช้ฟังก์ชัน stopSpeech เมื่อหน้าโหลดหรือย้ายไปหน้าถัดไป
        window.onbeforeunload = function() {
            stopSpeech();
        };
    </script>

    <!-- ปุ่มเริ่มสอบ -->
    <form method="post">
        <input type="submit" class="buttoninput_extest1" formaction="Lesson1.6.php" formmethod="POST" value="ต่อไป">
    </form>

    <img src="../../picture_all/ครูผช2-Photoroom.png" alt="รูปภาพ" class="image1_extest1_5">
</body>
</html>
