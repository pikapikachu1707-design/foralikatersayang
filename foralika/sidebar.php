<?php
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<style>
  /* Animasi untuk sidebar */
  .sidebar-item {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }
  
  .sidebar-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.5s;
  }
  
  .sidebar-item:hover::before {
    left: 100%;
  }
  
  .sidebar-item:hover {
    transform: translateX(5px);
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 8px;
  }
  
  /* Animasi hamburger */
  .hamburger-line {
    transition: all 0.3s ease;
  }
  
  .hamburger.active .hamburger-line:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
  }
  
  .hamburger.active .hamburger-line:nth-child(2) {
    opacity: 0;
  }
  
  .hamburger.active .hamburger-line:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -6px);
  }
  
  /* Background animasi */
  .animated-bg {
    background: linear-gradient(-45deg, #ff6b8b, #ff8e9e, #ffa8b8, #ffc2d2);
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
  
  /* Efek floating */
  .floating {
    animation: float 3s ease-in-out infinite;
  }
  
  @keyframes float {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-10px);
    }
  }
  
  /* Efek pulse */
  .pulse {
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
</style>

<!-- Tombol Hamburger (muncul hanya di HP) -->
<div class="md:hidden flex items-center justify-between animated-bg text-white px-4 py-3 fixed top-0 left-0 w-full z-50 shadow-lg">
  <h2 class="text-xl font-bold flex items-center">
    <span class="dancing-emoji mr-2">💌</span>
    Menu
  </h2>
  <button id="menu-btn" class="focus:outline-none hamburger">
    <!-- Icon Hamburger -->
    <div class="w-8 h-8 flex flex-col justify-center space-y-1">
      <span class="hamburger-line block h-0.5 w-6 bg-white"></span>
      <span class="hamburger-line block h-0.5 w-6 bg-white"></span>
      <span class="hamburger-line block h-0.5 w-6 bg-white"></span>
    </div>
  </button>
</div>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30 transition-opacity duration-300"></div>

<!-- Sidebar -->
<aside id="sidebar"
  class="fixed top-0 left-0 w-64 animated-bg text-white h-full p-6 space-y-6 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40 shadow-2xl">
  
  <!-- Logo/Header Sidebar -->
  <div class="flex items-center justify-center mb-8">
    <div class="text-center">
      <div class="text-5xl mb-2 dancing-emoji">💕</div>
      <h2 class="text-2xl font-bold">Menu Kita</h2>
      <div class="w-16 h-1 bg-white/50 mx-auto mt-2 rounded-full"></div>
    </div>
  </div>
  
  <!-- Navigasi -->
  <nav class="space-y-3">
    <a href="dashboard.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg">
      <span class="dancing-emoji mr-3">🏠</span>
      Dashboard
    </a>
    
    <a href="fav.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg">
      <span class="dancing-emoji mr-3" style="animation-delay: 0.2s;">📸</span>
      Foto Fav Aku
    </a>
    
    <a href="slide1.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg">
      <span class="dancing-emoji mr-3" style="animation-delay: 0.4s;">🌹</span>
      Slide 1
    </a>
    
    <a href="slide2.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg">
      <span class="dancing-emoji mr-3" style="animation-delay: 0.6s;">💖</span>
      Slide 2
    </a>
    
    <a href="slide3.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg">
      <span class="dancing-emoji mr-3" style="animation-delay: 0.8s;">🌸</span>
      Slide 3
    </a>
    
    <a href="thanks.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg">
      <span class="dancing-emoji mr-3" style="animation-delay: 1s;">🙏</span>
      Terimakasih
    </a>
    
    <a href="sorry.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg">
      <span class="dancing-emoji mr-3" style="animation-delay: 1.2s;">😔</span>
      Maaf
    </a>
    
    <div class="border-t border-white/30 my-4"></div>
    
    <a href="logout.php" class="sidebar-item flex items-center px-4 py-3 rounded-lg text-red-200 hover:text-white">
      <span class="dancing-emoji mr-3" style="animation-delay: 1.4s;">🚪</span>
      Logout
    </a>
  </nav>
  
  <!-- Footer Sidebar -->
  <div class="absolute bottom-6 left-0 right-0 text-center px-6">
    <div class="flex justify-center space-x-2 mb-2">
      <span class="text-xl dancing-emoji">❤️</span>
      <span class="text-xl dancing-emoji" style="animation-delay: 0.3s;">💕</span>
      <span class="text-xl dancing-emoji" style="animation-delay: 0.6s;">💖</span>
    </div>
    <p class="text-sm text-white/70">Made with love 💝</p>
  </div>
</aside>

<!-- Script JS -->
<script>
  const menuBtn = document.getElementById("menu-btn");
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");

  menuBtn.addEventListener("click", () => {
    sidebar.classList.toggle("-translate-x-full");
    overlay.classList.toggle("hidden");
    menuBtn.classList.toggle("active");
  });

  overlay.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
    overlay.classList.add("hidden");
    menuBtn.classList.remove("active");
  });
  
  // Menambahkan efek suara saat menu diklik (opsional)
  const menuItems = document.querySelectorAll('.sidebar-item');
  menuItems.forEach(item => {
    item.addEventListener('click', function(e) {
      // Efek ripple
      const ripple = document.createElement('span');
      ripple.classList.add('absolute', 'bg-white', 'opacity-30', 'rounded-full', 'animate-ping');
      ripple.style.width = ripple.style.height = '20px';
      
      const rect = this.getBoundingClientRect();
      ripple.style.left = `${e.clientX - rect.left - 10}px`;
      ripple.style.top = `${e.clientY - rect.top - 10}px`;
      
      this.appendChild(ripple);
      
      setTimeout(() => {
        ripple.remove();
      }, 600);
    });
  });
</script>