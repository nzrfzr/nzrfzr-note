<?php
include '../config/koneksi.php';
session_start();
?>

<link href="../src/output.css" rel="stylesheet">

<body class="flex justify-center items-center flex-col gap-10 h-full bg-zinc-100">
    <div class="flex flex-col gap-3">
        <h1 class="text-center font-bold text-3xl">Daftar Akun Baru</h1>
        <p class="text-center text-xs text-stone-500">Buat Akun Baru</p>
    </div>
    <div class="bg-white p-8 rounded-xl shadow">
            <form action="register.php" method="POST" class="flex flex-col gap-7 w-64">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium">Username</label>
                        <input 
                        class="w-full border border-stone-300 rounded-xl px-4 py-2.5 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition" 
                        placeholder="Masukkan username"
                        required 
                        type="text" 
                        name="username">
                        <span id="warning" class="text-xs text-red-500"></span>
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
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-medium">Konfirmasi Password</label>
                        <input 
                        class="w-full border border-stone-300 rounded-xl px-4 py-2.5 text-sm text-stone-900 placeholder-stone-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition" 
                        placeholder="Masukkan konfirmasi password"
                        required 
                        type="password" 
                        name="password_confirmation">
                    </div>
                </div>
                <input class="bg-zinc-950 hover:bg-amber-400 transition-all text-white px-4 py-2 rounded-xl" name="submit" type="submit" value="Daftar">
            </form>
    </div>
    <div class="flex gap-2">
        <p class="text-xs text-stone-500">Sudah punya akun? </p>
        <a href="./login.php" class="text-xs text-stone-500 hover:text-stone-900 transition-colors">Masuk</a>
    </div>
    <script>
        const usernameInput = document.querySelector('input[name="username"]');
        const warning = document.getElementById('warning');
        
        usernameInput.addEventListener('input', function() {
            const username = this.value;
            if (!/^[a-zA-Z0-9_]+$/.test(username)) {
                warning.textContent = 'Username hanya boleh berisi huruf, angka, dan underscore (_)';
                warning.style.color = 'red';
            } else {
                warning.textContent = '';
            }
        });
    </script>
</body>

<?php
    if(isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password_confirmation = mysqli_real_escape_string($conn, $_POST['password_confirmation']);

        if($password != $password_confirmation) {
            echo "<div class='border border-red-500 rounded-xl text-red-500 px-4 py-2'>Password tidak cocok!</div>";
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        $query_check_username = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

        if(mysqli_num_rows($query_check_username) > 0) {
            echo "<div class='border border-red-500 rounded-xl text-red-500 px-4 py-2'>Username sudah digunakan!</div>";
            exit;
        }

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: login.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
    