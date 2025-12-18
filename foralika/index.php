<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Happy Anniversary ❤️</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap');
    
    body {
      font-family: 'Quicksand', sans-serif;
      overflow-x: hidden;
    }
    
    /* Animasi untuk floating hearts */
    .floating-heart {
      position: fixed;
      bottom: -20px;
      z-index: 1;
      animation: float-up 8s linear infinite;
      color: rgba(255, 105, 180, 0.7);
      font-size: 20px;
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
    
    /* Animasi bounce untuk judul */
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
    
    /* Animasi untuk emoji bergerak */
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
    
    /* Animasi untuk pulse */
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
    
    /* Animasi untuk FAQ */
    .faq-item {
      transition: all 0.3s ease;
    }
    
    .faq-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(255, 105, 180, 0.2);
    }
    
    /* Animasi untuk gambar */
    .float-animation {
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
  </style>
</head>
<body class="animated-bg font-sans">

  <!-- Floating Hearts -->
  <div id="hearts-container"></div>

  <!-- Navbar -->
  <nav class="bg-white/80 backdrop-blur-md shadow-lg fixed w-full z-10 top-0">
    <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-rose-600 flex items-center">
        <span class="dancing-emoji mr-2">💞</span>
        Kita Berdua
        <span class="dancing-emoji ml-2">💕</span>
      </h1>
      <ul class="flex space-x-6 text-gray-700 font-semibold">
        <li><a href="#home" class="hover:text-rose-500 transition-colors duration-300 flex items-center"><span class="mr-1">🏠</span> Home</a></li>
        <li><a href="#about" class="hover:text-rose-500 transition-colors duration-300 flex items-center"><span class="mr-1">💌</span> Tentang</a></li>
        <li><a href="#wish" class="hover:text-rose-500 transition-colors duration-300 flex items-center"><span class="mr-1">🌟</span> Harapan</a></li>
        <li><a href="login.php" class="hover:text-rose-500 transition-colors duration-300 flex items-center"><span class="mr-1">🔑</span> Login</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="h-screen flex flex-col justify-center items-center text-center px-6 relative">
    <div class="absolute inset-0 overflow-hidden">
      <div class="absolute top-1/4 left-1/4 text-6xl opacity-20 dancing-emoji">🌸</div>
      <div class="absolute top-1/3 right-1/4 text-6xl opacity-20 dancing-emoji" style="animation-delay: 0.5s;">💖</div>
      <div class="absolute bottom-1/4 left-1/3 text-6xl opacity-20 dancing-emoji" style="animation-delay: 1s;">🌷</div>
      <div class="absolute bottom-1/3 right-1/3 text-6xl opacity-20 dancing-emoji" style="animation-delay: 1.5s;">💕</div>
    </div>
    
    <div class="relative z-10">
      <h2 class="text-5xl md:text-7xl font-extrabold text-rose-700 mb-4 bounce-animation">
        Happy Anniversary <span class="dancing-emoji">💖</span>
      </h2>
      <div class="flex justify-center space-x-2 mb-6">
        <span class="text-4xl dancing-emoji">🎉</span>
        <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🥳</span>
        <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">🎊</span>
      </div>
      <p class="text-lg md:text-xl text-gray-700 max-w-2xl mx-auto mb-8 bg-white/70 p-6 rounded-2xl shadow-lg">
        Hari ini adalah hari spesial kita, penuh cinta, cerita, dan harapan yang indah. 
        Terima kasih sudah selalu ada disampingku <span class="dancing-emoji">❤️</span>
      </p>
      <a href="#about" class="px-8 py-4 bg-rose-600 text-white rounded-full shadow-lg hover:bg-rose-700 transition-all duration-300 transform hover:scale-105 glitter inline-block">
        <span class="flex items-center">
          Lihat Kisah Kita
           <span class="ml-2 dancing-emoji">✨</span>
        </span>
      </a>
    </div>
  </section>

  <!-- Tentang -->
  <section id="about" class="py-20 bg-white/90 text-center relative">
    <div class="absolute inset-0 overflow-hidden">
      <div class="absolute top-10 left-10 text-4xl opacity-20 float-animation">🌹</div>
      <div class="absolute bottom-10 right-10 text-4xl opacity-20 float-animation" style="animation-delay: 1s;">💝</div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-6">
      <h3 class="text-3xl md:text-4xl font-bold text-rose-600 mb-6 flex items-center justify-center">
        <span class="mr-3 dancing-emoji">💑</span>
        Tentang kamu
        <span class="ml-3 dancing-emoji">💞</span>
      </h3>
      <div class="bg-pink-50 p-8 rounded-3xl shadow-lg border-2 border-pink-200">
        <p class="text-lg text-gray-700 mb-6">
          sebenarnya aku tak cukup lihai untuk terus menulis segala tentang kamu, seakan segala kata yang ingin ku rangkai
         terus mengangkasa hingga akhirnya yang tertulis hanya nama mu saja. itu semua terjadi karena aku terlalu mengagumimu
         sampai aku tak tau kata apalagi yang harus aku gunakan untuk mendeskripsikan betapa sempurnanya kamu di mata ku.
         sangat banyak yang ingin ku tulis tentang kamu, binar mata, tawa renyah, tutur kata lembut kamu, senyuman yg mewarnai dunia,
         rasanya semua yang ada pada dirimu tak ada minus nya di mataku ini.
         memang butuh waktu yang banyak untuk menuliskan segala tentang kamu, tapi selalu menyenangkan untuk terus membuat dunia tau bahwa kamu begitu mempesona.
        
        </p>
        <div class="flex justify-center space-x-4 mt-6">
          <div class="text-center">
            <div class="text-5xl dancing-emoji">🌈</div>
            <p class="mt-2 text-gray-600">Warna-warni</p>
          </div>
          <div class="text-center">
            <div class="text-5xl dancing-emoji" style="animation-delay: 0.5s;">🦋</div>
            <p class="mt-2 text-gray-600">Indah</p>
          </div>
          <div class="text-center">
            <div class="text-5xl dancing-emoji" style="animation-delay: 1s;">🌺</div>
            <p class="mt-2 text-gray-600">Mekar</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Harapan -->
  <section id="wish" class="py-20 bg-gradient-to-r from-rose-100 to-pink-200 text-center relative">
    <div class="absolute inset-0 overflow-hidden">
      <div class="absolute top-1/4 left-1/4 text-5xl opacity-20 float-animation">✨</div>
      <div class="absolute top-1/3 right-1/4 text-5xl opacity-20 float-animation" style="animation-delay: 0.7s;">🌟</div>
      <div class="absolute bottom-1/4 left-1/3 text-5xl opacity-20 float-animation" style="animation-delay: 1.4s;">💫</div>
      <div class="absolute bottom-1/3 right-1/3 text-5xl opacity-20 float-animation" style="animation-delay: 2.1s;">⭐</div>
    </div>
    
    <div class="relative z-10 max-w-3xl mx-auto px-6">
      <h3 class="text-3xl md:text-4xl font-bold text-rose-700 mb-6 flex items-center justify-center">
        <span class="mr-3 dancing-emoji">🌈</span>
        Harapan
        <span class="ml-3 dancing-emoji">💖</span>
      </h3>
      <div class="bg-white/80 p-8 rounded-3xl shadow-lg border-2 border-pink-200">
        <p class="text-lg text-gray-700 mb-6">
          Semoga kita selalu bersama dalam suka dan duka, saling melengkapi, dan tumbuh bersama. 💞
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8">
          <div class="bg-pink-100 p-4 rounded-xl pulse-animation">
            <div class="text-4xl mb-2">❤️</div>
            <p class="text-sm text-gray-700">Cinta</p>
          </div>
          <div class="bg-pink-100 p-4 rounded-xl pulse-animation" style="animation-delay: 0.5s;">
            <div class="text-4xl mb-2">🤗</div>
            <p class="text-sm text-gray-700">Kasih</p>
          </div>
          <div class="bg-pink-100 p-4 rounded-xl pulse-animation" style="animation-delay: 1s;">
            <div class="text-4xl mb-2">🥰</div>
            <p class="text-sm text-gray-700">Sayang</p>
          </div>
          <div class="bg-pink-100 p-4 rounded-xl pulse-animation" style="animation-delay: 1.5s;">
            <div class="text-4xl mb-2">💑</div>
            <p class="text-sm text-gray-700">Bersama</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="py-20 bg-white/90 relative">
    <div class="absolute inset-0 overflow-hidden">
      <div class="absolute top-10 left-10 text-4xl opacity-20 float-animation">❓</div>
      <div class="absolute bottom-10 right-10 text-4xl opacity-20 float-animation" style="animation-delay: 1s;">💭</div>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto px-6">
      <h3 class="text-3xl md:text-4xl font-bold text-center text-rose-600 mb-10 flex items-center justify-center">
        <span class="mr-3 dancing-emoji">💕</span>
        FAQ Kisah Cinta Kita
        <span class="ml-3 dancing-emoji">❤️</span>
      </h3>
      <div class="space-y-6">
        <details class="p-6 border-2 border-pink-200 rounded-2xl bg-pink-50 faq-item">
          <summary class="font-semibold text-gray-700 text-lg flex items-center">
            <span class="mr-2 dancing-emoji">👫</span>
            Kapan kita pertama kali bertemu?
          </summary>
          <p class="mt-4 text-gray-600">
          kita pertama ketemu di telegram, sumpah aku kaget bisa dapet yang deket begitu asekk
          tanpa basa basi langsung jadian wes sat set emang model nya kami ini, ga suka basa basi
          sat set juga ketemu mam eskrim, sat set eh ketemu lagi di klinik, lucu xixixi nemenin kamu di klinik tiap hari 
            <span class="dancing-emoji">😊</span>
          </p>
        </details>
        
        <details class="p-6 border-2 border-pink-200 rounded-2xl bg-pink-50 faq-item">
          <summary class="font-semibold text-gray-700 text-lg flex items-center">
            <span class="mr-2 dancing-emoji">💞</span>
            Apa momen paling berkesan?
          </summary>
          <p class="mt-4 text-gray-600">
           setiap hari berkesan, dari mulai pertama kali ketemu kamu sampai detik ini tiap hari jadi berkesan banget momen nya
            <span class="dancing-emoji">🤝</span>
          </p>
        </details>
        
        <details class="p-6 border-2 border-pink-200 rounded-2xl bg-pink-50 faq-item">
          <summary class="font-semibold text-gray-700 text-lg flex items-center">
            <span class="mr-2 dancing-emoji">🌈</span>
            Apa harapan untuk masa depan?
          </summary>
          <p class="mt-4 text-gray-600">
           aku mau sama kamu terus, aku harap kamu ga akan cape sama aku, bakal sayang terus sama aku, bakal terus nemenin aku
            <span class="dancing-emoji">👵👴</span>
          </p>
        </details>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-8 bg-rose-600 text-white text-center">
    <div class="max-w-6xl mx-auto px-6">
      <p class="mb-4">Dibuat dengan <span class="dancing-emoji">❤️</span> untuk hari spesial kita</p>
      <div class="flex justify-center space-x-4">
        <span class="text-2xl dancing-emoji">🌹</span>
        <span class="text-2xl dancing-emoji" style="animation-delay: 0.3s;">💕</span>
        <span class="text-2xl dancing-emoji" style="animation-delay: 0.6s;">🌸</span>
        <span class="text-2xl dancing-emoji" style="animation-delay: 0.9s;">💖</span>
        <span class="text-2xl dancing-emoji" style="animation-delay: 1.2s;">🌷</span>
      </div>
    </div>
  </footer>

  <script>
    // Membuat floating hearts
    function createHeart() {
      const heart = document.createElement('div');
      heart.className = 'floating-heart';
      heart.innerHTML = ['❤️', '💕', '💖', '💗', '💓'][Math.floor(Math.random() * 5)];
      heart.style.left = Math.random() * 100 + '%';
      heart.style.animationDuration = (Math.random() * 3 + 5) + 's';
      heart.style.opacity = Math.random() * 0.5 + 0.3;
      heart.style.fontSize = (Math.random() * 10 + 15) + 'px';
      
      document.getElementById('hearts-container').appendChild(heart);
      
      setTimeout(() => {
        heart.remove();
      }, 8000);
    }
    
    // Membuat hearts setiap 300ms
    setInterval(createHeart, 300);
    
    // Smooth scrolling untuk navigasi
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>
</body>
</html>