<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== "playground") {
    header("Location: login.php");
    exit;
}

// inisialisasi memorybox
if (!isset($_SESSION['memorybox'])) {
    $_SESSION['memorybox'] = [];
}

// tambah memory baru
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['title']) && isset($_POST['message'])) {
    $title   = htmlspecialchars($_POST['title']);
    $message = htmlspecialchars($_POST['message']);
    $_SESSION['memorybox'][] = ["title" => $title, "message" => $message];
}

// hapus memory
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if (isset($_SESSION['memorybox'][$id])) {
        unset($_SESSION['memorybox'][$id]);
        $_SESSION['memorybox'] = array_values($_SESSION['memorybox']);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Memory Box</title>
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
    
    /* Efek untuk kartu memory */
    .memory-card {
      transition: all 0.3s ease;
      border-radius: 16px;
      overflow: hidden;
      position: relative;
      background: white;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    
    .memory-card:hover {
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
    
    /* Efek untuk view button */
    .view-button {
      transition: all 0.3s ease;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(79, 70, 229, 0.1);
      color: #4f46e5;
    }
    
    .view-button:hover {
      background: rgba(79, 70, 229, 0.2);
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
    
    /* Efek untuk memory box */
    .memory-box {
      background: linear-gradient(135deg, #fff0f5, #ffffff);
      border-radius: 16px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 10px 25px rgba(244, 63, 94, 0.15);
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.8);
    }
    
    .memory-box::before {
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
    
    .memory-content {
      position: relative;
      z-index: 1;
    }
    
    /* Efek untuk pesan tersembunyi */
    .hidden-message {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.5s ease;
      opacity: 0;
    }
    
    .hidden-message.show {
      max-height: 200px;
      opacity: 1;
      margin-top: 15px;
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
    
    /* Efek untuk gift decoration */
    .gift-decoration {
      position: absolute;
      color: rgba(244, 63, 94, 0.7);
      animation: giftFloat 4s linear infinite;
      z-index: 0;
    }
    
    @keyframes giftFloat {
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
          Memory Box <span class="dancing-emoji">🎁</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">💌</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🎁</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">💝</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Simpan kenangan & pesan rahasia di sini <span class="dancing-emoji">💌</span>
        </p>
      </div>

      <!-- Form tambah memory -->
      <div class="container mb-8 relative overflow-hidden">
        <!-- Gift decoration -->
        <div class="gift-decoration" style="top: 20%; left: 10%; font-size: 24px; animation-delay: 0s;">🎁</div>
        <div class="gift-decoration" style="top: 40%; right: 15%; font-size: 20px; animation-delay: 1s;">💌</div>
        <div class="gift-decoration" style="bottom: 30%; left: 20%; font-size: 22px; animation-delay: 2s;">💝</div>
        <div class="gift-decoration" style="bottom: 10%; right: 10%; font-size: 26px; animation-delay: 3s;">🎀</div>
        
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">➕</span> Tambah Memory
        </h2>
        <form method="POST" class="space-y-6">
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Judul Memory</label>
            <input type="text" name="title" placeholder="Judul Memory" required
                   class="form-input">
          </div>
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Pesan Spesial</label>
            <textarea name="message" placeholder="Pesan spesial..." required
                      class="form-textarea"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="love-button">
              <span>Simpan Memory</span>
              <span class="dancing-emoji">💖</span>
            </button>
          </div>
        </form>
      </div>

      <!-- Daftar memory -->
      <div class="container relative overflow-hidden">
        <!-- Gift decoration -->
        <div class="gift-decoration" style="top: 15%; left: 5%; font-size: 28px; animation-delay: 0.5s;">🎁</div>
        <div class="gift-decoration" style="top: 60%; right: 8%; font-size: 24px; animation-delay: 1.5s;">💌</div>
        <div class="gift-decoration" style="bottom: 20%; left: 15%; font-size: 22px; animation-delay: 2.5s;">💝</div>
        
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">📦</span> Kotak Kenangan
        </h2>
        
        <?php if (empty($_SESSION['memorybox'])): ?>
          <div class="text-center py-12">
            <div class="text-6xl mb-4 dancing-emoji">🎁</div>
            <p class="text-xl text-gray-600">Belum ada memory, ayo simpan pesan pertama <span class="dancing-emoji">💖</span></p>
          </div>
        <?php else: ?>
          <div class="space-y-4">
            <?php foreach ($_SESSION['memorybox'] as $i => $mem): ?>
              <div class="memory-box">
                <div class="memory-content">
                  <div class="flex justify-between items-center mb-3">
                    <div class="flex items-center">
                      <div class="mr-3 text-2xl dancing-emoji" style="animation-delay: <?php echo $i * 0.2; ?>s;">📌</div>
                      <h3 class="font-bold text-lg text-gray-800"><?= $mem['title'] ?></h3>
                    </div>
                    <div class="flex space-x-2">
                      <button onclick="toggleMessage(<?= $i ?>)" class="view-button" title="Lihat pesan">
                        <i class="fas fa-eye"></i>
                      </button>
                      <a href="?delete=<?= $i ?>" class="delete-button" title="Hapus memory">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </div>
                  </div>
                  <div id="msg-<?= $i ?>" class="hidden-message bg-white p-4 rounded-lg border-2 border-pink-100">
                    <p class="text-gray-700"><?= $mem['message'] ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-12 text-white">
        <p class="text-lg">Kenangan kita abadi selamanya <span class="dancing-emoji">💝</span></p>
      </div>
    </div>
  </div>

  <!-- Notification -->
  <div id="notification" class="notification">
    <div class="text-2xl dancing-emoji">🎁</div>
    <div>
      <p class="font-bold" id="notification-title">Memory Ditambahkan!</p>
      <p class="text-sm text-gray-500" id="notification-message">Memory telah ditambahkan ke kotak kenangan</p>
    </div>
  </div>

  <script>
    function toggleMessage(id) {
      const box = document.getElementById("msg-" + id);
      box.classList.toggle("show");
    }
    
    // Show notification when memory is added
    document.querySelector('form[method="POST"]').addEventListener('submit', function() {
      setTimeout(() => {
        const notification = document.getElementById('notification');
        notification.classList.add('show');
        
        setTimeout(() => {
          notification.classList.remove('show');
        }, 3000);
      }, 500);
    });
    
    // Create floating gifts
    function createGift() {
      const gift = document.createElement("div");
      gift.className = "gift-decoration";
      gift.innerHTML = ["🎁", "💌", "💝", "🎀", "💖"][Math.floor(Math.random() * 5)];
      gift.style.left = Math.random() * window.innerWidth + "px";
      gift.style.fontSize = (Math.random() * 10 + 15) + "px";
      gift.style.animationDuration = (Math.random() * 3 + 2) + "s";
      document.body.appendChild(gift);
      
      setTimeout(() => {
        gift.remove();
      }, 5000);
    }
    
    // Create gifts periodically
    setInterval(createGift, 2000);
  </script>
</body>
</html>