<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เนื้อเรื่อง</title>
<link rel="stylesheet" href="styleLesson1.6.css"> <!-- เชื่อมกับไฟล์ CSS -->
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

        /* ปุ่มต่อไป */
        .buttoninput_extest1_6 {
            padding: 10px 30px;
            font-size: 22px;
            border: none;
            color: aliceblue;
            background-color: #EB4343;
            cursor: pointer;
            border-radius: 15px;
            margin-top: 640px;
            width: 90%; /* ให้ปุ่มยาวเต็มพื้นที่ */
            max-width: 150px; /* กำหนดความยาวสูงสุดของปุ่ม */
            display: block; /* ให้ปุ่มแสดงในบรรทัดใหม่ */
            margin-left: auto; /* จัดปุ่มให้อยู่ตรงกลาง */
            margin-right: auto; /* จัดปุ่มให้อยู่ตรงกลาง */
        }

        .buttoninput_extest1_6:hover {
            background-color: #45a049;
        }

        /* ปรับสไตล์ของปุ่มเมื่อถูกล็อค */
        .buttoninput_extest1_6:disabled {
            background-color: #D3D3D3; /* สีเทา */
            cursor: not-allowed; /* เปลี่ยนเคอร์เซอร์เป็นแบบไม่สามารถคลิกได้ */
        }

        #timer-box1_6 {
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
<div class="lesson-box1_6">
    <strong>2.ใช้ภาษาสุภาพในการสื่อสารออนไลน์</strong><p>  
    <br>2.1 ช่วยให้การสื่อสารเป็นไปในทางที่ดีและไม่เกิดความขัดแย้ง<br>การใช้ภาษาที่สุภาพและมีมารยาทในการสื่อสารออนไลน์จะช่วยให้ผู้รับสารรู้สึกดีและไม่ถูกทำให้รู้สึกไม่สบายใจ ซึ่งจะทำให้การสื่อสารนั้นเป็นไปในทางที่บวกมากขึ้น</p> 
    <br><strong>3.จำกัดเวลาใช้งานอินเทอร์เน็ต</strong> <p> 
    <br>3.1 การจำกัดเวลาในการใช้งานอินเทอร์เน็ตเป็นวิธีที่ช่วยให้เราใช้เวลาในการทำกิจกรรมต่างๆ ได้อย่างสมดุล <br>โดยเฉพาะในยุคที่เทคโนโลยีมีบทบาทในชีวิตประจำวัน การใช้งานอินเทอร์เน็ตมากเกินไปอาจส่งผลกระทบต่อร่างกายและจิตใจ</p>
</div>
<img src="../../picture_all/รูปนักเรียนรวม.png" alt="รูปภาพ" class="image2_extest1_6">

<div class="audio-control">
    <button onclick="speakText()"> 🔊ช่วยอ่าน </button>
</div>

<!-- กล่องจับเวลา -->
<div id="timer-box1_6">03:00</div>

<script>
    // ฟังก์ชันอ่านออกเสียง
    function speakText() {
        let text = document.querySelector(".lesson-box1_6").innerText;
        let speech = new SpeechSynthesisUtterance();
        speech.lang = "th-TH"; // ภาษาไทย
        speech.text = text;
        speech.rate = 0.8; // ความเร็วปกติ
        speech.pitch = 1; // ระดับเสียงปกติ

        // รอให้เสียงโหลดก่อน
        let voices = window.speechSynthesis.getVoices();
        if (voices.length === 0) {
            setTimeout(function() {
                voices = window.speechSynthesis.getVoices();
                setVoice(speech, voices);
                window.speechSynthesis.speak(speech);
            }, 100);
        } else {
            setVoice(speech, voices);
            window.speechSynthesis.speak(speech);
        }

        // ล็อคปุ่ม "ต่อไป" เมื่อเริ่มพูด
        document.querySelector(".buttoninput_extest1_6").disabled = true;

        // ปลดล็อคปุ่ม "ต่อไป" เมื่อพูดเสร็จ
        speech.onend = function() {
            document.querySelector(".buttoninput_extest1_6").disabled = false;
        };
    }

    // ฟังก์ชันตั้งค่าเสียง
    function setVoice(speech, voices) {
        let femaleVoice = voices.find(voice => voice.lang === "th-TH" && voice.name.toLowerCase().includes('หญิง'));
        if (femaleVoice) {
            speech.voice = femaleVoice;
        }
    }

    window.onload = function() {
        speakText(); // อ่านออกเสียงอัตโนมัติเมื่อโหลดหน้า
        startTimer(); // เริ่มจับเวลา
    };

    // ฟังก์ชันจับเวลา 3 นาที
    function startTimer() {
        let timeRemaining = 180; // 3 นาที
        let timerBox = document.getElementById('timer-box1_6');

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
    <input type="submit" class="buttoninput_extest1_6" formaction="Lesson1.7.php" formmethod="POST" value="ต่อไป">
</form>

<img src="../../picture_all/ครูผช2-Photoroom.png" alt="รูปภาพ" class="image1_extest1_6">
</body>
</html>
