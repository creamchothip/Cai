<!DOCTYPE html> 
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรมลากคำตอบ</title>
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
        .text_study1_2 {
            font-size: 30px;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            width: 950px;
            max-width: 90%;
            text-align: center;
            margin-top: 20px;
        }
		h1{
			font-size: 25px;
		}
        #question-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            width: 80%;
            margin-top: 20px;
        }
        .quiz-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            border: 2px solid #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 45%;
            text-align: center;
        }
		.quiz-box p{
            font-size: 18px;
        }
        .drop-zone {
            min-height: 50px;
            padding: 10px;
            border: 2px dashed #007bff;
            margin-top: 10px;
            background-color: #f8f9fa;
        }
        .draggable {
            display: inline-block;
            background-color: #E18AAA;
            color: black;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            cursor: grab;
			font-size: 18px;
        }

        .score-display {
            margin-top: 20px;
            font-size: 20px;
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
		                .read-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #9FD4A3;
            color: black;
            border-radius: 8px;
            cursor: pointer;
        }


        .read-button:hover {
            background-color: #C8E6B2;
        }
.buttoninput_study1_2{
    padding: 10px 30px;
    font-size: 18px;
    border: none;
    color: aliceblue;
    background-color: #EB4343;
    cursor: pointer;
    border-radius: 15px;
    margin-top: 20px;
    width: 90%; /* ให้ปุ่มยาวเต็มพื้นที่ */
    max-width: 150px; /* กำหนดความยาวสูงสุดของปุ่ม */
    display: block; /* ให้ปุ่มแสดงในบรรทัดใหม่ */
    margin-left: auto; /* จัดปุ่มให้อยู่ตรงกลาง */
    margin-right: auto; /* จัดปุ่มให้อยู่ตรงกลาง */
}
.buttoninput_study1_2:hover {
    background-color: #45a049;
}
		h1{
			color: white;
			font-size: 20px;
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
    <div class="text_study1_2"> ꔛ💡กิจกรรม: การลากคำตอบเพื่อแก้ไขปัญหาการใช้อินเทอร์เน็ต ꔛ💡</div>
	<h1> คำชี้แจง: นักเรียนลากคำตอบที่ถูกต้องไปยังช่องว่างที่กำหนด</h1>
    <div id="question-container">
        <div class="quiz-box">
            <p><strong>ข้อที่ 1 ปานควร</strong> <span class="drop-zone" ondrop="drop(event)" ondragover="allowDrop(event)" id="zone1"></span> <strong>ก่อนโพสต์ข้อมูลส่วนตัว</strong></p>
            <button class="read-button" onclick="readItem('ข้อที่ 1 ปานควร ก่อนโพสต์ข้อมูลส่วนตัว')">🎤 ช่วยอ่านข้อที่ 1</button>
        </div>
        <div class="quiz-box">
            <p><strong>ข้อที่ 2 นิตควร</strong> <span class="drop-zone" ondrop="drop(event)" ondragover="allowDrop(event)" id="zone2"></span> <strong>เพื่อป้องกันผลกระทบจากการใช้หน้าจอมากเกินไป</strong></p>
            <button class="read-button" onclick="readItem('ข้อที่ 2 นิตควร เพื่อป้องกันผลกระทบจากการใช้หน้าจอมากเกินไป')">🎤 ช่วยอ่านข้อที่ 2</button>
        </div>
        <div class="quiz-box">
            <p><strong>ข้อที่ 3 น้ำควร</strong> <span class="drop-zone" ondrop="drop(event)" ondragover="allowDrop(event)" id="zone3"></span> <strong>เมื่อพิมพ์ข้อความในแชท</strong></p>
            <button class="read-button" onclick="readItem('ข้อที่ 3 น้ำควร เมื่อพิมพ์ข้อความในแชท')">🎤 ช่วยอ่านข้อที่ 3</button>
        </div>
    </div>
    <div>
        <span class="draggable" draggable="true" ondragstart="drag(event)" id="answer1">พิจารณาความเสี่ยง</span>
        <span class="draggable" draggable="true" ondragstart="drag(event)" id="answer2">จำกัดเวลาเล่น</span>
        <span class="draggable" draggable="true" ondragstart="drag(event)" id="answer3">ใช้ภาษาสุภาพ</span>
    </div>
    <button class="buttoninput_study1_2" onclick="checkAnswers()">ส่งคำตอบ</button>
	<div id="timer-box1_1">03:00</div>


    <div id="result" class="score-display"></div> <!-- แสดงผลคะแนน -->

    
	<div class="audio-control">
        <button onclick="readItem('ข้อที่ 1 ปานควร ก่อนโพสต์ข้อมูลส่วนตัว')">🔊ช่วยอ่าน</button>
    </div>

    <script>
		window.onload = function() {
    var introText = "ยินดีต้อนรับสู่กิจกรรมการลากคำตอบ เพื่อแก้ไขปัญหาการใช้อินเทอร์เน็ต โปรดลากคำตอบที่ถูกต้องไปยังช่องว่างที่กำหนด";
    var speech = new SpeechSynthesisUtterance(introText);
    speech.lang = "th-TH";
    window.speechSynthesis.speak(speech);
};

        // ฟังก์ชันที่ใช้เพื่ออนุญาตการลากไปยัง drop zone
        function allowDrop(event) {
            event.preventDefault(); // ยกเลิกการกระทำของเบราว์เซอร์ที่มาตรฐานไม่อนุญาต
        }

        // ฟังก์ชันที่ใช้เมื่อเริ่มการลาก
        function drag(event) {
            event.dataTransfer.setData("text", event.target.id); // จัดเก็บข้อมูล ID ขององค์ประกอบที่ถูกลาก
        }

        // ฟังก์ชันที่ใช้เมื่อปล่อยองค์ประกอบลงบน drop zone
        function drop(event) {
            event.preventDefault();
            let data = event.dataTransfer.getData("text"); // ดึงข้อมูลที่เก็บไว้เมื่อเริ่มลาก
            let droppedElement = document.getElementById(data); // หาองค์ประกอบที่ถูกลาก
            let targetZone = event.target; // โซนที่ถูกปล่อย

            // ให้คำตอบสามารถลากกลับไปที่เดิมได้
            if (droppedElement.parentNode !== targetZone) {
                if (targetZone.hasChildNodes()) {
                    // หากมีองค์ประกอบใน drop-zone แล้ว ให้ย้ายคำตอบกลับไปยังตำแหน่งเดิม
                    let previousZone = droppedElement.parentNode;
                    previousZone.appendChild(droppedElement);
                } else {
                    targetZone.appendChild(droppedElement);
                }
            }

            droppedElement.setAttribute("draggable", "true"); // ทำให้คำตอบสามารถลากใหม่ได้
        }

        // ฟังก์ชันอ่านคำชี้แจง
        function readItem(itemText) {
            var speech = new SpeechSynthesisUtterance(itemText);
            speech.lang = "th-TH";
            window.speechSynthesis.speak(speech);
        }

        function checkAnswers() {
            let answers = document.querySelectorAll(".drop-zone");
            let correctAnswers = ["answer1", "answer2" , "answer3"];
            let score = 0;

            answers.forEach((zone, index) => {
                // ถ้าในช่องมีคำตอบที่ถูกต้อง ก็ให้คะแนน
                if (zone.children.length > 0 && zone.children[0].id === correctAnswers[index]) {
                    score++;
                }
            });

            // ส่งคะแนนไปยัง PHP ผ่าน AJAX
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "Save_acti3_score1.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function() {
                if (xhr.status === 200) {
                    let response = xhr.responseText;
                    // แสดงผลคะแนนจากเซิร์ฟเวอร์
                    // เมื่อเสร็จแล้วจะเปลี่ยนไปหน้าถัดไป
                    window.location.href = "Lesson1.5.php"; // เปลี่ยน URL ไปที่หน้าถัดไป
                }
            };

            // ส่งคะแนนผ่าน POST
            xhr.send("score=" + score);
        }
		// ฟังก์ชันหยุดเสียงเมื่อไปยังหน้าใหม่
function stopSpeech() {
    window.speechSynthesis.cancel();
}

// เรียกใช้ฟังก์ชัน stopSpeech เมื่อหน้าโหลดหรือย้ายไปหน้าถัดไป
window.onbeforeunload = function() {
    stopSpeech();
};
let timeRemaining = 180; // 3 นาที = 180 วินาที

function updateTimer() {
    const minutes = Math.floor(timeRemaining / 60);
    const seconds = timeRemaining % 60;
    document.getElementById("timer-box1_1").textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    
    if (timeRemaining <= 0) {
        clearInterval(timerInterval);
        alert("หมดเวลา! กรุณากด 'ส่งคำตอบ'");
        checkAnswers(); // เรียกฟังก์ชันตรวจสอบคำตอบเมื่อหมดเวลา
    } else {
        timeRemaining--;
    }
}

// เริ่มการนับถอยหลังเมื่อโหลดหน้าเว็บ
window.onload = function() {
    var introText = "ยินดีต้อนรับสู่กิจกรรมการลากคำตอบ เพื่อแก้ไขปัญหาการใช้อินเทอร์เน็ต โปรดลากคำตอบที่ถูกต้องไปยังช่องว่างที่กำหนด";
    var speech = new SpeechSynthesisUtterance(introText);
    speech.lang = "th-TH";
    window.speechSynthesis.speak(speech);

    // เริ่มการนับถอยหลัง
    timerInterval = setInterval(updateTimer, 1000); // อัพเดททุกๆ 1 วินาที
};


    </script>
</body>
</html>