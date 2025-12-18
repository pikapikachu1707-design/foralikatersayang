<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terima Kasih</title>
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
    
    /* Floating hearts */
    .heart {
      position: fixed;
      bottom: -20px;
      font-size: 20px;
      color: #f43f5e;
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

    /* Amplop animasi */
    .envelope {
      width: 150px;
      height: 100px;
      background: #f43f5e;
      position: relative;
      cursor: pointer;
      margin: auto;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(244, 63, 94, 0.3);
      transition: all 0.3s ease;
    }
    
    .envelope:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.4);
    }
    
    .envelope::before {
      content: "";
      position: absolute;
      top: -50px;
      left: 0;
      width: 0;
      height: 0;
      border-left: 75px solid transparent;
      border-right: 75px solid transparent;
      border-bottom: 50px solid #f87171;
      transition: all 0.5s ease;
    }
    
    .envelope:hover::before {
      transform: rotateX(180deg);
      transform-origin: bottom;
    }
    
    .note {
      display: none;
      margin-top: 30px;
      padding: 25px;
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      font-family: 'Dancing Script', cursive;
      font-size: 1.4rem;
      color: #ff1493;
      line-height: 1.6;
      animation: fadeIn 1s ease-in-out;
      position: relative;
      overflow: hidden;
    }
    
    .note::before {
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

    /* Slideshow quotes */
    .quote {
      display: none;
      font-size: 1.5rem;
      font-style: italic;
      font-family: 'Dancing Script', cursive;
      color: #ff1493;
      padding: 20px;
      background: rgba(255, 255, 255, 0.7);
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(244, 63, 94, 0.2);
    }
    
    .quote.active {
      display: block;
      animation: fadeIn 1s ease-in-out;
    }
    
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }

    /* Tabs */
    .tab-btn {
      padding: 0.75rem 1.5rem;
      border-radius: 9999px;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      background: rgba(255, 255, 255, 0.7);
      color: #ff1493;
      border: 2px solid transparent;
      box-shadow: 0 4px 15px rgba(244, 63, 94, 0.1);
    }
    
    .tab-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(244, 63, 94, 0.2);
    }
    
    .tab-btn.active {
      background: #f43f5e;
      color: white;
      border-color: #fff;
      box-shadow: 0 8px 25px rgba(244, 63, 94, 0.3);
    }
    
    .tab-content {
      display: none;
      background: rgba(255, 255, 255, 0.85);
      backdrop-blur-md;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.2);
      padding: 25px;
      border: 2px solid rgba(255, 255, 255, 0.5);
    }
    
    .tab-content.active {
      display: block;
      animation: tabFadeIn 0.5s ease-in-out;
    }
    
    @keyframes tabFadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }
    
    /* Efek glitter */
    @keyframes glitter {
      0% {
        transform: rotate(45deg) translateX(-100%);
      }
      100% {
        transform: rotate(45deg) translateX(100%);
      }
    }
    
    /* Efek untuk wish card */
    .wish-card {
      transition: all 0.3s ease;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
    
    .wish-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(45deg, rgba(255, 255, 255, 0.3), transparent);
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .wish-card:hover::before {
      opacity: 1;
    }
    
    .wish-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(244, 63, 94, 0.2);
    }
    
    /* Efek untuk input kuis */
    .quiz-input {
      transition: all 0.3s ease;
      border-radius: 12px;
      border: 2px solid rgba(244, 63, 94, 0.3);
      padding: 12px 16px;
      width: 100%;
      font-size: 1rem;
      background: rgba(255, 255, 255, 0.8);
    }
    
    .quiz-input:focus {
      border-color: #f43f5e;
      box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.2);
      outline: none;
      transform: scale(1.02);
    }
    
    /* Efek untuk tombol kuis */
    .quiz-button {
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
    
    .quiz-button:hover {
      background: #ff1493;
      transform: translateY(-3px);
      box-shadow: 0 12px 25px rgba(244, 63, 94, 0.3);
    }
    
    /* Efek untuk hasil kuis */
    .quiz-result {
      padding: 16px;
      border-radius: 12px;
      margin-top: 20px;
      font-weight: 600;
      text-align: center;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 8px 20px rgba(244, 63, 94, 0.1);
      color: #ff1493;
      font-size: 1.1rem;
    }
    
    /* Efek untuk quotes container */
    .quotes-container {
      position: relative;
      padding: 30px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.5);
      box-shadow: 0 15px 35px rgba(244, 63, 94, 0.15);
      min-height: 200px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .quotes-container::before {
      content: """;
      position: absolute;
      top: 10px;
      left: 20px;
      font-size: 80px;
      color: rgba(244, 63, 94, 0.1);
      font-family: serif;
    }
    
    .quotes-container::after {
      content: """;
      position: absolute;
      bottom: 10px;
      right: 20px;
      font-size: 80px;
      color: rgba(244, 63, 94, 0.1);
      font-family: serif;
      transform: rotate(180deg);
    }
  </style>
</head>
<!-- PERUBAHAN DI SINI: HAPUS overflow-hidden -->
<body class="flex animated-bg min-h-screen relative">

  <?php include "sidebar.php"; ?>

  <!-- PERUBAHAN DI SINI: TAMBAHKAN overflow-y-auto -->
  <main class="ml-0 md:ml-64 p-6 flex-1 relative z-10 overflow-y-auto">
    <div class="max-w-6xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12 mt-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 bounce-animation">
          Terima Kasih <span class="dancing-emoji">💝</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">🎉</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.3s;">🥳</span>
          <span class="text-4xl dancing-emoji" style="animation-delay: 0.6s;">🎊</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Halaman spesial untuk mengungkapkan rasa terima kasih kita <span class="dancing-emoji">✨</span>
        </p>
      </div>

      <!-- Tab Navigation -->
      <div class="flex justify-center gap-4 mb-8 flex-wrap">
        <button class="tab-btn" onclick="showTab('quiz')">
          <span class="dancing-emoji">🎯</span> Kuis
        </button>
        <button class="tab-btn" onclick="showTab('surat')">
          <span class="dancing-emoji">💌</span> Surat
        </button>
        <button class="tab-btn" onclick="showTab('wish')">
          <span class="dancing-emoji">📝</span> Wish Wall
        </button>
        <button class="tab-btn" onclick="showTab('quotes')">
          <span class="dancing-emoji">✨</span> Quotes
        </button>
      </div>

      <!-- Tab Content -->

      <!-- Kuis Cinta -->
      <section id="quiz" class="tab-content">
        <h2 class="text-2xl md:text-3xl font-bold text-rose-600 mb-6 text-center flex items-center justify-center">
          <span class="dancing-emoji mr-3">🎯</span> Kuis Cinta
        </h2>
        <div id="quizBox" class="space-y-6">
          <div class="bg-pink-50 p-6 rounded-2xl shadow-md">
            <p class="font-semibold text-lg text-gray-700 mb-3">1. Tanggal jadian kita?</p>
            <input type="text" id="q1" class="quiz-input" placeholder="Jawabanmu...">
          </div>
          <div class="bg-pink-50 p-6 rounded-2xl shadow-md">
            <p class="font-semibold text-lg text-gray-700 mb-3">2. Siapa yang lebih manja? <span class="dancing-emoji">😝</span></p>
            <input type="text" id="q2" class="quiz-input" placeholder="Jawabanmu...">
          </div>
          <div class="text-center">
            <button onclick="checkQuiz()" class="quiz-button">
              <span>Cek Jawaban</span>
              <span class="dancing-emoji">❤️</span>
            </button>
          </div>
          <div id="quizResult" class="quiz-result"></div>
        </div>
      </section>

      <!-- Surat Rahasia -->
      <section id="surat" class="tab-content text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-rose-600 mb-6 flex items-center justify-center">
          <span class="dancing-emoji mr-3">💌</span> Surat Rahasia
        </h2>
        <div class="flex flex-col items-center">
          <div class="envelope mb-6"></div>
          <div id="note" class="note">
            Hai sayangku <span class="dancing-emoji">❤️</span>,<br>
            Aku cuma mau bilang kalau aku benar-benar bahagia punya kamu.  
            Kamu itu rumahku, bahagiaku, dan semangatku. <span class="dancing-emoji">😘</span>
          </div>
          <p class="mt-4 text-gray-600">Klik amplop untuk membuka surat</p>
        </div>
      </section>

      <!-- Wish Wall -->
      <section id="wish" class="tab-content text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-rose-600 mb-6 flex items-center justify-center">
          <span class="dancing-emoji mr-3">📝</span> Wish Wall
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="wish-card bg-yellow-100">
            <div class="text-3xl mb-3 dancing-emoji">🍜</div>
            <p class="font-medium">Jangan lupa makan ya <span class="dancing-emoji">😘</span></p>
          </div>
          <div class="wish-card bg-pink-100">
            <div class="text-3xl mb-3 dancing-emoji" style="animation-delay: 0.3s;">👏</div>
            <p class="font-medium">Aku bangga banget sama kamu <span class="dancing-emoji">💖</span></p>
          </div>
          <div class="wish-card bg-green-100">
            <div class="text-3xl mb-3 dancing-emoji" style="animation-delay: 0.6s;">💍</div>
            <p class="font-medium">Semoga kita selalu bersama selamanya <span class="dancing-emoji">💕</span></p>
          </div>
          <div class="wish-card bg-blue-100">
            <div class="text-3xl mb-3 dancing-emoji" style="animation-delay: 0.9s;">🌸</div>
            <p class="font-medium">Kamu semangat aku setiap hari <span class="dancing-emoji">✨</span></p>
          </div>
          <div class="wish-card bg-purple-100">
            <div class="text-3xl mb-3 dancing-emoji" style="animation-delay: 1.2s;">🤗</div>
            <p class="font-medium">Aku ga mau kehilangan kamu <span class="dancing-emoji">💕</span></p>
          </div>
          <div class="wish-card bg-orange-100">
            <div class="text-3xl mb-3 dancing-emoji" style="animation-delay: 1.5s;">😍</div>
            <p class="font-medium">Terima kasih sudah jadi milikku <span class="dancing-emoji">❤️</span></p>
          </div>
        </div>
      </section>

      <!-- Slideshow Quotes -->
      <section id="quotes" class="tab-content text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-rose-600 mb-6 flex items-center justify-center">
          <span class="dancing-emoji mr-3">✨</span> Quotes Untukmu
        </h2>
        <div class="quotes-container">
          <div id="quotesBox" class="text-lg">
            <p class="quote active">"Kamu adalah rumahku <span class="dancing-emoji">🏡</span>"</p>
            <p class="quote">"Kamu adalah bahagiaku <span class="dancing-emoji">🌸</span>"</p>
            <p class="quote">"Kamu adalah semestaku <span class="dancing-emoji">🌍</span>"</p>
            <p class="quote">"Kamu adalah selamanya <span class="dancing-emoji">💍</span>"</p>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- Floating hearts -->
  <script>
    function createHeart() {
      const heart = document.createElement("div");
      heart.className = "heart";
      heart.innerHTML = ["❤️","💕","💖","💗","💓"][Math.floor(Math.random()*5)];
      heart.style.left = Math.random() * window.innerWidth + "px";
      heart.style.fontSize = (Math.random()*15 + 15) + "px";
      document.body.appendChild(heart);
      setTimeout(() => { heart.remove(); }, 8000);
    }
    setInterval(createHeart, 600);

    // Kuis
    function checkQuiz() {
      const q1 = document.getElementById("q1").value.trim();
      const q2 = document.getElementById("q2").value.trim().toLowerCase();
      let score = 0;
      if (q1.includes("22")) score++;
      if (q2.includes("kamu") || q2.includes("aku")) score++;
      
      const resultElement = document.getElementById("quizResult");
      if (score === 2) {
        resultElement.innerHTML = '<span class="dancing-emoji">🎉</span> Yeay! Kamu jawab semua dengan cinta <span class="dancing-emoji">😍</span>';
        resultElement.style.background = 'rgba(76, 175, 80, 0.2)';
      } else {
        resultElement.innerHTML = '<span class="dancing-emoji">😊</span> Hehe ada yang salah, tapi aku tetep sayang kamu <span class="dancing-emoji">❤️</span>';
        resultElement.style.background = 'rgba(255, 193, 7, 0.2)';
      }
    }

    // Surat
    function openLetter() {
      const note = document.getElementById("note");
      note.style.display = "block";
      
      // Add sparkle effect
      for (let i = 0; i < 20; i++) {
        setTimeout(() => {
          createSparkle(note);
        }, i * 100);
      }
    }
    
    function createSparkle(container) {
      const sparkle = document.createElement("div");
      sparkle.className = "absolute";
      sparkle.innerHTML = ["✨", "⭐", "🌟"][Math.floor(Math.random()*3)];
      sparkle.style.left = Math.random() * 100 + "%";
      sparkle.style.top = Math.random() * 100 + "%";
      sparkle.style.fontSize = (Math.random()*10 + 15) + "px";
      sparkle.style.animation = "float 2s ease-in-out forwards";
      container.appendChild(sparkle);
      
      setTimeout(() => {
        sparkle.remove();
      }, 2000);
    }

    // Quotes Slideshow
    let currentQuote = 0;
    const quotes = document.querySelectorAll(".quote");
    setInterval(() => {
      quotes[currentQuote].classList.remove("active");
      currentQuote = (currentQuote + 1) % quotes.length;
      quotes[currentQuote].classList.add("active");
    }, 3000);

    // Tabs
    function showTab(tabId) {
      document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
      document.querySelectorAll(".tab-content").forEach(tab => tab.classList.remove("active"));

      document.querySelector(`button[onclick="showTab('${tabId}')"]`).classList.add("active");
      document.getElementById(tabId).classList.add("active");
    }
    
    // Initialize first tab
    document.addEventListener("DOMContentLoaded", function() {
      showTab('quiz');
    });

    // AMPLOP CLICK
    document.addEventListener("DOMContentLoaded", function() {
      const envelope = document.querySelector(".envelope");
      if (envelope) {
        envelope.addEventListener("click", function() {
          const note = document.getElementById("note");
          note.style.display = "block";
          
          // Add sparkle effect
          for (let i = 0; i < 20; i++) {
            setTimeout(() => {
              createSparkle(note);
            }, i * 100);
          }
        });
      }
    });
  </script>

</body>
</html>