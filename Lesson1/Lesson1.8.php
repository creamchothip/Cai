<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เนื้อเรื่อง</title>
<link rel="stylesheet" href="styleLesson1.8.css"> <!-- เชื่อมกับไฟล์ CSS -->
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
		/* ปุ่มต่อไป */
.buttoninput_extest1_7{
    padding: 10px 30px;
    font-size: 22px;
    border: none;
    color: aliceblue;
    background-color: #EB4343;
    cursor: pointer;
    border-radius: 15px;
    margin-top: 680px;
    width: 90%;
    max-width: 150px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.buttoninput_extest1_7:hover {
    background-color: #45a049;
}

.buttoninput_extest1_7:disabled {
    background-color: #808080; /* สีเทาเมื่อถูกล็อค */
    cursor: not-allowed; /* เปลี่ยนเคอร์เซอร์เมื่อปุ่มถูกล็อค */
}

/* ปุ่มคำชี้แจง */
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
    color: black;
}

.audio-control button:hover {
    background-color: #FFF4C7;
}
		
.text_study1_8 {
    position: relative;
    top: 60px;
	background: #fff;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    width: 650px;
    max-width: 130%;
    text-align: center;
    margin-top: -80px;
	font-size: 30px;
    color: #000;
    font-weight: bold;
}
.image2_extest1_8 {
      left: 60px;
    top: 10px;
    width: 280px;
    height: auto;
    position: fixed;
    z-index: 10;
    border: none;
    mix-blend-mode: multiply;
}
.image1_Lesson1_8{
    position: fixed;
    right: 360px;
    top: 595px;
    width: 300px;
    height: auto;
}
	</style>
</head>
<body>
	<div class="text_study1_8">💡 เรามาสรุปสิ่งที่เรียนรู้กันวันนี้นะครับ 💡</div>
		<div class="lesson-box1_8">
    <p data-text="การใช้อินเทอร์เน็ตอย่างปลอดภัยต้องปฏิบัติตามกฎระเบียบและข้อควรระวัง เพื่อปกป้องข้อมูลส่วนตัว เช่น กำหนดเวลาใช้งานที่เหมาะสม       ตั้งค่าความเป็นส่วนตัวให้ปลอดภัย   ตรวจสอบข้อมูลก่อนใช้งาน ระมัดระวังการคลิกลิงก์ไม่รู้จัก และใช้รหัสผ่านที่ปลอดภัย นอกจากนี้ ควรใช้ภาษาสุภาพเมื่อสื่อสารออนไลน์   เพื่อสร้างบรรยากาศที่ดี และหลีกเลี่ยงความขัดแย้งในโลกดิจิทัล     จดจำสิ่งเหล่านี้และนำไปใช้ให้เกิดประโยชน์นะครับ"> 
    ✅ กำหนดเวลาใช้งานที่เหมาะสม<br>
    ✅ ตั้งค่าความเป็นส่วนตัวให้ปลอดภัย<br>
    ✅ ตรวจสอบข้อมูลก่อนใช้งาน<br>
    ✅ ระมัดระวังการคลิกลิงก์ไม่รู้จัก<br>
    ✅ ใช้รหัสผ่านที่ปลอดภัย <br><br>
    นอกจากนี้ ควรใช้ <strong>ภาษาสุภาพ</strong> เมื่อสื่อสารออนไลน์ เพื่อสร้างบรรยากาศที่ดี และ <strong>หลีกเลี่ยงความขัดแย้ง</strong> ในโลกดิจิทัล 😊<br><br>
    🎯 <strong>จดจำสิ่งเหล่านี้และนำไปใช้ให้เกิดประโยชน์นะครับ!</strong> 🚀
</p>

</div>
	<!-- ปุ่มคำชี้แจง -->
		<div class="audio-control">
        <button onclick= "speakText()">🔊ช่วยอ่าน</button></div>
		
	
    <!-- กล่องจับเวลา -->
<div id="timer-box1_8">02:00</div>
<script>
        function speakText() {
            let text = document.querySelector(".lesson-box1_8 p").dataset.text;
            let speech = new SpeechSynthesisUtterance();
            speech.lang = "th-TH";
            speech.text = text;
            speech.rate = 0.8;
            speech.pitch = 1;

            let voices = window.speechSynthesis.getVoices();
            let femaleVoice = voices.find(voice => voice.name.toLowerCase().includes('หญิง') || voice.name.toLowerCase().includes('female'));
            if (femaleVoice) {
                speech.voice = femaleVoice;
            }

            // ล็อคปุ่ม "ต่อไป" เมื่อเริ่มพูด
            let nextButton = document.querySelector(".buttoninput_extest1_7");
            nextButton.disabled = true;

            // เปลี่ยนสีปุ่มเป็นเทา
            nextButton.style.backgroundColor = "#808080";

            // ปลดล็อคปุ่ม "ต่อไป" เมื่อพูดเสร็จ
            speech.onend = function() {
                nextButton.disabled = false;
                nextButton.style.backgroundColor = "#EB4343"; // เปลี่ยนกลับเป็นสีเดิม
            };

            // เริ่มการพูด
            window.speechSynthesis.speak(speech);
        }

        window.onload = function() {
            setTimeout(function() {
                speakText(); // เริ่มการพูดหลังจากโหลดหน้า
            }, 1000);  // ล่าช้าเล็กน้อยก่อนเริ่มพูด
            startTimer();
        };

        function startTimer() {
            let timeRemaining = 120;
            let timerBox = document.getElementById('timer-box1_8');

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

        function padTime(time) {
            return time < 10 ? '0' + time : time;
        }

function stopSpeech() {
    window.speechSynthesis.cancel();
}

window.onbeforeunload = function() {
    stopSpeech();
};

    </script>

	    <!-- ปุ่มเริ่มสอบ -->
	<form method="post">
    <input type="submit" class="buttoninput_extest1_7" formaction="Lesson1.9.php" formmethod="POST" value="ต่อไป">
</form>

<img src="../../picture_all/แชร์โพสต์.png" alt="รูปภาพ" class="image1_Lesson1_8">
<img src="../../vedio_all/อวกาศ.gif" alt="รูปภาพ" class="image3">
	
</body>
</html>
