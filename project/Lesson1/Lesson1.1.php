<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>วัตถุประสงค์เรื่องที่ 1</title>
<link rel="stylesheet" href="styleLesson1.1.css"> <!-- เชื่อมกับไฟล์ CSS -->
<style>
    body {
        background-image: url("../../picture_all/วอลอวกาศ.png");
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
        margin: 0;
        font-family: Arial, sans-serif;
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
        border: 2px solid black;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
    }

    .audio-control button:hover {
        background-color: #FFF4C7;
    }

    h1 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 10px;
        color: white;
    }

    h2 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .buttoninput_Lesson1_1 {
        padding: 10px 30px;
        font-size: 18px;
        border: none;
        color: aliceblue;
        background-color: #EB4343;
        cursor: not-allowed;  /* ล็อกปุ่มตอนเริ่ม */
        border-radius: 15px;
        margin-top: 20px;
        opacity: 0.5;
    }

    .buttoninput_Lesson1_1.unlocked {
        cursor: pointer;
        opacity: 1;
    }

    .buttoninput_Lesson1_1:hover.unlocked {
        background-color: #45a049;
    }

    .buttoninput_Lesson1_1:active.unlocked {
        background-color: #3e8e41;
    }

    #timer-box1_1 {
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
    <div class="text_lesson1_1">
        <h1>👉🏻 วัตถุประสงค์ที่นักเรียนต้องทราบ 👈 </h1>
    </div>
    <div class="lesson-box1_1">
        <h2>✨วันนี้เราจะมาเรียนรู้เกี่ยวกับการใช้อินเทอร์เน็ตอย่างปลอดภัยและมีความรับผิดชอบ<br> 
        เพื่อให้นักเรียนทุกคนเข้าใจและตระหนักถึงความสำคัญของการปฏิบัติตามข้อตกลง<br>
        ในการใช้อินเทอร์เน็ตการรู้จักแยกแยะพฤติกรรมที่เหมาะสมและไม่เหมาะสมในการใช้<br>
        อินเทอร์เน็ตจะช่วยให้เราหลีกเลี่ยงอันตรายต่างๆ ที่อาจเกิดขึ้นจากการใช้สื่อออนไลน์</h2>
    </div>

    <!-- ปุ่มช่วยอ่าน -->
    <div class="audio-control">
        <button id="mute-button" onclick="toggleSpeech()">🔊 ช่วยอ่าน</button>
    </div>

    <!-- ปุ่มเริ่มเรียน -->
    <form method="post">
        <input type="submit" id="start-button" class="buttoninput_Lesson1_1" formaction="Lesson1.2.php" formmethod="POST" value="เริ่มเรียน" disabled>
    </form>

    <!-- กล่องจับเวลา -->
    <div id="timer-box1_1">00:30</div>

    <script>
        let speech = new SpeechSynthesisUtterance();
        speech.lang = "th-TH";
        speech.text = " วัตถุประสงค์ที่นักเรียนต้องทราบ " + 
                      " วันนี้เราจะมาเรียนรู้เกี่ยวกับการใช้อินเทอร์เน็ตอย่างปลอดภัยและมีความรับผิดชอบ" + 
                      " เพื่อให้นักเรียนทุกคนเข้าใจและตระหนักถึงความสำคัญของการปฏิบัติตามข้อตกลงในการใช้อินเทอร์เน็ต" + 
                      " การรู้จักแยกแยะพฤติกรรมที่เหมาะสมและไม่เหมาะสมในการใช้อินเทอร์เน็ต" + 
                      " จะช่วยให้เราหลีกเลี่ยงอันตรายต่างๆ ที่อาจเกิดขึ้นจากการใช้สื่อออนไลน์";
        speech.rate = 1.2;  
        speech.pitch = 1.5;

        function toggleSpeech() {
            let startButton = document.getElementById("start-button");
            startButton.classList.remove("unlocked");
            startButton.disabled = true; 
            startButton.style.cursor = "not-allowed";
            startButton.style.opacity = 0.5;

            window.speechSynthesis.cancel(); 
            window.speechSynthesis.speak(speech);
        }

        function unlockStartButton() {
            let startButton = document.getElementById("start-button");
            startButton.classList.add("unlocked");
            startButton.disabled = false; 
            startButton.style.cursor = "pointer";
            startButton.style.opacity = 1;
        }

        function startTimer() {
            let timeRemaining = 30;  // กำหนดเวลาเริ่มต้นเป็น 30 วินาที
            let timerBox = document.getElementById('timer-box1_1');

            let interval = setInterval(function() {
                let minutes = Math.floor(timeRemaining / 60);  // คำนวณนาที
                let seconds = timeRemaining % 60;  // คำนวณวินาที

                timerBox.textContent = `${padTime(minutes)}:${padTime(seconds)}`;

                if (timeRemaining <= 0) {
                    clearInterval(interval);  // หยุดการนับเวลาเมื่อถึง 0
                    alert("หมดเวลา กรุณากดปุ่มเริ่มเรียน");  // แจ้งเตือนเมื่อหมดเวลา
                }
                timeRemaining--;  // ลดเวลาทีละ 1 วินาที
            }, 1000);
        }

        function padTime(time) {
            return time < 10 ? '0' + time : time;
        }

        window.onload = function() {
            startTimer();  // เริ่มนับเวลาเมื่อโหลดหน้าเว็บ
            setTimeout(function() {
                window.speechSynthesis.speak(speech); // เริ่มอ่าน
            }, 500);
        };

        speech.onend = function() {
            unlockStartButton();
        };

        window.onbeforeunload = function() {
            window.speechSynthesis.cancel();
        };
    </script>

</body>
</html>
