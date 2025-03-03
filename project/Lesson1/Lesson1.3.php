<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรมระหว่างเรียน</title>
    <link rel="stylesheet" href="styleLesson1.3.css">
    <style>
        p {
            color: black;
        }
        h3 {
            color: white;
            font-size: 20px;
        }
        body { font-family: Arial, sans-serif; padding: 20px; position: relative; }
        .drag-container { display: flex; gap: 20px; flex-wrap: wrap; }
        .draggable { width: 300px; height: 70px; background-color: #4CAF50; color: white; text-align: center; line-height: 40px; cursor: pointer; border-radius: 5px; }
        .drop-zone-container { display: flex; gap: 20px; margin-top: 20px; }
        .drop-zone { width: 500px; height: 300px; border: 2px dashed #ccc; border-radius: 5px; padding: 10px; font-size: 23px; overflow-y: auto; }
        textarea { width: 100%; height: 100%; padding: 10px; font-size: 14px; border: none; resize: none; }
        .score-board { margin-top: 20px; font-size: 18px; font-weight: bold; }
        .lesson1_3 { font-size: 20px; }

        body {
            background-image: url("../../picture_all/วอลอวกาศ.png");
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden; /* ป้องกันการเลื่อนหน้าจอ */
        }

        .submit-button {
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
        .submit-button:hover {
            background-color: #45a049;
        }

        .action-button {
            padding: 12px 25px;
            background-color: #4CAF50;  /* สีเขียว */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            text-align: center;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .action-button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .action-button:active {
            background-color: #3d8a3b;
            transform: scale(0.98);
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

        .read-button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
            align-items: center; /* ให้อยู่กึ่งกลาง */
        }

        .read-button1 {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #9FD4A3;
            color: black;
            border-radius: 8px;
            cursor: pointer;
            position: fixed;
            bottom: 20px;
            left: 20px;
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

        .draggable-container {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .help-button-container {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 10;
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
    <div class="lesson1_3">
        <h1> 🎲 กิจกรรม ทำความเข้าใจกับปัญหา 🎲</h1>
    </div>
    
    <h3>⚠️<strong>คำชี้แจง</strong> ให้นักเรียน ลาก-วาง ปัญหาลงในช่องที่นักเรียนคิดว่า ปลอดภัย และ ไม่ปลอดภัย ⚠️</h3>

    <div class="audio-control">
        <button class="read-button1" onclick="readInstructions()">🔊ช่วยอ่าน</button>
    </div>

    <div class="drag-container">
        <div class="draggable-container">
            <div id="homework" class="draggable" draggable="true" data-score="1">โพสต์ข้อมูลส่วนตัวละเอียดเกินไป</div>
            <button class="read-button" onclick="readItem('โพสต์ข้อมูลส่วนตัวละเอียดเกินไป')">🎤อ่านโจทย์</button>
        </div>
        <div class="draggable-container">
            <div id="dataprivace" class="draggable" draggable="true" data-score="1">ใช้ภาษาสุภาพในแชท</div>
            <button class="read-button" onclick="readItem('ใช้ภาษาสุภาพในแชท')">🎤อ่านโจทย์</button>
        </div>
        <div class="draggable-container">
            <div id="datawebsite" class="draggable" draggable="true" data-score="1">จำกัดเวลาเล่นอินเทอร์เน็ต</div>
            <button class="read-button" onclick="readItem('จำกัดเวลาเล่นอินเทอร์เน็ต')">🎤อ่านโจทย์</button>
        </div>
    </div>

    <div class="drop-zone-container">
        <div id="share-zone" class="drop-zone">
            <p><strong>ปลอดภัย:</strong></p>
            <textarea style="color: black" placeholder="สิ่งที่ปลอดภัยลากมาที่นี่" readonly></textarea>
        </div>
        <div id="no-share-zone" class="drop-zone">
            <p><strong>ไม่ปลอดภัย:</strong></p>
            <textarea style="color: black" placeholder="สิ่งที่ไม่ปลอดภัยลากมาที่นี่" readonly></textarea>
        </div>
    </div>

    <div class="score-board" style="display: none;">
        <p>คะแนน: <span id="total-score">0</span></p>
    </div>

    <button class="submit-button" onclick="sendScoreToDatabase()">ส่งคำตอบ</button>
    
    <div id="timer-box1_1">03:00</div>

    <script>
        let totalScore = 0;
        const draggables = document.querySelectorAll('.draggable');
        const shareZone = document.getElementById('share-zone');
        const noShareZone = document.getElementById('no-share-zone');
        const scoreDisplay = document.getElementById('total-score');
        const correctShareItems = ['datawebsite', 'dataprivace']; // สิ่งที่ปลอดภัย
        const correctNoShareItems = ['homework']; // สิ่งที่ไม่ปลอดภัย

        function speakText(text) {
            var speech = new SpeechSynthesisUtterance(text);
            speech.lang = "th-TH"; // ตั้งค่าเสียงเป็นภาษาไทย
            speech.volume = 1; // ระดับเสียง
            speech.rate = 1; // ความเร็ว
            speech.pitch = 1; // ความสูงของเสียง
            window.speechSynthesis.speak(speech);
        }

        function readInstructions() {
            var instructionsText = "สวัสดีครับ นักเรียนให้นำข้อความที่เกี่ยวข้องกับความปลอดภัย และไม่ปลอดภัย ลากไปใส่ในช่องที่กำหนดนะครับ";
            speakText(instructionsText);
        }

        function readItem(itemText) {
            speakText(itemText);
        }

        draggables.forEach(item => {
            item.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text', e.target.id);
            });
        });

        shareZone.addEventListener('dragover', (e) => e.preventDefault());
        shareZone.addEventListener('drop', (e) => handleDrop(e, shareZone, correctShareItems));

        noShareZone.addEventListener('dragover', (e) => e.preventDefault());
        noShareZone.addEventListener('drop', (e) => handleDrop(e, noShareZone, correctNoShareItems));

        function handleDrop(e, dropZone, correctItems) {
            e.preventDefault();
            const draggedItemId = e.dataTransfer.getData('text');
            const draggedItem = document.getElementById(draggedItemId);
            if (!draggedItem) return;

            if (correctItems.includes(draggedItemId)) {
                if (dropZone === shareZone && correctItems === correctShareItems || dropZone === noShareZone && correctItems === correctNoShareItems) {
                    totalScore += parseInt(draggedItem.getAttribute('data-score'));
                }
                dropZone.querySelector('textarea').value += draggedItem.textContent + '\n';
                draggedItem.setAttribute('draggable', 'false');
                draggedItem.style.display = 'none';
            } else {
                dropZone.querySelector('textarea').value += draggedItem.textContent + '\n';
                draggedItem.setAttribute('draggable', 'false');
                draggedItem.style.display = 'none';
            }
        }

        function sendScoreToDatabase() {
            let formData = new FormData();
            formData.append('score', totalScore);

            fetch('Save_acti2_score1.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                window.location.href = "Lesson1.4.php";
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาด:', error);
            });
        }

        window.onload = function() {
            readInstructions();
            startTimer();
        };

        function stopSpeech() {
            window.speechSynthesis.cancel();
        }

        window.onbeforeunload = function() {
            stopSpeech();
        };

         let timeRemaining = 3 * 60; // 3 นาที
    const timerBox = document.getElementById('timer-box1_1');

    function startTimer() {
        const interval = setInterval(function() {
            let minutes = Math.floor(timeRemaining / 60);
            let seconds = timeRemaining % 60;
            timerBox.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timeRemaining--;
            if (timeRemaining < 0) {
                clearInterval(interval);
                timerBox.textContent = "หมดเวลา!";
                alert("หมดเวลา! กรุณาส่งคำตอบ.");
            }
        }, 1000);
    }
    </script>
</body>
</html>
