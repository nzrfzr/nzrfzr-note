<?php
include '../config/koneksi.php';
session_start();
?>

<link href="../src/output.css" rel="stylesheet">

<body class="flex justify-center items-center flex-col gap-10 h-full bg-zinc-100">
    <div class="flex flex-col gap-3">
        <h1 class="text-center font-bold text-3xl">Nzrfzr Note</h1>
        <p class="text-center text-xs text-stone-500">Catat Segalanya</p>
    </div>
    <div class="bg-white p-8 rounded-xl shadow">
            <form action="login.php" method="POST" class="flex flex-col gap-7 w-64">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium">Username</label>
                        <input 
                        class="w-full border border-stone-300 rounded-xl px-4 py-2.5 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition" 
                        placeholder="Masukkan username"
                        required 
                        type="text" 
                        name="username">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium">Password</label>
                        <input 
                        class="w-full border border-stone-300 rounded-xl px-4 py-2.5 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition" 
                        placeholder="Masukkan password"
                        required 
                        type="password" 
                        name="password">
                    </div>
                </div>
                <input class="bg-zinc-950 hover:bg-amber-400 transition-all text-white px-4 py-2 rounded-xl" name="submit" type="submit" value="Masuk">
            </form>
    </div>
    <div class="flex flex-col gap-2">
        <p class="text-xs text-stone-500">Username: admin</p>
        <p class="text-xs text-stone-500">Password: admin123</p>
    </div>
</body>


<?php
if(isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($q);

    if($user && password_verify($password, $user['password'])){
       $_SESSION['id_user'] = $user['id_user'];
       $_SESSION['username'] = $user['username'];
        header("Location: ../index.php");
    } else {
        echo "<div class='border border-red-500 rounded-xl text-red-500 px-4 py-2'>Username atau password salah!</div>";
    }

}