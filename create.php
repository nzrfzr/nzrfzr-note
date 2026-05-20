<link href="./src/output.css" rel="stylesheet">
<title>Nzrfzr - Catat Segalanya</title>

<?php
session_start();
require_once 'config/koneksi.php';
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<body class=" text-stone-900 min-h-screen bg-zinc-100">
    <?php include('navbar.php') ?>
    <main class="flex flex-col max-w-2xl mx-auto px-4 sm:px-6 py-10 gap-4">
        <div class="flex flex-col justify-center gap-2 h-14 my-2">
            <div class="flex gap-2">
                <a href="index.php" class="text-xs text-stone-500 font-semibold hover:text-stone-600 transition-all">Beranda</a>
                <span class="text-xs text-stone-500 font-semibold">/</span>
                <p class="text-xs text-stone-600 font-semibold">Buat Catatan</p>
            </div>
            <h1 class="text-2xl font-bold text-stone-900">Buat Catatan Baru</h1>
        </div>
        <div class="flex flex-col gap-4 bg-white rounded-lg px-8 py-10 shadow">
            <form action="" method="post">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="judul" class="text-sm text-stone-500 font-semibold">Judul</label>
                        <input type="text" id="judul" name="judul" class="border border-stone-200 rounded-lg px-3 py-2 text-sm text-stone-900 focus:outline-none focus:border-amber-500 transition-colors" placeholder="Masukkan judul">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="konten" class="text-sm text-stone-500 font-semibold">Konten</label>
                        <textarea id="konten" name="konten" rows="12" class="border border-stone-200 rounded-lg px-3 py-2 text-sm text-stone-900 focus:outline-none focus:border-amber-500 transition-colors" placeholder="Masukkan konten"></textarea>
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="index.php" class="text-sm border border-stone-400 text-stone-500 rounded-lg px-3 py-2 hover:border-stone-900 hover:text-stone-900 transition-colors">Batal</a>
                        <input type="submit" name="submit" class="text-sm text-white bg-stone-900 rounded-lg px-3 py-2 hover:text-white hover:bg-amber-500  transition-colors" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

<?php
    if(isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $konten = $_POST['konten'];

        $sql = "INSERT INTO konten (judul, konten) VALUES ('$judul', '$konten')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: index.php");
        }else {
            echo "Gagal";
        }
    }
?>