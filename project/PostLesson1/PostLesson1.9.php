<?php  
session_start(); // เรียก session_start() ก่อนที่จะมีการแสดง HTML

// ตรวจสอบว่ามีค่าใน session หรือไม่
if (!isset($_SESSION['stp3_name'])) {
    echo "⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก";
    exit();
}

// ดึงค่าชื่อจาก session
$stp3_name = $_SESSION['stp3_name'];

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>ข้อ 9</title>
    <style>
        body {
            background-image: url('../../picture_all/วอข้อสอบ.png');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .quiz-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 700px;
            height: 500px;
            text-align: center;
        }

        .quiz-container legend, label {
            font-size: 25px;
        }

        .next-page-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 15vh;
            margin-top: 30px;
        }

        .next-page {
            padding: 15px 40px;
            font-size: 20px;
            border: none;
            color: aliceblue;
            background-color: #EB4343;
            cursor: not-allowed; /* ล็อกปุ่มตอนเริ่ม */
            border-radius: 20px;
            transition: background-color 0.3s ease;
            opacity: 0.5; /* ทำให้ดูจางลงตอนล็อก */
        }

        .next-page.unlocked {
            cursor: pointer;
            opacity: 1;
            background-color: #EB4343;
        }

        .next-page:hover.unlocked {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-weight: bold;
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

        fieldset {
            border: 2px solid #FCF695;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            width: 665px;
            height: 450px;
        }

        /* กล่องจับเวลา */
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
    
    <script>
        let speech = new SpeechSynthesisUtterance();
        speech.lang = "th-TH";

        function startReading() {
            let nextPageButton = document.getElementById("next-page-btn");
            nextPageButton.classList.remove("unlocked"); // ล็อกปุ่มอีกครั้งเมื่อกด "ช่วยอ่าน"
            nextPageButton.disabled = true; 
            nextPageButton.style.cursor = "not-allowed"; 
            nextPageButton.style.opacity = 0.5;

            speech.text = "ข้อ 9: ควรใช้สื่ออินเทอร์เน็ตในช่วงเวลาใดจึงจะเหมาะสมที่สุด ?" + 
                " ก.ไก่  หลังจากทำการบ้านเสร็จ" + 
                " ข.ไข่  ระหว่างเรียนหนังสือ" + 
                " ค.ควาย  ตลอดทั้งวันโดยไม่มีการพัก";
            speech.rate = 0.7;

            // เมื่อเสียงพูดจบให้ปลดล็อกปุ่ม
            speech.onend = function() {
                unlockNextPage();
            };

            window.speechSynthesis.speak(speech);
        }

        function unlockNextPage() {
            let nextPageButton = document.getElementById("next-page-btn");
            nextPageButton.classList.add("unlocked");
            nextPageButton.disabled = false; 
            nextPageButton.style.cursor = "pointer"; 
            nextPageButton.style.opacity = 1;
        }

        function validateForm() {
            var radios = document.getElementsByName("q9");
            var errorMessage = document.getElementById("error-message");
            var formValid = false;

            errorMessage.textContent = "";

            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    formValid = true;
                    break;
                }
            }

            if (!formValid) {
                errorMessage.textContent = "⚠️ กรุณาตอบคำถามก่อน!";
                if (!window.speechSynthesis.speaking) {
                    let warningSpeech = new SpeechSynthesisUtterance("⚠️ กรุณาตอบคำถามก่อน!");
                    warningSpeech.lang = "th-TH";
                    warningSpeech.rate = 0.8;
                    window.speechSynthesis.speak(warningSpeech);
                }
                return false;
            }
        }

        function stopSpeechAndRedirect() {
            window.speechSynthesis.cancel();
            return true;
        }

        // ฟังก์ชันจับเวลา 1 นาที
        function startTimer() {
            let timeRemaining = 60;
            let timerBox = document.getElementById('timer-box1_1');

            let interval = setInterval(function() {
                let minutes = Math.floor(timeRemaining / 60);
                let seconds = timeRemaining % 60;

                timerBox.textContent = `${padTime(minutes)}:${padTime(seconds)}`;

                if (timeRemaining <= 0) {
                    clearInterval(interval);
                    alert("หมดเวลาแล้ว! กรุณาไปหน้าถัดไป");
                }
                timeRemaining--;
            }, 1000);
        }

        function padTime(time) {
            return time < 10 ? '0' + time : time;
        }

        // เล่นเสียงอัตโนมัติเมื่อหน้าโหลด
        window.onload = function() {
            startTimer();
            setTimeout(startReading, 500);
        };
    </script>
</head>
<body>
    <form action="Save_PostLesson9.php" method="POST" onsubmit="return validateForm();">
        <input type="hidden" name="stp3_name" value="<?php echo htmlspecialchars($stp3_name); ?>">
		
        <div class="quiz-container">
            <fieldset>
                <legend>ข้อ 9: ควรใช้สื่ออินเทอร์เน็ตในช่วงเวลาใดจึงจะเหมาะสมที่สุด ?</legend>
                <br><br>
                <label>
                    <input type="radio" name="q9" value="1"> ก. หลังจากทำการบ้านเสร็จ
                </label><br>
                <label>
                    <input type="radio" name="q9" value="0"> ข. ระหว่างเรียนหนังสือ
                </label><br>
                <label>
                    <input type="radio" name="q9" value="0"> ค. ตลอดทั้งวันโดยไม่มีการพัก
                </label><br>
                <span id="error-message" class="error-message"></span>
            </fieldset>
        </div>

        <div id="timer-box1_1" class="timer-box">01:00</div>

        <div class="next-page-container">
            <input style="background-color: #EB4343;" class="next-page" name="next" type="submit" value="ไปยังข้อถัดไป" onclick="stopSpeechAndRedirect()" id="next-page-btn">
        </div>
    </form>

    <div class="audio-control">
        <button id="mute-button" onclick="startReading()">🔊 ช่วยอ่าน</button>
    </div>
</body>
</html>
