<?php
session_start();

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Login ke dashboard lama
    if ($email === "love@kita.com" && $password === "22") {
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = "dashboard";
        header("Location: dashboard.php");
        exit;
    } 
    // Login ke playground baru
    elseif ($email === "main@gmail.com" && $password === "aku sayang kamu") {
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = "playground";
        header("Location: playground.php");
        exit;
    } 
    else {
        $error = "Email atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Cinta</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen flex justify-center items-center bg-gradient-to-br from-pink-200 to-rose-400 font-sans">
  <div class="bg-white/90 backdrop-blur-md p-10 rounded-3xl shadow-xl w-96 border-2 border-pink-200 relative z-10">
    <div class="text-center mb-8">
      <div class="flex justify-center mb-4">
        <span class="text-6xl">💕</span>
      </div>
      <h2 class="text-3xl font-bold text-rose-600">Login</h2>
      <p class="text-gray-600 mt-2">Masukkan detail cinta Anda 💖</p>
    </div>
    
    <?php if ($error): ?>
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
        <?= $error ?>
      </div>
    <?php endif; ?>
    
    <form method="POST" class="space-y-6">
      <div>
        <input type="email" name="email" placeholder="Email" 
               class="w-full px-4 py-3 border-2 border-pink-200 rounded-xl focus:ring-2 focus:ring-rose-400" required>
      </div>
      
      <div>
        <input type="password" name="password" placeholder="Password" 
               class="w-full px-4 py-3 border-2 border-pink-200 rounded-xl focus:ring-2 focus:ring-rose-400" required>
      </div>
      
      <button type="submit" class="w-full bg-rose-600 text-white py-3 rounded-xl hover:bg-rose-700 font-semibold text-lg">
        Login
      </button>
    </form>
    
    <div class="mt-6 text-sm text-gray-600">
      <p><b>Dashboard:</b> love@kita.com | 22</p>
      <p><b>Playground:</b> main@gmail.com | aku sayang kamu</p>
    </div>
  </div>
</body>
</html>
