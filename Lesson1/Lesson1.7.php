<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรมเลือกคำตอบ - ควรทำหรือไม่ควรทำ</title>
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

        .game-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        h1 {
            font-size: 25px;
            margin-bottom: 20px;
            color: black;
        }

        .instructions {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #333;
        }

        .question-container {
            margin-bottom: 30px;
        }

        .question {
            font-size: 20px;
            margin: 20px 0;
            color:black;
        }

        .choices {
            margin: 10px 0;
        }

        .choice {
            padding: 10px;
            margin: 5px;
            background-color: #FFB6B9;
            color: black;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 200px;
            margin: 10px auto;
            transition: background-color 0.3s;
        }

        .choice:hover {
            background-color: #45a049;
        }

        .choice.disabled {
            background-color: #aaa;
            cursor: not-allowed;
        }

        button {
            background-color: #EB4343;
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
        }

        button:hover {
            background-color: #BEE3BA;
        }

        button:active {
            transform: scale(0.98);
        }

        .hidden {
            display: none;
        }

        /* ปุ่มคำชี้แจง */
        .read-instructions-btn {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: #5C6BC0;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .read-instructions-btn:hover {
            background-color: #3F51B5;
        }

        /* ตำแหน่งของภาพ */
        .img1_7 {
            position: fixed;
            top: 0;
            right: 100px;
            width: 150px;
            height: auto;
            z-index: 9999;
        }
        .img2_7 {
            position: fixed;
            top: 560px;
            left: 100px;
            width: 200px;
            height: auto;
            z-index: 9999;
        }

        .read-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #9FD4A3;
            color: black;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid black;
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
	color: black;
}


.audio-control button:hover {
    background-color: #FFF4C7;
}
#timer-box1_7 {
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

    <img class="img1_7" src="../../vedio_all/ก้อนเมฆ.gif">
    <img class="img2_7" src="../../picture_all/ก้อนหิน-Photoroom.png">

    <div class="game-container">
        <h1>🎮กิจกรรม <br>🎮เลือกคำตอบ - ควรทำหรือไม่ควรทำ</h1>

        <!-- ปุ่มคำชี้แจง -->
		<div class="audio-control">
        <button onclick= "speakText()">🔊ช่วยอ่าน</button></div>
		


        <div class="instructions hidden">
            <p>คำชี้แจง : เลือกคำตอบ - ควรทำหรือไม่ควรทำ</p>
        </div>
        
        <!-- ช่วงที่ 1 -->
        <div id="part1">
            <!-- คำถาม 1 -->
            <div class="question-container">
                <div class="question">
                    1. การตั้งค่าความเป็นส่วนตัวในโซเชียลมีเดีย
                    <button class="read-button" onclick="toggleQuestionDetails('q1')">🎤 ช่วยอ่านข้อที่ 1</button>
                </div>
                <div class="choices">
                    <div class="choice" onclick="checkAnswer('q1', 'correct', this)">ควรทำ</div>
                    <div class="choice" onclick="checkAnswer('q1', 'incorrect', this)">ไม่ควรทำ</div>
                </div>
            </div>

            <!-- คำถาม 2 -->
            <div class="question-container">
                <div class="question">
                    2. แชร์ข้อมูลส่วนตัวให้กับคนแปลกหน้า
                    <button class="read-button" onclick="toggleQuestionDetails('q2')">🎤 ช่วยอ่านข้อที่ 2</button>
                </div>
                <div class="choices">
                    <div class="choice" onclick="checkAnswer('q2', 'incorrect', this)">ควรทำ</div>
                    <div class="choice" onclick="checkAnswer('q2', 'correct', this)">ไม่ควรทำ</div>
                </div>
            </div>

            <button onclick="goToPart2()">ไปยังคำถามถัดไป</button>
        </div>

        <!-- ช่วงที่ 2 -->
        <div id="part2" class="hidden">
            <!-- คำถาม 3 -->
            <div class="question-container">
                <div class="question">
                    3. ตั้งเวลาการใช้อินเทอร์เน็ตให้เหมาะสม
                    <button class="read-button" onclick="toggleQuestionDetails('q3')">🎤 ช่วยอ่านข้อที่ 3</button>
                </div>
                <div class="choices">
                    <div class="choice" onclick="checkAnswer('q3', 'correct', this)">ควรทำ</div>
                    <div class="choice" onclick="checkAnswer('q3', 'incorrect', this)">ไม่ควรทำ</div>
                </div>
            </div>

            <!-- คำถาม 4 -->
            <div class="question-container">
                <div class="question">
                    4. ใช้ภาษาหยาบคายในแชทและโลกโซเชียล
                    <button class="read-button" onclick="toggleQuestionDetails('q4')">🎤 ช่วยอ่านข้อที่ 4</button>
                </div>
                <div class="choices">
                    <div class="choice" onclick="checkAnswer('q4', 'incorrect', this)">ควรทำ</div>
                    <div class="choice" onclick="checkAnswer('q4', 'correct', this)">ไม่ควรทำ</div>
                </div>
            </div>

            <button onclick="submitAnswers()">ส่งคำตอบ</button>
        </div>
    </div>
	<div id="timer-box1_7">04:00</div>
    <script>
        let userAnswers = {
            'q1': '',
            'q2': '',
            'q3': '',
            'q4': ''
        };

        let correctAnswers = {
            'q1': 'correct',
            'q2': 'correct',
            'q3': 'correct',
            'q4': 'correct'
        };

        let score = 0;

        // ฟังก์ชันตรวจสอบคำตอบ
        function checkAnswer(question, answer, element) {
            if (userAnswers[question] !== '') return;  // ถ้าเลือกแล้วจะไม่สามารถเปลี่ยนคำตอบได้

            userAnswers[question] = answer;

            // เปลี่ยนสีของปุ่มที่เลือกแล้ว
            element.style.backgroundColor = '#EB4343';  // สีที่เลือก

            // ทำให้ตัวเลือกทั้งสองไม่สามารถเลือกได้
            const choices = element.parentNode.querySelectorAll('.choice');
            choices.forEach(choice => {
                choice.classList.add('disabled');
                // เปลี่ยนสีของตัวเลือกที่ไม่เลือกเป็นเทา
                if (choice !== element) {
                    choice.style.backgroundColor = '#D3D3D3'; // สีเทาของตัวเลือกที่ไม่ได้เลือก
                }
            });
        }

        // ไปยังคำถามในช่วงที่ 2
        function goToPart2() {
            document.getElementById('part1').classList.add('hidden');
            document.getElementById('part2').classList.remove('hidden');
        }

        // ส่งคำตอบและไปยังหน้าใหม่
        function submitAnswers() {
            score = 0;
            for (let question in userAnswers) {
                if (userAnswers[question] === correctAnswers[question]) {
                    score++;
                }
            }

            // ส่งคะแนนไปยัง PHP เพื่อบันทึกในฐานข้อมูล
            const formData = new FormData();
            formData.append('score', score);

            fetch('save_acti4_score1.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(result => {
                window.location.href = 'Lesson1.8.php'; // ไปยังหน้า Lesson1.8 เมื่อส่งคำตอบสำเร็จ
            })
            .catch(error => console.log('Error:', error));
        }

        // ฟังก์ชันแสดงหรือซ่อนคำชี้แจง
        function toggleInstructions() {
            const instructions = document.querySelector('.instructions');
            if (instructions.classList.contains('hidden')) {
                instructions.classList.remove('hidden');
                
                // อ่านคำชี้แจงด้วยเสียง
                const speech = new SpeechSynthesisUtterance('คำชี้แจง : เลือกคำตอบ - ควรทำหรือไม่ควรทำ');
                speech.lang = 'th-TH'; // ภาษาไทย
                window.speechSynthesis.speak(speech);
            } else {
                instructions.classList.add('hidden');
            }
        }

        // ฟังก์ชันแสดงรายละเอียดคำถาม (โดยไม่ใช้ alert)
        function toggleQuestionDetails(questionId) {
            const questionText = {
                'q1': 'การตั้งค่าความเป็นส่วนตัวในโซเชียลมีเดีย ควรหรือไม่',
                'q2': 'การแชร์ข้อมูลส่วนตัวให้กับคนแปลกหน้า ควรหรือไม่',
                'q3': 'การตั้งเวลาการใช้อินเทอร์เน็ตให้เหมาะสม ควรหรือไม่',
                'q4': 'การใช้ภาษาหยาบคายในแชทหรือโลกโซเชียล ควรหรือไม่'
            };

            // อ่านคำถามออกเสียง
            const speech = new SpeechSynthesisUtterance(questionText[questionId]);
            speech.lang = 'th-TH'; // ภาษาไทย
            window.speechSynthesis.speak(speech);
        }

        // อ่านคำชี้แจงอัตโนมัติเมื่อโหลดหน้าเว็บ
        window.onload = function() {
            const speech = new SpeechSynthesisUtterance('คำชี้แจง : เลือกคำตอบที่เหมาะสมจากตัวเลือก');
            speech.lang = 'th-TH'; // ภาษาไทย
            window.speechSynthesis.speak(speech);
        }
		// ฟังก์ชันหยุดเสียงเมื่อไปยังหน้าใหม่
function stopSpeech() {
    window.speechSynthesis.cancel();
}

// เรียกใช้ฟังก์ชัน stopSpeech เมื่อหน้าโหลดหรือย้ายไปหน้าถัดไป
window.onbeforeunload = function() {
    stopSpeech();
};
let timeLeft = 240; // 4 นาที = 240 วินาที
    const timerDisplay = document.getElementById('timer-box1_7');

    function startTimer() {
        const countdown = setInterval(() => {
            let minutes = Math.floor(timeLeft / 60);
            let seconds = timeLeft % 60;
            timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

            if (timeLeft <= 0) {
                clearInterval(countdown);
                alert('⏳ เวลาหมดแล้ว! กรุณากด "ส่งคำตอบ"');
            }

            timeLeft--;
        }, 1000);
    }

    window.onload = function() {
        startTimer();
        const speech = new SpeechSynthesisUtterance('คำชี้แจง : เลือกคำตอบที่เหมาะสมจากตัวเลือก');
        speech.lang = 'th-TH'; 
        window.speechSynthesis.speak(speech);
    };
    </script>

</body>
</html>
