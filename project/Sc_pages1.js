import javax.sound.sampled.*;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.IOException;

public class SoundPlayer extends JFrame {
    private Clip clip;
    private JButton playButton, stopButton;

    public SoundPlayer() {
        setTitle("เสียงประกอบบทเรียน");
        setSize(300, 150);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLayout(new FlowLayout());

        // โหลดไฟล์เสียง
        loadSound("lesson_audio.wav"); // ใส่ชื่อไฟล์เสียงของคุณ

        // ปุ่มเปิดเสียง
        playButton = new JButton("🔊 เปิดเสียง");
        playButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                playSound();
            }
        });

        // ปุ่มปิดเสียง
        stopButton = new JButton("🔇 ปิดเสียง");
        stopButton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                stopSound();
            }
        });

        // เพิ่มปุ่มเข้า GUI
        add(playButton);
        add(stopButton);
    }

    // โหลดไฟล์เสียง
    private void loadSound(String filePath) {
        try {
            File soundFile = new File(filePath);
            AudioInputStream audioStream = AudioSystem.getAudioInputStream(soundFile);
            clip = AudioSystem.getClip();
            clip.open(audioStream);
        } catch (UnsupportedAudioFileException | IOException | LineUnavailableException e) {
            e.printStackTrace();
        }
    }

    // เล่นเสียง
    private void playSound() {
        if (clip != null) {
            clip.setFramePosition(0); // เล่นใหม่ตั้งแต่ต้น
            clip.start();
        }
    }

    // หยุดเสียง
    private void stopSound() {
        if (clip != null && clip.isRunning()) {
            clip.stop();
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> {
            SoundPlayer player = new SoundPlayer();
            player.setVisible(true);
        });
    }
}
