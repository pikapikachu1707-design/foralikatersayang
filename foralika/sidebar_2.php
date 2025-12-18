<aside class="w-64 bg-gradient-to-b from-rose-600 to-pink-700 text-white h-screen p-6 space-y-8 fixed shadow-2xl overflow-hidden">
  <!-- Background decorative elements -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-10 left-4 text-6xl opacity-10 dancing-emoji">💕</div>
    <div class="absolute top-1/3 right-4 text-6xl opacity-10 dancing-emoji" style="animation-delay: 0.5s;">🌹</div>
    <div class="absolute bottom-20 left-6 text-6xl opacity-10 dancing-emoji" style="animation-delay: 1s;">💖</div>
    <div class="absolute bottom-1/3 right-6 text-6xl opacity-10 dancing-emoji" style="animation-delay: 1.5s;">🌸</div>
  </div>

  <!-- Logo/Header -->
  <div class="relative z-10 mb-10">
    <div class="flex items-center justify-center mb-4">
      <div class="text-5xl dancing-emoji">💌</div>
    </div>
    <h2 class="text-2xl font-bold text-center">Playground</h2>
    <div class="w-16 h-1 bg-white/30 mx-auto mt-2 rounded-full"></div>
  </div>
  
  <!-- Navigation -->
  <nav class="space-y-3 relative z-10">
    <a href="galeri.php" class="nav-item flex items-center p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
      <span class="text-2xl mr-3 dancing-emoji">🎶</span>
      <span class="font-medium">Galeri Musik</span>
      <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">→</span>
    </a>
    
    <a href="timeline.php" class="nav-item flex items-center p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
      <span class="text-2xl mr-3 dancing-emoji" style="animation-delay: 0.2s;">📖</span>
      <span class="font-medium">Timeline Kisah</span>
      <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">→</span>
    </a>
    
    <a href="memorybox.php" class="nav-item flex items-center p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
      <span class="text-2xl mr-3 dancing-emoji" style="animation-delay: 0.4s;">🎁</span>
      <span class="font-medium">Memory Box</span>
      <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">→</span>
    </a>
    
    <a href="lovegen.php" class="nav-item flex items-center p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
      <span class="text-2xl mr-3 dancing-emoji" style="animation-delay: 0.6s;">💡</span>
      <span class="font-medium">Love Generator</span>
      <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">→</span>
    </a>
    
    <a href="games.php" class="nav-item flex items-center p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
      <span class="text-2xl mr-3 dancing-emoji" style="animation-delay: 0.8s;">🎮</span>
      <span class="font-medium">Mini Game</span>
      <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">→</span>
    </a>
    
    <a href="surprise.php" class="nav-item flex items-center p-3 rounded-xl hover:bg-white/20 transition-all duration-300 group">
      <span class="text-2xl mr-3 dancing-emoji" style="animation-delay: 1s;">🎉</span>
      <span class="font-medium">Easter Egg</span>
      <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">→</span>
    </a>
    
    <div class="border-t border-white/20 my-4"></div>
    
    <a href="logout.php" class="nav-item flex items-center p-3 rounded-xl hover:bg-red-500/30 transition-all duration-300 group">
      <span class="text-2xl mr-3 dancing-emoji" style="animation-delay: 1.2s;">🚪</span>
      <span class="font-medium text-red-200">Logout</span>
      <span class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">→</span>
    </a>
  </nav>
  
  <!-- Footer -->
  <div class="absolute bottom-6 left-0 right-0 text-center px-6 relative z-10">
    <div class="flex justify-center space-x-2 mb-2">
      <span class="text-xl dancing-emoji">❤️</span>
      <span class="text-xl dancing-emoji" style="animation-delay: 0.3s;">💕</span>
      <span class="text-xl dancing-emoji" style="animation-delay: 0.6s;">💖</span>
    </div>
    <p class="text-xs text-white/70">Made with love 💝</p>
  </div>
</aside>

<style>
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
  
  /* Efek hover untuk nav item */
  .nav-item {
    position: relative;
    overflow: hidden;
  }
  
  .nav-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
  }
  
  .nav-item:hover::before {
    left: 100%;
  }
  
  /* Efek untuk background */
  aside {
    position: relative;
  }
  
  aside::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="none"/><path d="M0,0 L100,100 M0,100 L100,0" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/></svg>');
    opacity: 0.4;
    z-index: 0;
  }
</style>