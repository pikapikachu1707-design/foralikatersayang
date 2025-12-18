<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== "playground") {
    header("Location: login.php");
    exit;
}

// inisialisasi timeline di session
if (!isset($_SESSION['timeline'])) {
    $_SESSION['timeline'] = [];
}

// tambah cerita baru
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['date']) && isset($_POST['story'])) {
    $date  = htmlspecialchars($_POST['date']);
    $story = htmlspecialchars($_POST['story']);
    $_SESSION['timeline'][] = ["date" => $date, "story" => $story];
    // urutkan berdasarkan tanggal
    usort($_SESSION['timeline'], function($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    });
}

// hapus cerita
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if (isset($_SESSION['timeline'][$id])) {
        unset($_SESSION['timeline'][$id]);
        $_SESSION['timeline'] = array_values($_SESSION['timeline']);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Timeline Kisah</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Dancing+Script:wght@700&display=swap');
    
    body {
      font-family: 'Quicksand', sans-serif;
    }
    
    /* Background animasi */
    .animated-bg {
      background: linear-gradient(-45deg, #ffb6c1, #ffc0cb, #ff69b4, #ff1493);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
    }
    
    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
    
    /* Animasi untuk emoji */
    .dancing-emoji {
      display: inline-block;
      animation: dance 1.5s infinite;
    }
    
    @keyframes dance {
      0%, 100% {
        transform: rotate(0deg) scale(1);
      }
      25% {
        transform: rotate(10deg) scale(1.1);
      }
      50% {
        transform: rotate(0deg) scale(1);
      }
      75% {
        transform: rotate(-10deg) scale(1.1);
      }
    }
    
    /* Animasi bounce */
    .bounce-animation {
      animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-20px);
      }
    }
    
    /* Efek floating */
    .floating {
      animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-15px);
      }
    }
    
    /* Efek pulse */
    .pulse-animation {
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
      100% {
        transform: scale(1);
      }
    }
    
    /* Efek untuk kartu timeline */
    .timeline-card {
      transition: all 0.3s ease;
      border-radius: 16px;
      overflow: hidden;
      position: relative;
    }
    
    .timeline-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(255, 105, 180, 0.3);
    }
    
    /* Efek untuk form */
    .form-input {
      transition: all 0.3s ease;
      border-radius: 12px;
      border: 2px solid rgba(244, 63, 94, 0.3);
      padding: 12px 16px;
      width: 100%;
      font-size: 1rem;
      background: rgba(255, 255, 255, 0.9);
    }
    
    .form-input:focus {
      border-color: #f43f5e;
      box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.2);
      outline: none;
      transform: scale(1.02);
    }
    
    .form-textarea {
      transition: all 0.3s ease;
      border-radius: 12px;
      border: 2px solid rgba(244, 63, 94, 0.3);
      padding: 12px 16px;
      width: 100%;
      font-size: 1rem;
      background: rgba(255, 255, 255, 0.9);
      min-height: 120px;
      resize: vertical;
    }
    
    .form-textarea:focus {
      border-color: #f43f5e;
      box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.2);
      outline: none;
      transform: scale(1.02);
    }
    
    /* Efek untuk tombol */
    .love-button {
      transition: all 0.3s ease;
      border-radius: 12px;
      padding: 12px 24px;
      background: #f43f5e;
      color: white;
      font-weight: 600;
      box-shadow: 0 8px 20px rgba(244, 63, 94, 0.2);
      border: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    
    .love-button:hover {
      background: #ff1493;
      transform: translateY(-3px);
      box-shadow: 0 12px 25px rgba(244, 63, 94, 0.3);
    }
    
    /* Efek untuk delete button */
    .delete-button {
      transition: all 0.3s ease;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(239, 68, 68, 0.1);
      color: #ef4444;
    }
    
    .delete-button:hover {
      background: rgba(239, 68, 68, 0.2);
      transform: scale(1.1);
    }
    
    /* Efek untuk container */
    .container {
      background: rgba(255, 255, 255, 0.85);
      backdrop-blur-md;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.2);
      padding: 25px;
      border: 2px solid rgba(255, 255, 255, 0.5);
    }
    
    /* Efek untuk timeline */
    .timeline-line {
      position: relative;
      padding-left: 40px;
    }
    
    .timeline-line::before {
      content: '';
      position: absolute;
      left: 15px;
      top: 0;
      height: 100%;
      width: 4px;
      background: linear-gradient(to bottom, #f43f5e, #ff1493);
      border-radius: 4px;
    }
    
    .timeline-item {
      position: relative;
      margin-bottom: 30px;
    }
    
    .timeline-item::before {
      content: '';
      position: absolute;
      left: -32px;
      top: 10px;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: #f43f5e;
      border: 4px solid white;
      box-shadow: 0 0 0 4px rgba(244, 63, 94, 0.2);
      z-index: 1;
    }
    
    .timeline-content {
      background: white;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      position: relative;
    }
    
    .timeline-content::after {
      content: '';
      position: absolute;
      left: -10px;
      top: 20px;
      width: 20px;
      height: 20px;
      background: white;
      transform: rotate(45deg);
      box-shadow: -5px 5px 10px rgba(0, 0, 0, 0.05);
    }
    
    /* Efek untuk notifikasi */
    .notification {
      position: fixed;
      top: 20px;
      right: 20px;
      padding: 16px 24px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      z-index: 50;
      display: flex;
      align-items: center;
      gap: 12px;
      transform: translateX(400px);
      transition: transform 0.3s ease;
    }
    
    .notification.show {
      transform: translateX(0);
    }
    
    /* Efek untuk heart decoration */
    .heart-decoration {
      position: absolute;
      color: rgba(244, 63, 94, 0.7);
      animation: heartFloat 4s linear infinite;
      z-index: 0;
    }
    
    @keyframes heartFloat {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(-100px) rotate(20deg);
        opacity: 0;
      }
    }
  </style>
</head>
<body class="animated-bg min-h-screen flex">
  <?php include "sidebar_2.php"; ?>

  <div class="ml-0 md:ml-64 flex-1 p-6">
    <div class="max-w-4xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12 mt-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 bounce-animation">
          Timeline Kisah <span class="dancing-emoji">⏳</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">📖</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">💕</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">🌹</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Catat perjalanan cinta kalian dari awal hingga sekarang <span class="dancing-emoji">💕</span>
        </p>
      </div>

      <!-- Form tambah cerita -->
      <div class="container mb-8 relative overflow-hidden">
        <!-- Heart decoration -->
        <div class="heart-decoration" style="top: 20%; left: 10%; font-size: 24px; animation-delay: 0s;">❤️</div>
        <div class="heart-decoration" style="top: 40%; right: 15%; font-size: 20px; animation-delay: 1s;">💕</div>
        <div class="heart-decoration" style="bottom: 30%; left: 20%; font-size: 22px; animation-delay: 2s;">💖</div>
        <div class="heart-decoration" style="bottom: 10%; right: 10%; font-size: 26px; animation-delay: 3s;">💗</div>
        
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">➕</span> Tambah Momen
        </h2>
        <form method="POST" class="space-y-6">
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Tanggal Momen</label>
            <input type="date" name="date" required
                   class="form-input">
          </div>
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Cerita Momen</label>
            <textarea name="story" placeholder="Ceritakan momen spesial..." required
                      class="form-textarea"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="love-button">
              <span>Simpan Momen</span>
              <span class="dancing-emoji">💖</span>
            </button>
          </div>
        </form>
      </div>

      <!-- Timeline -->
      <div class="container relative overflow-hidden">
        <!-- Heart decoration -->
        <div class="heart-decoration" style="top: 15%; left: 5%; font-size: 28px; animation-delay: 0.5s;">❤️</div>
        <div class="heart-decoration" style="top: 60%; right: 8%; font-size: 24px; animation-delay: 1.5s;">💕</div>
        <div class="heart-decoration" style="bottom: 20%; left: 15%; font-size: 22px; animation-delay: 2.5s;">💖</div>
        
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">📖</span> Cerita Kita
        </h2>
        
        <?php if (empty($_SESSION['timeline'])): ?>
          <div class="text-center py-12">
            <div class="text-6xl mb-4 dancing-emoji">📝</div>
            <p class="text-xl text-gray-600">Belum ada cerita, ayo tambahkan momen pertama kalian <span class="dancing-emoji">💖</span></p>
          </div>
        <?php else: ?>
          <div class="timeline-line">
            <?php foreach ($_SESSION['timeline'] as $i => $event): ?>
              <div class="timeline-item">
                <div class="timeline-content">
                  <div class="flex justify-between items-start mb-2">
                    <div class="flex items-center">
                      <div class="mr-3 text-2xl dancing-emoji" style="animation-delay: <?php echo $i * 0.2; ?>s;">📅</div>
                      <p class="font-bold text-rose-600"><?= date("d M Y", strtotime($event['date'])) ?></p>
                    </div>
                    <a href="?delete=<?= $i ?>" class="delete-button" title="Hapus cerita">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                  <p class="text-gray-700"><?= $event['story'] ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-12 text-white">
        <p class="text-lg">Kisah kita terus berlanjut <span class="dancing-emoji">💝</span></p>
      </div>
    </div>
  </div>

  <!-- Notification -->
  <div id="notification" class="notification">
    <div class="text-2xl dancing-emoji">📖</div>
    <div>
      <p class="font-bold" id="notification-title">Momen Ditambahkan!</p>
      <p class="text-sm text-gray-500" id="notification-message">Momen telah ditambahkan ke timeline</p>
    </div>
  </div>

  <script>
    // Show notification when story is added
    document.querySelector('form[method="POST"]').addEventListener('submit', function() {
      setTimeout(() => {
        const notification = document.getElementById('notification');
        notification.classList.add('show');
        
        setTimeout(() => {
          notification.classList.remove('show');
        }, 3000);
      }, 500);
    });
    
    // Create floating hearts
    function createHeart() {
      const heart = document.createElement("div");
      heart.className = "heart-decoration";
      heart.innerHTML = ["❤️", "💕", "💖", "💗", "💓"][Math.floor(Math.random() * 5)];
      heart.style.left = Math.random() * window.innerWidth + "px";
      heart.style.fontSize = (Math.random() * 10 + 15) + "px";
      heart.style.animationDuration = (Math.random() * 3 + 2) + "s";
      document.body.appendChild(heart);
      
      setTimeout(() => {
        heart.remove();
      }, 5000);
    }
    
    // Create hearts periodically
    setInterval(createHeart, 2000);
  </script>
</body>
</html>