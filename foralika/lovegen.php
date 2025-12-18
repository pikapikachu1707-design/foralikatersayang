<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== "playground") {
    header("Location: login.php");
    exit;
}

// inisialisasi daftar pesan cinta
if (!isset($_SESSION['love_messages'])) {
    $_SESSION['love_messages'] = [
        "Aku sayang kamu lebih dari kata bisa menggambarkan 💕",
        "Kamu adalah alasan aku tersenyum setiap hari 😊",
        "Cintaku padamu tak akan pernah habis, selamanya 💖",
        "Bersamamu adalah bagian terbaik dari hidupku ✨",
        "Aku beruntung punya kamu di sisiku 💝"
    ];
}

// tambah pesan baru
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['new_message'])) {
    $msg = htmlspecialchars($_POST['new_message']);
    if ($msg !== "") {
        $_SESSION['love_messages'][] = $msg;
    }
}

// hapus pesan
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if (isset($_SESSION['love_messages'][$id])) {
        unset($_SESSION['love_messages'][$id]);
        $_SESSION['love_messages'] = array_values($_SESSION['love_messages']);
    }
}

// generate pesan random
$generated = "";
if (isset($_GET['generate'])) {
    if (!empty($_SESSION['love_messages'])) {
        $generated = $_SESSION['love_messages'][array_rand($_SESSION['love_messages'])];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Love Generator</title>
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
    
    /* Efek untuk kartu pesan */
    .message-card {
      transition: all 0.3s ease;
      border-radius: 16px;
      overflow: hidden;
      position: relative;
      background: white;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    
    .message-card:hover {
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
    
    /* Efek untuk generate button */
    .generate-button {
      transition: all 0.3s ease;
      border-radius: 50px;
      padding: 16px 32px;
      background: linear-gradient(135deg, #f43f5e, #ff1493);
      color: white;
      font-weight: 700;
      font-size: 1.2rem;
      box-shadow: 0 10px 25px rgba(244, 63, 94, 0.3);
      border: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      position: relative;
      overflow: hidden;
    }
    
    .generate-button:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.4);
    }
    
    .generate-button::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(
        45deg,
        transparent 30%,
        rgba(255, 255, 255, 0.5) 50%,
        transparent 70%
      );
      transform: rotate(45deg) translateX(-100%);
      animation: glitter 3s infinite;
    }
    
    @keyframes glitter {
      0% {
        transform: rotate(45deg) translateX(-100%);
      }
      100% {
        transform: rotate(45deg) translateX(100%);
      }
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
    
    /* Efek untuk generated message */
    .generated-message {
      background: linear-gradient(135deg, #fff0f5, #ffffff);
      border-radius: 16px;
      padding: 24px;
      margin-top: 24px;
      box-shadow: 0 10px 25px rgba(244, 63, 94, 0.15);
      position: relative;
      overflow: hidden;
      border: 2px solid rgba(255, 255, 255, 0.8);
      font-family: 'Dancing Script', cursive;
      font-size: 1.5rem;
      color: #ff1493;
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }
    
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }
    
    /* Efek untuk message list */
    .message-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 16px;
    }
    
    .message-item {
      background: linear-gradient(135deg, #fff0f5, #ffffff);
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 8px 20px rgba(244, 63, 94, 0.15);
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.8);
      transition: all 0.3s ease;
    }
    
    .message-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(244, 63, 94, 0.25);
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
    
    /* Efek untuk love generator container */
    .generator-container {
      background: linear-gradient(135deg, #fff0f5, #ffffff);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.2);
      position: relative;
      overflow: hidden;
      border: 2px solid rgba(255, 255, 255, 0.8);
      text-align: center;
    }
    
    .generator-container::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="none"/><path d="M0,0 L100,100 M0,100 L100,0" stroke="rgba(244,63,94,0.05)" stroke-width="0.5"/></svg>');
      opacity: 0.4;
      z-index: 0;
    }
    
    .generator-content {
      position: relative;
      z-index: 1;
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
          Love Generator <span class="dancing-emoji">💡</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">💕</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">💖</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">💝</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Dapatkan pesan cinta random untuk pasanganmu <span class="dancing-emoji">😘</span>
        </p>
      </div>

      <!-- Generate button -->
      <div class="generator-container mb-8 relative overflow-hidden">
        <!-- Heart decoration -->
        <div class="heart-decoration" style="top: 20%; left: 10%; font-size: 24px; animation-delay: 0s;">❤️</div>
        <div class="heart-decoration" style="top: 40%; right: 15%; font-size: 20px; animation-delay: 1s;">💕</div>
        <div class="heart-decoration" style="bottom: 30%; left: 20%; font-size: 22px; animation-delay: 2s;">💖</div>
        <div class="heart-decoration" style="bottom: 10%; right: 10%; font-size: 26px; animation-delay: 3s;">💗</div>
        
        <div class="generator-content">
          <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center justify-center">
            <span class="dancing-emoji mr-3">💖</span> Generator Pesan Cinta
          </h2>
          
          <a href="?generate=1" class="generate-button">
            <span>Generate Love</span>
            <span class="dancing-emoji">💕</span>
          </a>
          
          <?php if ($generated): ?>
            <div class="generated-message">
              <div class="text-5xl mb-4 dancing-emoji">💝</div>
              <p><?= $generated ?></p>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <!-- Tambah pesan -->
      <div class="container mb-8 relative overflow-hidden">
        <!-- Heart decoration -->
        <div class="heart-decoration" style="top: 15%; left: 5%; font-size: 28px; animation-delay: 0.5s;">❤️</div>
        <div class="heart-decoration" style="top: 60%; right: 8%; font-size: 24px; animation-delay: 1.5s;">💕</div>
        
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">➕</span> Tambah Pesan Cinta
        </h2>
        <form method="POST" class="space-y-6">
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Pesan Cinta Baru</label>
            <textarea name="new_message" placeholder="Tulis kata manis baru..." required
                      class="form-textarea"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="love-button">
              <span>Simpan Pesan</span>
              <span class="dancing-emoji">💖</span>
            </button>
          </div>
        </form>
      </div>

      <!-- Daftar pesan -->
      <div class="container relative overflow-hidden">
        <!-- Heart decoration -->
        <div class="heart-decoration" style="top: 15%; left: 8%; font-size: 24px; animation-delay: 0.7s;">❤️</div>
        <div class="heart-decoration" style="bottom: 25%; right: 12%; font-size: 22px; animation-delay: 1.7s;">💕</div>
        
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">📜</span> Daftar Pesan Cinta
        </h2>
        
        <div class="message-list">
          <?php foreach ($_SESSION['love_messages'] as $i => $msg): ?>
            <div class="message-item">
              <div class="flex justify-between items-start mb-3">
                <div class="text-2xl dancing-emoji" style="animation-delay: <?php echo $i * 0.2; ?>s;">💕</div>
                <a href="?delete=<?= $i ?>" class="delete-button" title="Hapus pesan">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </div>
              <p class="text-gray-700"><?= $msg ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-12 text-white">
        <p class="text-lg">Cinta kita tak terbatas <span class="dancing-emoji">💝</span></p>
      </div>
    </div>
  </div>

  <!-- Notification -->
  <div id="notification" class="notification">
    <div class="text-2xl dancing-emoji">💡</div>
    <div>
      <p class="font-bold" id="notification-title">Pesan Ditambahkan!</p>
      <p class="text-sm text-gray-500" id="notification-message">Pesan cinta telah ditambahkan</p>
    </div>
  </div>

  <script>
    // Show notification when message is added
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