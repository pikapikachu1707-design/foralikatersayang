<?php
// Mulai session (hanya sekali)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek login
if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== "playground") {
    header("Location: login.php");
    exit;
}

// Inisialisasi playlist di session
if (!isset($_SESSION['playlist'])) {
    $_SESSION['playlist'] = [];
}

// Tambah lagu baru
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['title']) && isset($_POST['url'])) {
    $title = htmlspecialchars($_POST['title']);
    $url   = htmlspecialchars($_POST['url']);
    $_SESSION['playlist'][] = ["title" => $title, "url" => $url];
}

// Hapus lagu
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if (isset($_SESSION['playlist'][$id])) {
        unset($_SESSION['playlist'][$id]);
        $_SESSION['playlist'] = array_values($_SESSION['playlist']); // rapikan index
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Galeri Musik</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Dancing+Script:wght@700&display=swap');
    body { font-family: 'Quicksand', sans-serif; }
    .animated-bg {
      background: linear-gradient(-45deg, #ffb6c1, #ffc0cb, #ff69b4, #ff1493);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
    }
    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .dancing-emoji { display: inline-block; animation: dance 1.5s infinite; }
    @keyframes dance {
      0%,100% { transform: rotate(0deg) scale(1); }
      25% { transform: rotate(10deg) scale(1.1); }
      50% { transform: rotate(0deg) scale(1); }
      75% { transform: rotate(-10deg) scale(1.1); }
    }
    .bounce-animation { animation: bounce 2s infinite; }
    @keyframes bounce { 0%,100%{transform:translateY(0);} 50%{transform:translateY(-20px);} }
    .song-card { transition: all .3s ease; border-radius: 16px; overflow: hidden; }
    .song-card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(255,105,180,.3); }
    .form-input { border-radius: 12px; border:2px solid rgba(244,63,94,.3); padding:12px 16px; width:100%; background:rgba(255,255,255,.9); }
    .form-input:focus { border-color:#f43f5e; box-shadow:0 0 0 3px rgba(244,63,94,.2); outline:none; transform:scale(1.02);}
    .love-button { border-radius:12px; padding:12px 24px; background:#f43f5e; color:white; font-weight:600; box-shadow:0 8px 20px rgba(244,63,94,.2); cursor:pointer; display:inline-flex; align-items:center; gap:8px; }
    .love-button:hover { background:#ff1493; transform:translateY(-3px); box-shadow:0 12px 25px rgba(244,63,94,.3); }
    .delete-button,.play-button { transition:.3s; border-radius:50%; width:40px; height:40px; display:flex; align-items:center; justify-content:center; }
    .delete-button { background:rgba(239,68,68,.1); color:#ef4444; }
    .delete-button:hover { background:rgba(239,68,68,.2); transform:scale(1.1); }
    .play-button { background:rgba(34,197,94,.1); color:#22c55e; }
    .play-button:hover { background:rgba(34,197,94,.2); transform:scale(1.1); }
    .container { background:rgba(255,255,255,.85); border-radius:20px; box-shadow:0 15px 35px rgba(244,63,94,.2); padding:25px; border:2px solid rgba(255,255,255,.5); }
    .notification { position:fixed; top:20px; right:20px; padding:16px 24px; background:white; border-radius:12px; box-shadow:0 10px 25px rgba(0,0,0,.1); z-index:50; display:flex; align-items:center; gap:12px; transform:translateX(400px); transition:transform .3s; }
    .notification.show { transform:translateX(0); }
    .music-note { position:absolute; color:rgba(244,63,94,.7); animation: musicFloat 4s linear infinite; z-index:0; }
    @keyframes musicFloat { 0%{transform:translateY(0) rotate(0);opacity:1;} 100%{transform:translateY(-100px) rotate(20deg);opacity:0;} }
  </style>
</head>
<body class="animated-bg min-h-screen flex">
  <?php include "sidebar_2.php"; ?>

  <div class="ml-0 md:ml-64 flex-1 p-6">
    <div class="max-w-4xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12 mt-8">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 bounce-animation">
          Galeri Musik & Foto <span class="dancing-emoji">🎶</span>
        </h1>
        <div class="flex justify-center space-x-2 mb-6">
          <span class="text-4xl dancing-emoji">🎵</span>
          <span class="text-4xl dancing-emoji" style="animation-delay:.3s;">🎶</span>
          <span class="text-4xl dancing-emoji" style="animation-delay:.6s;">🎵</span>
        </div>
        <p class="text-xl text-white/90 max-w-2xl mx-auto bg-white/20 backdrop-blur-sm p-4 rounded-2xl">
          Tambahkan lagu favorit kalian biar bisa diputar kapan saja <span class="dancing-emoji">💕</span>
        </p>
      </div>

      <!-- Form tambah lagu -->
      <div class="container mb-8 relative overflow-hidden">
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">➕</span> Tambah Lagu
        </h2>
        <form method="POST" class="space-y-6">
          <div>
            <label class="block text-gray-700 mb-2 font-medium">Judul Lagu</label>
            <input type="text" name="title" placeholder="Judul Lagu" required class="form-input">
          </div>
          <div>
            <label class="block text-gray-700 mb-2 font-medium">URL YouTube / MP3</label>
            <input type="url" name="url" placeholder="URL YouTube / MP3" required class="form-input">
          </div>
          <div class="text-center">
            <button type="submit" class="love-button">
              <span>Simpan Lagu</span> <span class="dancing-emoji">💖</span>
            </button>
          </div>
        </form>
      </div>

      <!-- Daftar lagu -->
      <div class="container relative overflow-hidden">
        <h2 class="text-2xl font-bold text-rose-600 mb-6 flex items-center">
          <span class="dancing-emoji mr-3">📀</span> Playlist
        </h2>
        <?php if (empty($_SESSION['playlist'])): ?>
          <div class="text-center py-12">
            <div class="text-6xl mb-4 dancing-emoji">🎵</div>
            <p class="text-xl text-gray-600">Belum ada lagu, ayo tambahkan <span class="dancing-emoji">💖</span></p>
          </div>
        <?php else: ?>
          <div class="space-y-4">
            <?php foreach ($_SESSION['playlist'] as $i => $song): ?>
              <div class="song-card bg-white p-5 shadow-md flex justify-between items-center">
                <div class="flex items-center">
                  <div class="mr-4 text-3xl dancing-emoji" style="animation-delay: <?= $i * 0.2 ?>s;">🎵</div>
                  <div>
                    <p class="font-bold text-lg text-gray-800"><?= $song['title'] ?></p>
                    <div class="flex items-center mt-1">
                      <a href="<?= $song['url'] ?>" target="_blank" class="play-button mr-3">
                        <i class="fas fa-play"></i>
                      </a>
                      <span class="text-sm text-gray-500">Klik untuk memutar</span>
                    </div>
                  </div>
                </div>
                <a href="?delete=<?= $i ?>" class="delete-button" title="Hapus lagu">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Footer -->
      <div class="text-center mt-12 text-white">
        <p class="text-lg">Dengan cinta dan musik <span class="dancing-emoji">💝</span></p>
      </div>
    </div>
  </div>

  <!-- Notification -->
  <div id="notification" class="notification">
    <div class="text-2xl dancing-emoji">🎶</div>
    <div>
      <p class="font-bold" id="notification-title">Lagu Ditambahkan!</p>
      <p class="text-sm text-gray-500" id="notification-message">Lagu telah ditambahkan ke playlist</p>
    </div>
  </div>

  <script>
    // Show notification when song is added
    document.querySelector('form[method="POST"]').addEventListener('submit', function() {
      setTimeout(() => {
        const notification = document.getElementById('notification');
        notification.classList.add('show');
        setTimeout(() => { notification.classList.remove('show'); }, 3000);
      }, 500);
    });

    // Create floating music notes
    function createMusicNote() {
      const note = document.createElement("div");
      note.className = "music-note";
      note.innerHTML = ["♪","♫","♬","♩"][Math.floor(Math.random()*4)];
      note.style.left = Math.random()*window.innerWidth+"px";
      note.style.fontSize = (Math.random()*10+15)+"px";
      note.style.animationDuration = (Math.random()*3+2)+"s";
      document.body.appendChild(note);
      setTimeout(()=>{ note.remove(); },5000);
    }
    setInterval(createMusicNote,2000);
  </script>
</body>
</html>
