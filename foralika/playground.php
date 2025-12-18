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
  <title>Playground Cinta</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-100 to-rose-200 min-h-screen flex">
  <?php include "sidebar_2.php"; ?>

  <div class="ml-64 flex-1 p-8">
    <h1 class="text-4xl font-bold text-rose-600 mb-6">💖 Playground Cinta 💖</h1>
    <p class="text-lg text-gray-700">Selamat datang di halaman Playground, pilih fitur romantis dari sidebar ✨</p>
  </div>
</body>
</html>
