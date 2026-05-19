<?php
session_start();

$username_benar = "admin";
$password_benar = "12345";
?>

<link href="./src/output.css" rel="stylesheet">

<body class="flex justify-center items-center flex-col gap-4 h-full bg-zinc-100">
    <div>
        <h1 class="text-center font-bold text-3xl">Nzrfzr Note</h1>
        <p class="text-center text-xs">Masuk untuk mencatat</p>
    </div>
    <div class="bg-white p-8 rounded-xl shadow">
            <form action="login.php" method="POST" class="flex flex-col gap-6 w-64">
                <div class="flex flex-col gap-3">
                    <label class="text-sm font-semibold">Username</label>
                    <input 
                    class="border border-gray-300 rounded-xl px-3 py-2 active:border-yellow-600" 
                    placeholder="Masukkan username"
                    required 
                    type="text" 
                    name="username">
                    <label class="text-sm font-semibold">Password</label>
                    <input 
                    class="border border-gray-300 rounded-xl px-3 py-2 active:border-yellow-600" 
                    placeholder="Masukkan password"
                    required 
                    type="password" 
                    name="password">
                </div>
                <input class="bg-zinc-950 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl" name="submit" type="submit" value="Masuk">
            </form>
    </div>

</body>


<?php

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == $username_benar && $password == $password_benar) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "<div class='border border-red-500 rounded-xl text-red-500 px-4 py-2 rounded-xl'>Username atau password salah!</div>";
    }

}