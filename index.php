<link href="./src/output.css" rel="stylesheet">
<title>Nzrfzr - Catat Segalanya</title>

<?php
session_start();
require_once 'config/koneksi.php';
if(!isset($_SESSION['username'])) {
    header("Location: ./pages/login.php");exit;
}

$user_id=$_SESSION['id_user'];
$sql = "SELECT * FROM konten WHERE id_user = '" . $_SESSION['id_user'] . "'";
$result = mysqli_query($conn, $sql);
$jumlah_konten = mysqli_num_rows($result);
$kosong = ($jumlah_konten == 0);

?>
<body class=" text-stone-900 min-h-screen bg-zinc-100">
<?php include './includes/navbar.php'; ?>
    <main class="max-w-5xl mx-auto px-4 sm:px-6 py-10 gap-4">
        <div class="flex items-center justify-between h-14 my-2">
            <div>
                <h2 class="text-2xl font-bold text-stone-900">Semua Catatan</h2>
                <p class="text-xs text-stone-400 mt-0.5"><?= $jumlah_konten ?> catatan tersimpan</p>
            </div>
            <a href="./pages/create.php"
            class="inline-flex items-center gap-2 bg-stone-900 hover:bg-amber-500 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Catatan Baru
            </a>
        </div>
        <?php if($kosong):?>
            <div class="bg-white rounded-xl border border-stone-200 h-1/3 flex justify-center items-center">
                <div class="flex justify-center items-center flex-col gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H156.69A15.92,15.92,0,0,0,168,219.31L219.31,168A15.92,15.92,0,0,0,224,156.69V48A16,16,0,0,0,208,32ZM96,88h64a8,8,0,0,1,0,16H96a8,8,0,0,1,0-16Zm32,80H96a8,8,0,0,1,0-16h32a8,8,0,0,1,0,16ZM96,136a8,8,0,0,1,0-16h64a8,8,0,0,1,0,16Zm64,68.69V160h44.7Z"></path></svg>
                    <div class="flex justify-center items-center flex-col gap-2">
                        <p class="text-md text-stone-800 font-semibold">Belum ada catatan</p>
                        <p class="text-sm text-stone-500">Yuk buat catatan pertamamu!</p>
                    </div>
                    <a href="./pages/create.php"
                        class="inline-flex items-center gap-2 bg-stone-900 hover:bg-amber-500 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Buat Catatan
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="bg-white rounded-xl w-full border gap-5 border-stone-200 p-5 flex flex-col items-center justify-between hover:border-amber-500 transition-all">
                        <div class="flex flex-col gap-2 w-full">
                            <p class="text-md text-stone-800 font-semibold line-clamp-1"><?php echo $row['judul']; ?></p>
                            <p class="text-sm text-stone-500 line-clamp-4"><?php echo $row['konten']; ?></p>
                        </div>
                        <div class="flex justify-between items-center w-full border-t border-stone-200 pt-3">
                            <div class="flex flex-col gap-1">
                                <p class="text-xs text-stone-500"><?php echo $row['diubah_pada']; ?> </p>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <a href="./pages/edit.php?id=<?php echo $row['id']; ?>" class="text-xs border border-stone-400 text-stone-500 rounded-lg px-3 py-1 hover:border-stone-900 hover:text-stone-900 transition-colors">Edit</a>
                                <a href="./function/delete.php?id=<?php echo $row['id']; ?>" class="text-xs border border-red-500 text-red-500 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white transition-colors">Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
        <?php endif; ?>
    </main>
</body>
