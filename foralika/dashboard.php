<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Anniversary</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap');
    
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
    
    /* Kartu dengan efek hover */
    .dashboard-card {
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }
    
    .dashboard-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(255, 105, 180, 0.3);
      border-color: #ff69b4;
    }
    
    /* Efek glitter */
    .glitter {
      position: relative;
      overflow: hidden;
    }
    
    .glitter::after {
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
    
    /* Animasi untuk teks */
    .text-animation {
      background: linear-gradient(90deg, #ff1493, #ff69b4, #ff1493);
      background-size: 200% auto;
      color: transparent;
      -webkit-background-clip: text;
      background-clip: text;
      animation: text-shine 3s linear infinite;
    }
    
    @keyframes text-shine {
      to {
        background-position: 200% center;
      }
    }
  </style>
</head>
<body class="flex animated-bg min-h-screen">

  <?php include "sidebar.php"; ?>

  <!-- Konten -->
  <main class="ml-0 md:ml-64 p-6 flex-1">
    <div class="max-w-6xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12 mt-8">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 bounce-animation">
          Selamat Datang sayang akuu <span class="dancing-emoji">💖</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">🎉</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🥳</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">🎊</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Ini adalah halaman utama setelah login. Silakan pilih menu di sebelah kiri untuk melihat cerita kita <span class="dancing-emoji">💞</span>
        </p>
      </div>
      
      <!-- Kartu Dashboard -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <!-- Kartu 1 -->
        <div class="dashboard-card bg-white/90 backdrop-blur-md p-6 rounded-3xl shadow-lg">
          <div class="flex items-center mb-4">
            <div class="text-5xl mr-4 dancing-emoji">📸</div>
            <h3 class="text-xl font-bold text-rose-700">Foto Favorit</h3>
          </div>
          <p class="text-gray-600 mb-4">Lihat koleksi foto-foto favorit kita yang paling berkesan</p>
          <a href="fav.php" class="inline-flex items-center text-rose-600 font-semibold hover:text-rose-800">
            Lihat Foto <span class="ml-2 dancing-emoji">→</span>
          </a>
        </div>
        
        <!-- Kartu 2 -->
        <div class="dashboard-card bg-white/90 backdrop-blur-md p-6 rounded-3xl shadow-lg">
          <div class="flex items-center mb-4">
            <div class="text-5xl mr-4 dancing-emoji" style="animation-delay: 0.5s;">🌹</div>
            <h3 class="text-xl font-bold text-rose-700">Kisah Kita</h3>
          </div>
          <p class="text-gray-600 mb-4">Jelajahi slide perjalanan cinta kita yang penuh warna</p>
          <a href="slide1.php" class="inline-flex items-center text-rose-600 font-semibold hover:text-rose-800">
            Mulai Kisah <span class="ml-2 dancing-emoji">→</span>
          </a>
        </div>
        
        <!-- Kartu 3 -->
        <div class="dashboard-card bg-white/90 backdrop-blur-md p-6 rounded-3xl shadow-lg">
          <div class="flex items-center mb-4">
            <div class="text-5xl mr-4 dancing-emoji" style="animation-delay: 1s;">🙏</div>
            <h3 class="text-xl font-bold text-rose-700">Ucapan Terima Kasih</h3>
          </div>
          <p class="text-gray-600 mb-4">Ucapan terima kasih untuk semua momen indah bersama</p>
          <a href="thanks.php" class="inline-flex items-center text-rose-600 font-semibold hover:text-rose-800">
            Lihat Ucapan <span class="ml-2 dancing-emoji">→</span>
          </a>
        </div>
      </div>
      
      <!-- Kutipan Romantis -->
      <div class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-lg mb-12 text-center">
        <div class="text-6xl mb-4 dancing-emoji">💕</div>
        <blockquote class="text-xl italic text-gray-700 mb-4">
          "Cinta kita bukan hanya tentang perasaan, tapi tentang komitmen untuk terus bersama dalam suka dan duka."
        </blockquote>
        <p class="text-rose-600 font-semibold">- Untukmu yang terkasih 💖</p>
      </div>
      
      <!-- Statistik Cinta -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
        <div class="bg-white/90 backdrop-blur-md p-6 rounded-2xl text-center pulse-animation">
          <div class="text-4xl mb-2">❤️</div>
          <div class="text-2xl font-bold text-rose-700">∞</div>
          <p class="text-gray-600">Cinta</p>
        </div>
        <div class="bg-white/90 backdrop-blur-md p-6 rounded-2xl text-center pulse-animation" style="animation-delay: 0.5s;">
          <div class="text-4xl mb-2">🌹</div>
          <div class="text-2xl font-bold text-rose-700">212</div>
          <p class="text-gray-600">Hari Bersama</p>
        </div>
        <div class="bg-white/90 backdrop-blur-md p-6 rounded-2xl text-center pulse-animation" style="animation-delay: 1s;">
          <div class="text-4xl mb-2">💌</div>
          <div class="text-2xl font-bold text-rose-700">∞</div>
          <p class="text-gray-600">Pesan Cinta</p>
        </div>
        <div class="bg-white/90 backdrop-blur-md p-6 rounded-2xl text-center pulse-animation" style="animation-delay: 1.5s;">
          <div class="text-4xl mb-2">💑</div>
          <div class="text-2xl font-bold text-rose-700">1</div>
          <p class="text-gray-600">Pasangan Sempurna</p>
        </div>
      </div>
      
      <!-- Tombol Aksi Cepat -->
      <div class="text-center">
        <a href="slide1.php" class="inline-block px-8 py-4 bg-rose-600 text-white rounded-full shadow-lg hover:bg-rose-700 transition-all duration-300 transform hover:scale-105 glitter font-bold text-lg">
          <span class="flex items-center">
            Mulai Perjalanan Cinta Kita <span class="ml-2 dancing-emoji">✨</span>
          </span>
        </a>
      </div>
    </div>
  </main>

</body>
</html>