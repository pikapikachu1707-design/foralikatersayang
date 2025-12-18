<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maaf</title>
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
    
    /* Efek untuk kata penting */
    .important-word {
      color: #ff1493;
      font-weight: bold;
      font-size: 1.1em;
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
          Maaf <span class="dancing-emoji">💔</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">😔</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🙏</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">💕</span>
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
            <h2 class="text-2xl md:text-3xl font-bold text-rose-700 love-text">Permintaan Maaf dari Hatiku 💔</h2>
          </div>
          
          <div class="space-y-6 text-lg md:text-xl text-gray-700 love-text">
            <p>
              Maap ya kalo selama ini aku masih belum bisa jadi apa yang kamu <span class="highlight font-semibold">mau</span>. 
              Bahkan sikap ku ketika marah membuat kesal dan bingung, 
              <span class="dancing-emoji">😔</span>
            </p>
            
            <p>
              Maap juga untuk semua <span class="highlight font-semibold">rasa sakit</span>, <span class="highlight font-semibold">sedih</span> dan juga <span class="highlight font-semibold">kecewaa</span> yang aku kasih ke kamu,
              <span class="dancing-emoji">💔</span>
            </p>
            
            <div class="quote-box">
              <p class="text-rose-700">
                Aku juga gamau ngelakuin hal sebodoh itu, tapi itu terjadi tanpa aku sadari dan tanpa aku mau
              </p>
            </div>
            
            <p>
              Dan maap juga udah <span class="highlight font-semibold">gagal</span> jadi yang kamu mau. Tapi satu hal yang harus kamu tau, aku di sini selalu <span class="highlight font-semibold">berusaha</span> buat perbaiki diri aku, ntah itu sifat atau sikap aku ke kamu.
              <span class="dancing-emoji">🙏</span>
            </p>
            
            <p>
              Dan kamu juga harus tau kalo aku di sini <span class="highlight font-semibold">sayang bangettttt</span> sama kamuuu,
              <span class="dancing-emoji">💕</span>
            </p>
            
            <p>
              Sekali lagi maap yaa kalo aku belum bisa jadi apa yang kamu mau, tapi aku juga bakalan berusaha kooo tenang ajaaa.
              <span class="dancing-emoji">😊</span>
            </p>
            
            <p>
              İ know walaupun kita sering <span class="highlight font-semibold">berantem</span> sering <span class="highlight font-semibold">beda pendapat</span> selalu permasalahin hal sepele, walaupun aku sering marah sama kamu sering kesel, bete badmood atau semacamnya tapi kamu harus <span class="highlight font-semibold">percaya</span> aku <span class="important-word">sayang banget</span> sama kamuu,
              <span class="dancing-emoji">❤️</span>
            </p>
            
            <p>
              Ga ada sehari pun dimana aku ga mikirin kamu ga ada sehari pun tanpa aku natap foto kamu berharap beberapa tahun kedepan bisa natap foto kamu dengan perasaan yang sama atau bahkan lebih,
              <span class="dancing-emoji">📸</span>
            </p>
            
            <p>
              Menurut aku ga ada satu pun orang yang bisa ngubah perasaan aku ke kamu, memang gaada yang sempurna di dunia ini tapi aku selalu berusaha jadi itulah di mata kamu,
              <span class="dancing-emoji">✨</span>
            </p>
            
            <p>
              Udah berapa ribuan kali nama kamu aku sebut diantara cerita sehari aku, kamu tau?
              <span class="dancing-emoji">💭</span>
            </p>
            
            <div class="text-center text-2xl my-8">
              <p class="love-text text-rose-700">
                You are the <span class="important-word">Best part</span> of my life,
              </p>
              <p class="love-text text-rose-700 mt-2">
                I love u <span class="important-word">more than anything</span> ❤❤
              </p>
            </div>
          </div>
          
          <div class="mt-12 text-center">
            <div class="inline-block p-6 bg-pink-50 rounded-2xl border-2 border-pink-200">
              <p class="text-2xl love-text text-rose-700">
                "Maafkan aku dan terima cintaku yang tulus"
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
              <a href="slide3.php" class="inline-block px-6 py-3 bg-white text-rose-600 rounded-full shadow-lg hover:bg-rose-50 transition-all duration-300 transform hover:scale-105 font-bold">
                <span class="flex items-center">
                  <span class="mr-2">←</span> Kembali
                </span>
              </a>
              
              <a href="thanks.php" class="inline-block px-8 py-4 bg-rose-600 text-white rounded-full shadow-lg hover:bg-rose-700 transition-all duration-300 transform hover:scale-105 glitter love-button font-bold text-lg">
                <span class="flex items-center">
                  Terima Kasih <span class="ml-2 dancing-emoji">→</span>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <div class="text-center mt-12 text-white">
        <p class="text-lg">Dengan penyesalan dan cinta <span class="dancing-emoji">💝</span></p>
      </div>
    </div>
  </main>

</body>
</html>