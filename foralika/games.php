<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== "playground") {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Mini Game Lucu</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Dancing+Script:wght=700&display=swap');
    
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
    
    /* Efek untuk hati */
    .heart {
      position: absolute;
      font-size: 2.5rem;
      cursor: pointer;
      transition: transform 0.2s, opacity 0.3s;
      user-select: none;
      z-index: 10;
    }
    
    .heart:hover { 
      transform: scale(1.3); 
      filter: drop-shadow(0 0 10px rgba(255, 105, 180, 0.7));
    }
    
    .pop { 
      transform: scale(2); 
      opacity: 0; 
    }
    
    /* Efek untuk floating emoji */
    .floating-emoji {
      position: absolute;
      font-size: 1.5rem;
      animation: floatUp 6s linear infinite;
      opacity: 0.7;
      user-select: none;
      z-index: 5;
    }
    
    @keyframes floatUp {
      0% { 
        transform: translateY(0) rotate(0deg); 
        opacity: 0.8; 
      }
      100% { 
        transform: translateY(-600px) rotate(20deg); 
        opacity: 0; 
      }
    }
    
    /* Efek untuk partikel */
    .particle {
      position: absolute;
      pointer-events: none;
      opacity: 0;
      z-index: 20;
    }
    
    @keyframes particleAnimation {
      0% {
        transform: translate(0, 0);
        opacity: 1;
      }
      100% {
        transform: translate(var(--x), var(--y));
        opacity: 0;
      }
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
    
    /* Efek untuk game area */
    .game-area {
      background: linear-gradient(135deg, #fff0f5, #ffffff);
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.2);
      position: relative;
      overflow: auto;
      height: 600px;
      border: 2px solid rgba(255, 255, 255, 0.8);
    }
    
    /* Efek untuk score board */
    .score-board {
      background: linear-gradient(135deg, #fff0f5, #ffffff);
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.2);
      padding: 25px;
      border: 2px solid rgba(255, 255, 255, 0.8);
      position: relative;
      overflow: hidden;
    }
    
    .score-board::before {
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
    
    .score-content {
      position: relative;
      z-index: 1;
    }
    
    /* Efek untuk reset button */
    .reset-button {
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
    
    .reset-button:hover {
      background: #ff1493;
      transform: translateY(-3px);
      box-shadow: 0 12px 25px rgba(244, 63, 94, 0.3);
    }
    
    /* Efek untuk score display */
    .score-display {
      font-family: 'Dancing Script', cursive;
      font-size: 4rem;
      font-weight: 700;
      color: #ff1493;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    /* Efek untuk game instructions */
    .instructions {
      background: rgba(255, 255, 255, 0.7);
      backdrop-blur-md;
      border-radius: 16px;
      padding: 16px;
      margin-bottom: 20px;
      box-shadow: 0 8px 20px rgba(244, 63, 94, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.8);
    }
  </style>
</head>
<body class="animated-bg min-h-screen flex relative"> <!-- HAPUS overflow-hidden -->
  <?php include "sidebar_2.php"; ?>

  <div class="ml-0 md:ml-64 flex-1 p-6 pb-10"> <!-- Tambahkan pb-10 agar footer tidak tertutup -->
    <div class="max-w-4xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-8 mt-4">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 bounce-animation">
          Mini Game <span class="dancing-emoji">🎮</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-4">
          <span class="text-4xl dancing-emoji">💖</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🎯</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">🎮</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Klik hati warna-warni buat kumpulin skor sebanyak-banyaknya <span class="dancing-emoji">✨</span>
        </p>
      </div>

      <!-- Instructions -->
      <div class="instructions text-center">
        <h3 class="text-lg font-semibold text-rose-700 mb-2">Cara Bermain</h3>
        <p class="text-gray-700">Klik pada hati yang muncul secara acak untuk mendapatkan poin. Semakin banyak hati yang kamu klik, semakin tinggi skormu!</p>
      </div>

      <!-- Skor -->
      <div class="score-board mb-6 text-center">
        <div class="score-content">
          <h2 class="text-2xl font-bold text-rose-600 mb-4 flex items-center justify-center">
            <span class="dancing-emoji mr-3">🏆</span> Skor Kamu
          </h2>
          <p id="score" class="score-display">0</p>
          <button onclick="resetGame()" class="reset-button mt-4">
            <span>Reset Game</span>
            <span class="dancing-emoji">🔄</span>
          </button>
        </div>
      </div>

      <!-- Area Game -->
      <div id="game-area" class="game-area">
        <!-- Hati akan muncul di sini -->
        <div class="absolute inset-0 flex items-center justify-center text-gray-300 text-lg" id="game-message">
          Klik "Reset Game" untuk memulai!
        </div>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-8 text-white">
        <p class="text-lg">Selamat bermain dan semangat! <span class="dancing-emoji">💕</span></p>
      </div>
    </div>
  </div>

  <script>
    let score = 0;
    const scoreDisplay = document.getElementById("score");
    const gameArea = document.getElementById("game-area");
    const gameMessage = document.getElementById("game-message");
    const hearts = ["❤️","🧡","💛","💚","💙","💜","🤍","💖","💘","💝","💗","💓","💞"];

    // buat hati random
    function spawnHeart() {
      const heart = document.createElement("div");
      heart.classList.add("heart");
      heart.innerHTML = hearts[Math.floor(Math.random() * hearts.length)];

      const x = Math.random() * (gameArea.clientWidth - 50);
      const y = Math.random() * (gameArea.clientHeight - 50);
      heart.style.left = `${x}px`;
      heart.style.top = `${y}px`;

      heart.onclick = function() {
        score++;
        scoreDisplay.innerText = score;
        heart.classList.add("pop");
        
        // Create particles
        createParticles(x + 25, y + 25);
        
        setTimeout(() => heart.remove(), 300);
        
        // Spawn new heart
        setTimeout(() => spawnHeart(), 200);
      };

      // Auto remove after 5 seconds if not clicked
      setTimeout(() => {
        if (heart.parentNode) {
          heart.style.opacity = "0";
          setTimeout(() => heart.remove(), 300);
          setTimeout(() => spawnHeart(), 200);
        }
      }, 5000);

      gameArea.appendChild(heart);
    }

    // Create particle effects
    function createParticles(x, y) {
      const colors = ['#ff1493', '#ff69b4', '#ffb6c1', '#ffc0cb'];
      const particleCount = 15;
      
      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement("div");
        particle.classList.add("particle");
        
        // Random position in a circle
        const angle = Math.random() * Math.PI * 2;
        const radius = Math.random() * 50 + 20;
        const posX = Math.cos(angle) * radius;
        const posY = Math.sin(angle) * radius;
        
        particle.style.setProperty('--x', `${posX}px`);
        particle.style.setProperty('--y', `${posY}px`);
        particle.style.left = `${x}px`;
        particle.style.top = `${y}px`;
        particle.style.width = '10px';
        particle.style.height = '10px';
        particle.style.borderRadius = '50%';
        particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        particle.style.animation = 'particleAnimation 0.8s ease-out forwards';
        
        gameArea.appendChild(particle);
        
        setTimeout(() => particle.remove(), 800);
      }
    }

    // reset game
    function resetGame() {
      score = 0;
      scoreDisplay.innerText = score;
      gameArea.innerHTML = "";
      gameMessage.style.display = "none";
      
      // Spawn initial hearts
      for (let i = 0; i < 8; i++) {
        setTimeout(() => spawnHeart(), i * 200);
      }
    }

    // emoji random ngambang
    function floatingEmoji() {
      const emojiList = ["🎵","💕","✨","🌸","🥰","💖","🎉","🎊","🌟","⭐"];
      const emoji = document.createElement("div");
      emoji.classList.add("floating-emoji");
      emoji.innerText = emojiList[Math.floor(Math.random() * emojiList.length)];
      emoji.style.left = Math.random() * window.innerWidth + "px";
      emoji.style.bottom = "-50px";
      emoji.style.fontSize = Math.random() * 20 + 20 + "px";
      document.body.appendChild(emoji);
      setTimeout(() => emoji.remove(), 6000);
    }

    setInterval(floatingEmoji, 1500);
  </script>
</body>
</html>