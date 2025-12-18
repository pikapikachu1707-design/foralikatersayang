<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slide 3</title>
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
    
    /* Efek untuk love letter */
    .love-letter {
      background: linear-gradient(to bottom, #ffffff, #fff0f5);
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(255, 105, 180, 0.2);
      position: relative;
      overflow: hidden;
    }
    
    .love-letter::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 70%);
      opacity: 0.3;
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
    .love-text {
      font-family: 'Dancing Script', cursive;
      line-height: 1.8;
    }
    
    /* Efek highlight untuk kata-kata penting */
    .highlight {
      background: linear-gradient(120deg, rgba(255, 105, 180, 0.2) 0%, rgba(255, 105, 180, 0.3) 100%);
      padding: 0 5px;
      border-radius: 4px;
      position: relative;
      z-index: 1;
    }
    
    /* Efek untuk hati melayang */
    .floating-heart {
      position: absolute;
      color: rgba(255, 105, 180, 0.7);
      animation: float-up 8s linear infinite;
      z-index: 0;
    }
    
    @keyframes float-up {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(-100vh) rotate(360deg);
        opacity: 0;
      }
    }
    
    /* Efek untuk dekorasi */
    .decoration {
      position: absolute;
      opacity: 0.1;
      z-index: 0;
    }
    
    /* Efek untuk tombol */
    .love-button {
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }
    
    .love-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(255, 105, 180, 0.3);
    }
    
    /* Efek untuk kotak kutipan */
    .quote-box {
      background-color: rgba(255, 240, 245, 0.8);
      border-left: 4px solid #ff69b4;
      padding: 1rem 1.5rem;
      margin: 1.5rem 0;
      border-radius: 0 1rem 1rem 0;
      position: relative;
    }
    
    .quote-box::before {
      content: """;
      font-size: 4rem;
      position: absolute;
      top: -1rem;
      left: 0.5rem;
      color: rgba(255, 105, 180, 0.2);
      font-family: serif;
    }
    
    /* Efek untuk piramida love */
    .love-pyramid {
      text-align: center;
      margin: 2rem 0;
      line-height: 1.5;
    }
    
    .love-pyramid span {
      display: block;
      font-family: 'Dancing Script', cursive;
      font-weight: bold;
      color: #ff1493;
    }
  </style>
</head>
<body class="flex animated-bg min-h-screen">

  <?php include "sidebar.php"; ?>

  <main class="ml-0 md:ml-64 p-6 flex-1">
    <div class="max-w-4xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12 mt-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 bounce-animation">
          Deklarasi Cinta <span class="dancing-emoji">💞</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">💕</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🌹</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">💖</span>
        </div>
      </div>
      
      <!-- Love Letter -->
      <div class="love-letter p-8 md:p-12 relative">
        <!-- Dekorasi hati melayang -->
        <div class="floating-heart" style="top: 20%; left: 10%; font-size: 20px;">❤️</div>
        <div class="floating-heart" style="top: 30%; right: 15%; font-size: 24px; animation-delay: 1s;">💕</div>
        <div class="floating-heart" style="bottom: 20%; left: 20%; font-size: 18px; animation-delay: 2s;">💖</div>
        <div class="floating-heart" style="bottom: 30%; right: 10%; font-size: 22px; animation-delay: 3s;">💗</div>
        
        <!-- Dekorasi -->
        <div class="decoration top-4 left-4 text-6xl">🌸</div>
        <div class="decoration top-4 right-4 text-6xl">🌷</div>
        <div class="decoration bottom-4 left-4 text-6xl">💕</div>
        <div class="decoration bottom-4 right-4 text-6xl">💖</div>
        
        <!-- Isi Surat -->
        <div class="relative z-10">
          <div class="text-center mb-8">
            <div class="text-6xl dancing-emoji mb-4">💌</div>
            <h2 class="text-2xl md:text-3xl font-bold text-rose-700 love-text">Hai Sayangku 💞</h2>
          </div>
          
          <div class="space-y-6 text-lg md:text-xl text-gray-700 love-text">
            <p>
              I wanna tell u something. Aku <span class="highlight font-semibold">sayang banget</span> sama kamu, kamu orang yang aku sayangi sedalam ini.
              <span class="dancing-emoji">🥰</span>
            </p>
            
            <p>
              Kalau ada alat ukur kebahagian aku pasti orang paling <span class="highlight font-semibold">bahagia</span> yang bisa sama kamu. Yang bisa milikin kamu, kamu itu is my <span class="highlight font-semibold">highest level of happiness</span>.
              <span class="dancing-emoji">✨</span>
            </p>
            
            <div class="quote-box">
              <p class="text-rose-700">
                Satu hal yang kamu harus tau that I loveeeee u so much!!!!
              </p>
            </div>
            
            <p>
              Just wanna say that im <span class="highlight font-semibold">lucky to have u</span> thankyou, uda mau terima semua kekurangan kelebihan aku.
              <span class="dancing-emoji">🤗</span>
            </p>
            
            <p>
              I loveeee u just <span class="highlight font-semibold">u are</span>, gaperlu jadi orang lain yaa buat bikin aku happy, jadi <span class="highlight font-semibold">diri kamu sendiri</span> yaa sayang itu lebih bikin aku happy.
              <span class="dancing-emoji">😊</span>
            </p>
            
            <p>
              Maacci sayangg uda selalu <span class="highlight font-semibold">sabar</span> ngadepin sikap aku yang kadang bikin kamu marah atau kesel, aku bakal berusaha lebih baik lagi yaaa.
              <span class="dancing-emoji">💕</span>
            </p>
            
            <p>
              Aku gaakan pernah berhenti <span class="highlight font-semibold">bersyukur</span> karna uda dapet cewe sebaik dan setulus kamuu. Sama aku terus yaa sayangkuuuu!
              <span class="dancing-emoji">💖</span>
            </p>
            
            <div class="love-pyramid">
              <span>I loveeee u</span>
              <span>I loveeee u everyday</span>
              <span>I loveeee u every hour</span>
              <span>I loveeeeeeu every minute</span>
              <span>I loveeee u every second</span>
              <span>I loveeee u moreee n moree sayanggg</span>
            </div>
          </div>
          
          <div class="mt-12 text-center">
            <div class="inline-block p-6 bg-pink-50 rounded-2xl border-2 border-pink-200">
              <p class="text-2xl love-text text-rose-700">
                "From my deepest heart, I love you forever"
              </p>
            </div>
          </div>
          
          <div class="mt-12 text-center">
            <div class="flex justify-center space-x-4 mb-6">
              <span class="text-4xl dancing-emoji">❤️</span>
              <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">💕</span>
              <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">💖</span>
              <span class="text-4xl dancing-emoji" style="animation-delay: 0.9s;">💗</span>
              <span class="text-4xl dancing-emoji" style="animation-delay: 1.2s;">💓</span>
            </div>
            
            <div class="flex justify-center space-x-4">
              <a href="slide2.php" class="inline-block px-6 py-3 bg-white text-rose-600 rounded-full shadow-lg hover:bg-rose-50 transition-all duration-300 transform hover:scale-105 font-bold">
                <span class="flex items-center">
                  <span class="mr-2">←</span> Kembali
                </span>
              </a>
              
              <a href="thanks.php" class="inline-block px-8 py-4 bg-rose-600 text-white rounded-full shadow-lg hover:bg-rose-700 transition-all duration-300 transform hover:scale-105 glitter love-button font-bold text-lg">
                <span class="flex items-center">
                  Lanjutkan Kisah Kita <span class="ml-2 dancing-emoji">→</span>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-12 text-white">
        <p class="text-lg">Forever yours <span class="dancing-emoji">💝</span></p>
      </div>
    </div>
  </main>

</body>
</html>