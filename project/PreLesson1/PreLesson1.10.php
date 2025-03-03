<?php  
session_start(); 

if (!isset($_SESSION['stp3_name'])) {
    echo "⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก";
    exit();
}

$stp3_name = $_SESSION['stp3_name'];


?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>ข้อ 10</title>
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
            cursor: not-allowed;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            opacity: 0.5;
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
            nextPageButton.classList.remove("unlocked"); 
            nextPageButton.disabled = true; 
            nextPageButton.style.cursor = "not-allowed"; 
            nextPageButton.style.opacity = 0.5;

            speech.text = "ข้อ 10: ควรทำอย่างไรหากได้รับข้อความจากคนที่ไม่รู้จักในอินเทอร์เน็ต?" + 
                " ก.ไก่  ตอบกลับและพูดคุยกับเขา" + 
                " ข.ไข่  บอกผู้ปกครองหรือคุณครู" + 
                " ค.ควาย  ให้ข้อมูลส่วนตัวเพื่อทำความรู้จัก";
            speech.rate = 0.7;

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

        window.onload = function() {
            startTimer();
            setTimeout(startReading, 500);
        };
    </script>
</head>
<body>
    <form action="Save_PreLesson10.php" method="POST">
        <input type="hidden" name="stp3_name" value="<?php echo htmlspecialchars($stp3_name); ?>">

        <div class="quiz-container">
            <fieldset>
                <legend>ข้อ 10: ควรทำอย่างไรหากได้รับข้อความจากคนที่ไม่รู้จักในอินเทอร์เน็ต?</legend>
                <br>
                <label><input type="radio" name="q10" value="0"> ก. ตอบกลับและพูดคุยกับเขา</label><br>
                <label><input type="radio" name="q10" value="1"> ข. บอกผู้ปกครองหรือคุณครู</label><br>
                <label><input type="radio" name="q10" value="0"> ค. ให้ข้อมูลส่วนตัวเพื่อทำความรู้จัก</label><br>
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
