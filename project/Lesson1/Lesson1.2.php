<?php
session_start();
if (!isset($_SESSION['stp3_name'])) {
    echo "⚠ ไม่พบชื่อ กรุณากรอกชื่อในหน้าแรก";
    exit();
}
$stp3_name = $_SESSION['stp3_name']; // ดึงชื่อจาก session
// ตรวจสอบค่าที่ส่งมาจากหน้าแรก
$Ans_PB1_1 = isset($_POST['Ans_PB1']) ? intval($_POST['Ans_PB1']) : 0;
$Ans_PB1_2 = isset($_POST['Ans_PB2']) ? intval($_POST['Ans_PB2']) : 0;
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>เนื้อหาเรื่องที่ 1</title>
<link rel="stylesheet" href="styleLesson1.2.css">
	<style>
		.content-container1_2 {
    display: flex;
    flex-direction: column;
    align-items: center; /* จัดให้อยู่กลางแนวนอน */
    justify-content: center; /* จัดให้อยู่กลางแนวตั้ง */
    gap: 100px; /* ระยะห่างระหว่างวิดีโอและกล่องตัวเลือก */
    margin-top: -100px;
    height: 100vh; /* ให้มีความสูงเต็มหน้าจอ */
			
}
	.text_study1_2 {
    font-size: 20px;
    background: #fff;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    width: 1000px; /* ลดความกว้างลง */
    height: 50px;
    max-width: 80%; /* ปรับขนาดอัตโนมัติตามหน้าจอ */
    text-align: center; /* จัดข้อความให้อยู่กลาง */
    margin-top: 100px;
    position: relative;
    left: 50%;
    transform: translateX(-50%); /* ย้ายกล่องให้ตรงกลาง */
    top: -30px;
		transform: translate(-50%, -50%); /* ใช้ translate เพื่อปรับให้อยู่ตรงกลางพอดี */
    z-index: 999; /* ป้องกันไม่ให้ถูกทับด้วยองค์ประกอบอื่น */
}

		.text_study1_2 h1 {
    font-size: 30px;
color: black;
}
	/* ปรับปรุงการจัดวางกล่องคำถาม */
	body {
    background-image: url("../../picture_all/วอลอวกาศ.png");
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
    margin: 0;
    font-family: Arial, sans-serif;
    align-items: center; /* จัดให้อยู่กลางแนวตั้ง */
    height: 100vh; /* ใช้ความสูงของ viewport */
    overflow: hidden; /* ป้องกันการเลื่อนหน้าจอ */
}

.quiz-box {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    border: 2px solid #007bff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 750px; /* กำหนดความกว้าง */
    height: 300px;
    text-align: left;
    margin-top: 20px; /* เพิ่มระยะห่างระหว่างกล่อง */
    margin-left: 20px; /* ระยะห่างจากขอบซ้าย */
    margin-right: 20px; /* ระยะห่างจากขอบขวา */
    font-size: 23px;
}

		.quiz-box legend{
			font-size: 23px;
		}
		.quiz-box label	{
			font-size: 20px;
		}
		
/* ปรับปุ่ม "อ่านโจทย์นี้" ให้เท่ากันและมีอิโมจิ */
/* ปรับแต่งปุ่ม */
.read-btn {
    padding: 10px 20px;
    background-color: #6BA08A; /* สีพื้นหลังปกติ */
    color: white; /* สีตัวอักษะเป็นขาว */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, color 0.3s ease;
    display: block;
    margin: 20px auto; /* จัดกลางในแนวนอน */
    text-align: center; /* ให้อิโมจิอยู่กลาง */
    width: 50%; /* กำหนดความกว้างของปุ่ม */
}

/* เมื่อวางเมาส์ไปที่ปุ่ม */
.read-btn:hover {
    background-color: #C6D9BB; /* สีพื้นหลังเมื่อ hover */
    color: black; /* เปลี่ยนสีตัวอักษะเป็นสีดำ */
}

/* เมื่อปุ่มถูกกด */
.read-btn:active {
    background-color: #C6D9BB; /* เปลี่ยนสีพื้นหลังเมื่อกด */
    color: black; /* สีตัวอักษะเมื่อกดเป็นสีดำ */
}

/* เพิ่มไอคอนอิโมจิ */
.read-btn::before {
    content: "🎤 "; /* ไอคอนอิโมจิ */
    font-size: 20px;
}


/* ปรับปุ่มส่งคำตอบให้ดูดี */
.buttoninput_study1_2 {
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
		
		
/* ปรับแต่งปุ่มควบคุม */
.control-button {
    padding: 10px 20px;
    background-color: #6BA08A; /* สีพื้นหลังปกติ */
    color: white; /* ตัวอักษะเป็นสีขาว */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* เมื่อวางเมาส์ไปที่ปุ่ม */
.control-button:hover {
    background-color: #92CA68; /* สีพื้นหลังเมื่อ hover */
    color: black; /* เปลี่ยนตัวอักษะเป็นสีดำ */
}

/* เมื่อกดปุ่ม */
.control-button:active {
    background-color: #C6D9BB; /* สีพื้นหลังเมื่อกด */
    color: black; /* ตัวอักษะเป็นสีดำเมื่อกด */
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
	<div class="text_study1_2">
	<h1 >👉🏻 สถานการณ์ที่ 1 ดูคลิปวิดีโอแล้วตอบคำถาม 👈</h1>
	</div>
    
    <!-- ฟอร์มคำถาม -->
    <form action="Save_acti1_score1.php" method="POST" id="question-form" style="display:none;">
        <!-- ส่งชื่อไปด้วย -->
        <input type="hidden" name="stp3_name" value="<?php echo $stp3_name; ?>">
        <input type="hidden" name="Ans_PB1" value="<?php echo $Ans_PB1_1; ?>">
        <input type="hidden" name="Ans_PB2" value="<?php echo $Ans_PB1_2; ?>">
        <div id="question-container">
            <div class="quiz-box">
                <legend>1. การเล่นอินเทอร์เน็ตนานเกินไปจะส่งผลเสียอย่างไร ?</legend>
                <label><input type="radio" name="Ans_PB1" value="1" required> ก.  ทำให้เสียสุขภาพ </label><br>
                <label><input type="radio" name="Ans_PB1" value="0" required> ข.  เพิ่มความสนุกสนาน</label><br>
                <button type="button" class="read-btn" data-text="1. การเล่นอินเทอร์เน็ตนานเกินไปจะส่งผลเสียอย่างไร? ก.ไก่  ทำให้เสียสุขภาพ ข.ไข่  เพิ่มความสนุกสนาน">อ่านโจทย์นี้</button>
            </div>
            <div class="quiz-box">
                <legend>2. น้ำควรทำอย่างไรเมื่อใช้แชทกับเพื่อนๆ ?</legend>
                <label><input type="radio" name="Ans_PB2" value="1" required> ก.  ควรใช้ภาษาที่สุภาพ</label><br>
                <label><input type="radio" name="Ans_PB2" value="0" required> ข.  ใช้ภาษาที่หยาบคาย</label><br>
                <button type="button" class="read-btn" data-text="2. น้ำควรทำอย่างไรเมื่อใช้แชทกับเพื่อนๆ? ก.ไก่  ควรใช้ภาษาที่สุภาพ ข.ไข่  ใช้ภาษาที่หยาบคาย">อ่านโจทย์นี้</button>
            </div>
        </div>
		<!-- ปุ่มช่วยอ่าน (เปิดเสียงใหม่เมื่อกด) -->
    
        <input class="buttoninput_study1_2" name="submit" type="submit" value="ส่งคำตอบ">
    </form>
<div class="audio-control">
        <button id="mute-button" onclick="toggleSpeech()">🔊ช่วยอ่าน</button>
    </div>
    <div class="content-container1_2">
        <?php
        $file = '../../vedio_all/วิดีโอที่ 1.mp4';
        if (file_exists($file)) {
            echo '<video id="lesson-video" width="850" height="570" muted>';
            echo '<source src="' . $file . '" type="video/mp4">';
            echo 'เบราว์เซอร์ของคุณไม่รองรับการเล่นวิดีโอ';
            echo '</video>';
        } else {
            echo '<p>ไม่พบไฟล์วิดีโอ</p>';
        }
        ?>

        <!-- ปุ่มควบคุมเสียงของวิดีโอ -->
<div id="custom-controls">
    <button id="custom-play-button" class="control-button">▶ เริ่มดูวิดีโอ</button>
    <button id="mute-video-button" class="control-button">🔇 ปิดเสียง</button>
</div>

        <!-- ฟอร์มคำถาม -->
        <form action="Save_acti1_score1.php" method="POST" id="question-form" style="display:none;">
            <!-- ส่งชื่อไปด้วย -->
            <input type="hidden" name="stp3_name" value="<?php echo $stp3_name; ?>">
            <input type="hidden" name="Ans_PB1" value="<?php echo $Ans_PB1_1; ?>">
            <input type="hidden" name="Ans_PB2" value="<?php echo $Ans_PB1_2; ?>">
            <div id="question-container">
                <h1 class="text_study1_2">👉🏻 <strong>คำชี้แจง</strong> เลือกคำตอบที่ถูกที่สุด เพียงข้อเดียว 👈</h1>
                <div class="quiz-box">
                    <legend>1. การเล่นอินเทอร์เน็ตนานเกินไปจะส่งผลเสียอย่างไร ?</legend>
                    <label><input type="radio" name="Ans_PB1" value="1" required> ก.ไก่  ทำให้เสียสุขภาพ </label><br>
                    <label><input type="radio" name="Ans_PB1" value="0" required> ข.ไข่  เพิ่มความสนุกสนานตัว</label><br>
                </div>
                <div class="quiz-box">
                    <legend>2. น้ำควรทำอย่างไรเมื่อใช้แชทกับเพื่อนๆ ?</legend>
                    <label><input type="radio" name="Ans_PB2" value="1" required> ก.ไก่  ใช้ภาษาสุภาพอนุญาต</label><br>
                    <label><input type="radio" name="Ans_PB2" value="0" required> ข.ไข่  ใช้ภาษาหยาบคาย</label><br>
                </div>
                <input class="buttoninput_study1_2" name="submit" type="submit" value="ส่งคำตอบ">
            </div>
        </form>
    </div>
	 <!-- กล่องจับเวลา -->
    <div id="timer-box1_1">03:00</div>
    <script>
		
		var isSpeaking = false;  // เพิ่มตัวแปรเพื่อตรวจสอบสถานะการพูด

    // ฟังก์ชันช่วยอ่านเมื่อกดปุ่ม
    function toggleSpeech() {
        var text = "สวัสดีครับ ให้นักเรียนเริ่มดูคลิปวิดีโอ และเมื่อดูคลิปวิดีโอเสร็จให้นักเรียนตอบคำถาม 2 ข้อด้วยนะครับ";  // กำหนดข้อความที่จะอ่าน
        var speech = new SpeechSynthesisUtterance(text);
        speech.lang = "th-TH";  // ตั้งค่าเสียงให้เป็นภาษาไทย
        speech.volume = 1;  // ระดับเสียง
        speech.rate = 1;  // ความเร็วในการพูด
        speech.pitch = 1;  // ความสูงของเสียง

        if (isSpeaking) {
            window.speechSynthesis.cancel();  // หยุดการอ่านออกเสียง
        } else {
            window.speechSynthesis.speak(speech);  // เริ่มอ่านออกเสียง
        }
        isSpeaking = !isSpeaking;  // สลับสถานะ
    }
 
document.addEventListener("DOMContentLoaded", function() {
    var video = document.getElementById("lesson-video");
    var playButton = document.getElementById("custom-play-button");
    var muteButton = document.getElementById("mute-video-button");
    var videoContainer = document.querySelector('.content-container1_2');
    var questionForm = document.getElementById("question-form");  // กำหนดตัวแปรอ้างอิงถึงฟอร์มคำถาม
    var lastTime = 0;

    // ตั้งค่าเสียงเริ่มต้นเป็น 50%
    video.volume = 0.5;

    playButton.addEventListener("click", function() {
        video.play();
        playButton.style.display = "none";
    });

    muteButton.addEventListener("click", function() {
        video.muted = !video.muted;
        muteButton.textContent = video.muted ? "🔇 ปิดเสียง" : "🔊 เปิดเสียง";
    });

    // ป้องกันการข้ามเวลา
    video.addEventListener("timeupdate", function() {
        if (video.currentTime > lastTime + 2) {
            video.currentTime = lastTime;
        } else {
            lastTime = video.currentTime;
        }
    });

    // เมื่อวิดีโอเล่นจบ
    video.addEventListener("ended", function() {
        // ซ่อนวิดีโอ
        videoContainer.style.display = "none";
        
        // แสดงฟอร์มคำถาม
        questionForm.style.display = "block";  // แสดงฟอร์มคำถาม
    });

    // ป้องกันการคลิกขวาที่วิดีโอ
    video.addEventListener("contextmenu", function(event) {
        event.preventDefault();
    });
});

    // หยุดเสียงเมื่อหน้าเว็บถูกปิดหรือไปหน้าถัดไป
    window.onbeforeunload = function() {
        window.speechSynthesis.cancel();  // หยุดการอ่านออกเสียง
    };
function toggleSpeech() {
    var text = "สวัสดีครับ ให้นักเรียนเริ่มดูคลิปวิดีโอ และเมื่อดูคลิปวิดีโอเสร็จให้นักเรียนตอบคำถาม 2 ข้อด้วยนะครับ";  // กำหนดข้อความที่จะอ่าน
    var speech = new SpeechSynthesisUtterance(text);
    speech.lang = "th-TH";  // ตั้งค่าเสียงให้เป็นภาษาไทย
    speech.volume = 1;  // ระดับเสียง
    speech.rate = 1;  // ความเร็วในการพูด
    speech.pitch = 1;  // ความสูงของเสียง

    if (isSpeaking) {
        window.speechSynthesis.cancel();  // หยุดการอ่านออกเสียง
    } else {
        window.speechSynthesis.speak(speech);  // เริ่มอ่านออกเสียง
    }
    isSpeaking = !isSpeaking;  // สลับสถานะ
}
document.addEventListener("DOMContentLoaded", function() {
    // เริ่มต้นการพูดเสียง AI ทันทีเมื่อหน้าเว็บโหลด
    var introText = "สวัสดีครับ ให้นักเรียนเริ่มดูคลิปวิดีโอ" + "" + "และเมื่อดูคลิปวิดีโอเสร็จให้นักเรียนตอบคำถาม 2 ข้อด้วยนะครับ";
    var speech = new SpeechSynthesisUtterance(introText);
    speech.lang = "th-TH"; // ตั้งค่าเสียงให้เป็นภาษาไทย
    speech.volume = 1; // ระดับเสียง (0 - 1)
    speech.rate = 1; // ความเร็วในการพูด (0.1 - 10)
    speech.pitch = 1; // ความสูงของเสียง (0 - 2)
    
    // เริ่มการพูด
    window.speechSynthesis.speak(speech);
    
    // ฟังก์ชันช่วยอ่านเมื่อกดปุ่ม "อ่านโจทย์นี้"
    var readButtons = document.querySelectorAll('.read-btn');
    readButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var text = button.getAttribute('data-text');  // รับข้อความจาก attribute data-text
            var speech = new SpeechSynthesisUtterance(text);
            speech.lang = "th-TH";  // ตั้งค่าเสียงให้เป็นภาษาไทย
            speech.volume = 1;  // ระดับเสียง
            speech.rate = 1;  // ความเร็วในการพูด
            speech.pitch = 1;  // ความสูงของเสียง
            window.speechSynthesis.speak(speech);  // เริ่มอ่านออกเสียง
        });
    });
});

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
		document.addEventListener("DOMContentLoaded", function() {
    var timerBox = document.getElementById('timer-box1_1');
    var timeLeft = 180; // ตั้งค่าเวลาเริ่มต้นเป็น 180 วินาที (2 นาที 30 วินาที)

    function updateTimer() {
        var minutes = Math.floor(timeLeft / 60);  // คำนวณนาที
        var seconds = timeLeft % 60;  // คำนวณวินาที

        // แสดงผลในกล่องเวลา
        timerBox.textContent = minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

        // หยุดการนับถอยหลังเมื่อหมดเวลา
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            timerBox.textContent = "หมดเวลา!";
        } else {
            timeLeft--;  // ลดเวลา
        }
    }

    // ตั้งให้ทำการนับถอยหลังทุก 1 วินาที
    var timerInterval = setInterval(updateTimer, 1000);
});

</script>

</body>
</html>
