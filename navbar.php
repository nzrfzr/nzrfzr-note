<?php // navbar.php — navigasi atas, di-include setelah layout.php ?>
<nav class="bg-white border-b border-stone-200 sticky top-0 z-40">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 flex items-center justify-between h-14">
    <a href="index.php" class="text-lg font-semibold tracking-tight flex items-center gap-2">
      <span class="text-stone-800">Nzrfzr Note</span>
    </a>
    <div class="flex items-center gap-4">
      <span class="text-sm text-stone-500 hidden sm:block">
        Halo, <span class="font-medium text-stone-700"><?= $_SESSION['username']?></span>
      </span>
      <a href="logout.php"
         class="text-sm text-stone-600 hover:text-stone-900 border border-stone-200 hover:border-stone-400 rounded-lg px-3 py-1.5 transition-colors">
        Keluar
      </a>
    </div>
  </div>
</nav>
