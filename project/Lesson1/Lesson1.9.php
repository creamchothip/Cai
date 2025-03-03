<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกกิจกรรมที่ 4</title>
    <style>
        /* พื้นหลัง */
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

        /* กล่องข้อความหลัก */
        .lesson-box1_9 {
            background-color: white;
            width: 80%;
            max-width: 1000px;
            min-height: 370px;
            height: auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            line-height: 1.8;
            text-align: justify;
        }
        .lesson-box1_9 p{
            font-size: 20px;
        }

        /* ช่องกรอกความคิดเห็น */
        .comment-box {
            width: 80%;
            max-width: 800px;
            min-height: 150px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            background-color: #f1f1f1;
            font-size: 16px;
        }

        .comment-box textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            resize: none;
        }

        .comment-box label {
            font-size: 18px;
            color: #333;
            display: block;
            margin-bottom: 10px;
        }

        /* ปุ่มส่งคำตอบ */
        .submit-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #EB4343;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            float: right; /* ปรับตำแหน่งปุ่มไปทางขวา */
        }

        .submit-button:hover {
            background-color: #45a049;
        }
	

        /* ปุ่มอ่านออกเสียง */
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
	

        /* กล่องจับเวลา */
        #timer-box1_9 {
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
		/* ให้ภาพอยู่ที่มุมบนขวา */
.img1 {
    position: fixed;
    top: 10px;
    right: 10px;
    z-index: 9999; /* เพื่อให้ภาพอยู่เหนือเนื้อหาทั้งหมด */
    background: none; /* ลบพื้นหลัง */
    border: none; /* ลบกรอบ */
	width: 350px;
}
/* ให้ภาพอยู่ที่มุมล่างซ้าย */
.img2 {
    position: fixed;
    bottom: 10px;
    left: 200px;
	top: 500px;
    z-index: 9999; /* เพื่อให้ภาพอยู่เหนือเนื้อหาทั้งหมด */
    background: none; /* ลบพื้นหลัง */
    border: none; /* ลบกรอบ */
	width: 300px;
}


    </style>
</head>

<body>
    <div class="lesson-box1_9">
        <p>นักเรียนคิดว่า การใช้อินเทอร์เน็ตอย่างปลอดภัยมีผลดีอย่างไรกับชีวิตของเรา? กรุณาแสดงความคิดเห็นลงในช่องด้านล่าง:</p>

        <!-- ฟอร์มกรอกความคิดเห็น -->
        <form method="post" action="save_comment1.php">
            <div class="comment-box">
                <label for="comment">พิมพ์คำตอบลงในช่องนี้:</label>
                <textarea id="comment" name="comment" required></textarea>
            </div>
            <button type="submit" class="submit-button">กดส่งคำตอบ</button>
        </form>
    </div>


<!-- ปุ่มคำชี้แจง -->
		<div class="audio-control">
        <button onclick= "speakText()">🔊ช่วยอ่าน</button></div>
		
    <!-- กล่องจับเวลา -->
    <div id="timer-box1_9">02:00</div>
	<img class="img1" src="../../vedio_all/ก้อนเมฆ2.gif">
	<img class="img2" src="../../picture_all/ก้อนหิน-Photoroom.png">
<script>
    // ฟังก์ชันอ่านออกเสียง
    function speakText() {
        let text = document.querySelector(".lesson-box1_9").innerText;
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
    }

    window.onload = function() {
        setTimeout(speakText, 1000); // อ่านออกเสียงอัตโนมัติเมื่อโหลดหน้า
        startTimer(); // เริ่มจับเวลา
    };

    // ฟังก์ชันจับเวลา 1 นาที
    function startTimer() {
        let timeRemaining = 120; // 60 วินาที
        let timerBox = document.getElementById('timer-box1_9');

        let interval = setInterval(function() {
            let minutes = Math.floor(timeRemaining / 60);
            let seconds = timeRemaining % 60;

            timerBox.textContent = `${padTime(minutes)}:${padTime(seconds)}`;

            if (timeRemaining <= 0) {
                clearInterval(interval);
				alert('⏳ เวลาหมดแล้ว! กรุณากด "ต่อไป"');
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
</body>
</html>
