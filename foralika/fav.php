<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foto Favorit</title>
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
    
    /* Efek untuk foto */
    .photo-card {
      transition: all 0.3s ease;
      overflow: hidden;
      border-radius: 1rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .photo-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 25px -5px rgba(255, 105, 180, 0.3);
    }
    
    .photo-card:hover .photo-overlay {
      opacity: 1;
    }
    
    .photo-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(255, 105, 180, 0.7);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
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
    
    /* Animasi untuk header */
    .header-animation {
      position: relative;
      z-index: 10;
    }
    
    .header-decoration {
      position: absolute;
      top: -20px;
      left: 0;
      right: 0;
      height: 60px;
      background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffb6c1" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,133.3C960,128,1056,96,1152,90.7C1248,85,1344,107,1392,117.3L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>') no-repeat;
      background-size: cover;
      z-index: -1;
    }
  </style>
</head>
<body class="flex animated-bg min-h-screen">

  <?php include "sidebar.php"; ?>

  <main class="ml-0 md:ml-64 p-6 flex-1">
    <div class="max-w-6xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12 mt-8 header-animation">
        <div class="header-decoration"></div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 bounce-animation">
          Foto Favorit Aku <span class="dancing-emoji">📸</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">💕</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🌹</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">💖</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Koleksi foto-foto kenangan indah kita yang tak akan terlupakan <span class="dancing-emoji">✨</span>
        </p>
      </div>
      
      <!-- Galeri Foto -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <!-- Foto 1 -->
        <div class="photo-card relative group">
          <img src="foto/slide1.jpg" alt="Foto Favorit 1" class="w-full h-64 object-cover">
          <div class="photo-overlay">
            <div class="text-center text-white p-4">
              <h3 class="text-xl font-bold mb-2">AAAAA LUCU</h3>
              <p class="text-sm">malmingan dungss sama pacarr</p>
              <div class="mt-3">
                <span class="dancing-emoji text-2xl">❤️</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Foto 2 -->
        <div class="photo-card relative group">
          <img src="foto/slide2.jpg" alt="Foto Favorit 2" class="w-full h-64 object-cover">
          <div class="photo-overlay">
            <div class="text-center text-white p-4">
              <h3 class="text-xl font-bold mb-2">kamu kecanduan my girl my girl</h3>
              <p class="text-sm">AKU HEPI DAPET BUNGA DARI KAMU</p>
              <div class="mt-3">
                <span class="dancing-emoji text-2xl">🌹</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Foto 3 -->
        <div class="photo-card relative group">
          <img src="foto/slide3.jpg" alt="Foto Favorit 3" class="w-full h-64 object-cover">
          <div class="photo-overlay">
            <div class="text-center text-white p-4">
              <h3 class="text-xl font-bold mb-2">KAMU CANTIK BANGET</h3>
              <p class="text-sm">lucuu bangett aku jemput kamu xixixxi</p>
              <div class="mt-3">
                <span class="dancing-emoji text-2xl">🌅</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Foto 4 -->
        <div class="photo-card relative group">
          <img src="foto/slide4.jpg" alt="Foto Favorit 4" class="w-full h-64 object-cover">
          <div class="photo-overlay">
            <div class="text-center text-white p-4">
              <h3 class="text-xl font-bold mb-2">ini juga lucu tapi kamu ga keliatan huh</h3>
              <p class="text-sm">AKU DISINI BETMUT TAPI ABIS HUG KAMU NDA BETMUT LAGI SKSKS</p>
              <div class="mt-3">
                <span class="dancing-emoji text-2xl">✈️</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Foto 5 -->
        <div class="photo-card relative group">
          <img src="foto/slide5.jpg" alt="Foto Favorit 5" class="w-full h-64 object-cover">
          <div class="photo-overlay">
            <div class="text-center text-white p-4">
              <h3 class="text-xl font-bold mb-2">OMAYYYGATTTTT</h3>
              <p class="text-sm">frist time joging bareng pacar, aaa suka banget di temenin pacarrr</p>
              <div class="mt-3">
                <span class="dancing-emoji text-2xl">🎂</span>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Foto 6 -->
        <div class="photo-card relative group">
          <img src="foto/slide6.jpg" alt="Foto Favorit 6" class="w-full h-64 object-cover">
          <div class="photo-overlay">
            <div class="text-center text-white p-4">
              <h3 class="text-xl font-bold mb-2">Hari yang Tenang</h3>
              <p class="text-sm">Bersama dalam keheningan yang penuh makna</p>
              <div class="mt-3">
                <span class="dancing-emoji text-2xl">🌳</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Kutipan Romantis -->
      <div class="bg-white/90 backdrop-blur-md p-8 rounded-3xl shadow-lg mb-12 text-center">
        <div class="text-6xl mb-4 dancing-emoji">📷</div>
        <blockquote class="text-xl italic text-gray-700 mb-4">
          "semua foto kita favorite aku, tapi box nya tida cukup sayangg huhuuu."
        </blockquote>
        <p class="text-rose-600 font-semibold">- Kenangan terindah bersamamu 💖</p>
      </div>
      
      <!-- Tombol Aksi -->
      <div class="text-center mb-12">
        <a href="slide1.php" class="inline-block px-8 py-4 bg-rose-600 text-white rounded-full shadow-lg hover:bg-rose-700 transition-all duration-300 transform hover:scale-105 glitter font-bold text-lg">
          <span class="flex items-center">
            Lihat Kisah Lengkap Kita <span class="ml-2 dancing-emoji">→</span>
          </span>
        </a>
      </div>
      
      <!-- Emoji Dekorasi -->
      <div class="flex justify-center space-x-4 mb-8">
        <span class="text-4xl dancing-emoji">🌸</span>
        <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">💕</span>
        <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">🌷</span>
        <span class="text-4xl dancing-emoji" style="animation-delay: 0.9s;">💖</span>
        <span class="text-4xl dancing-emoji" style="animation-delay: 1.2s;">🌹</span>
      </div>
    </div>
  </main>

</body>
</html>