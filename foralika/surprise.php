<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== "playground") {
    header("Location: login.php");
    exit;
}

// daftar pesan rahasia
$secret_messages = [
    "💖 Kamu adalah kejutan terindah dalam hidupku!",
    "🌹 Aku jatuh cinta padamu setiap hari lagi dan lagi.",
    "✨ Bersamamu, dunia terasa lebih indah.",
    "😍 Senyummu adalah alasan aku bahagia.",
    "💌 Cinta ini tak akan pernah habis, selamanya untukmu."
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Easter Egg</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
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
    
    /* Efek untuk surprise button */
    .surprise-button {
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
    
    .surprise-button:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.4);
    }
    
    .surprise-button::before {
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
    
    /* Efek untuk message box */
    .message-box {
      background: linear-gradient(135deg, #fff0f5, #ffffff);
      border-radius: 20px;
      padding: 30px;
      margin-top: 30px;
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.2);
      position: relative;
      overflow: hidden;
      border: 2px solid rgba(255, 255, 255, 0.8);
      font-family: 'Dancing Script', cursive;
      font-size: 2rem;
      color: #ff1493;
      text-align: center;
      max-width: 600px;
      animation: fadeIn 1s ease-in-out;
      display: none;
    }
    
    .message-box.show {
      display: block;
    }
    
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
    
    /* Efek untuk container */
    .container {
      background: rgba(255, 255, 255, 0.85);
      backdrop-blur-md;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.2);
      padding: 40px;
      border: 2px solid rgba(255, 255, 255, 0.5);
      position: relative;
      overflow: hidden;
      text-align: center;
    }
    
    .container::before {
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
    
    .container-content {
      position: relative;
      z-index: 1;
    }
    
    /* Efek untuk egg decoration */
    .egg-decoration {
      position: absolute;
      color: rgba(244, 63, 94, 0.7);
      animation: eggFloat 4s linear infinite;
      z-index: 0;
    }
    
    @keyframes eggFloat {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(-100px) rotate(20deg);
        opacity: 0;
      }
    }
    
    /* Efek untuk floating hearts */
    .floating-heart {
      position: fixed;
      bottom: -20px;
      font-size: 20px;
      color: rgba(255, 105, 180, 0.7);
      animation: floatUp 8s linear infinite;
      z-index: 0;
    }
    
    @keyframes floatUp {
      0% { 
        transform: translateY(0) rotate(0deg); 
        opacity: 1; 
      }
      100% { 
        transform: translateY(-100vh) rotate(360deg); 
        opacity: 0; 
      }
    }
  </style>
</head>
<body class="animated-bg min-h-screen flex relative"> <!-- HAPUS overflow-hidden -->
  <?php include "sidebar_2.php"; ?>

  <div class="ml-0 md:ml-64 flex-1 p-6 pb-10"> <!-- Tambahkan pb-10 agar footer tidak tertutup -->
    <div class="max-w-2xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 bounce-animation">
          Easter Egg <span class="dancing-emoji">🥚</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">🎁</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">✨</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">🎉</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Ada kejutan manis buatmu di sini <span class="dancing-emoji">✨</span>
        </p>
      </div>

      <!-- Main Content -->
      <div class="container relative overflow-hidden">
        <!-- Egg decoration -->
        <div class="egg-decoration" style="top: 20%; left: 10%; font-size: 24px; animation-delay: 0s;">🥚</div>
        <div class="egg-decoration" style="top: 40%; right: 15%; font-size: 20px; animation-delay: 1s;">🐣</div>
        <div class="egg-decoration" style="bottom: 30%; left: 20%; font-size: 22px; animation-delay: 2s;">🐥</div>
        <div class="egg-decoration" style="bottom: 10%; right: 10%; font-size: 26px; animation-delay: 3s;">🎁</div>
        
        <div class="container-content">
          <div class="text-5xl mb-6 dancing-emoji">🎁</div>
          <h2 class="text-2xl font-bold text-rose-600 mb-4">Kejutan Spesial Untukmu</h2>
          <p class="text-gray-700 mb-8">Klik tombol di bawah ini untuk membuka kejutan manis dariku 💕</p>
          
          <button onclick="showSurprise()" class="surprise-button">
            <span>Buka Kejutan</span>
            <span class="dancing-emoji">🎉</span>
          </button>
          
          <div id="message-box" class="message-box">
            <div class="text-5xl mb-4 dancing-emoji">💖</div>
            <p id="message-text"></p>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-12 text-white">
        <p class="text-lg">Cinta kita adalah kejutan terbaik <span class="dancing-emoji">💝</span></p>
      </div>
    </div>
  </div>

  <script>
    const messages = <?php echo json_encode($secret_messages); ?>;
    const msgBox = document.getElementById("message-box");
    const msgText = document.getElementById("message-text");

    function showSurprise() {
      // pilih pesan random
      const randomMsg = messages[Math.floor(Math.random() * messages.length)];
      msgText.innerText = randomMsg;
      msgBox.classList.add("show");

      // confetti effect
      confetti({
        particleCount: 150,
        spread: 100,
        origin: { y: 0.6 }
      });
      
      // Create hearts
      for (let i = 0; i < 10; i++) {
        setTimeout(() => {
          createHeart();
        }, i * 100);
      }
    }
    
    // Create floating hearts
    function createHeart() {
      const heart = document.createElement("div");
      heart.className = "floating-heart";
      heart.innerHTML = ["❤️","💕","💖","💗","💓"][Math.floor(Math.random() * 5)];
      heart.style.left = Math.random() * window.innerWidth + "px";
      heart.style.fontSize = (Math.random() * 10 + 15) + "px";
      document.body.appendChild(heart);
      
      setTimeout(() => {
        heart.remove();
      }, 8000);
    }
    
    // Create hearts periodically
    setInterval(createHeart, 600);
  </script>
</body>
</html>