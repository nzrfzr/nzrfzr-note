# Nzrfzr Note — Catat Segalanya 📝

**Nzrfzr Note** adalah aplikasi catatan (notes web-app) sederhana namun modern yang dirancang untuk membantu pengguna mencatat dan mengelola segala hal dengan cepat dan mudah. Aplikasi ini dibangun dengan menggunakan native PHP sebagai backend, MySQL sebagai penyimpanan database, dan dipercantik menggunakan Tailwind CSS untuk antarmuka pengguna yang responsif, minimalis, dan elegan.

---

## 🚀 Fitur Utama

- **Autentikasi Pengguna**: Sistem login sederhana untuk mengamankan akses catatan Anda.
- **CRUD Lengkap (Create, Read, Update, Delete)**:
  - **Buat Catatan**: Form dinamis dengan batasan panjang judul (maksimal 60 karakter) agar rapi.
  - **Lihat Catatan**: Dashboard grid responsif dengan pemotong teks otomatis (*line-clamp*) untuk konten yang panjang.
  - **Edit Catatan**: Kemudahan untuk mengubah judul dan konten catatan kapan saja.
  - **Hapus Catatan**: Hapus catatan yang tidak lagi diperlukan dalam satu klik.
- **Desain UI/UX Modern**: Tampilan bersih dengan palet warna neutral/stone dipadukan dengan aksen warna amber yang elegan, lengkap dengan transisi halus dan animasi mikro pada tombol.
- **Responsif**: Tampilan yang optimal baik diakses melalui *smartphone*, tablet, maupun komputer.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP (Native)
- **Database**: MySQL / MariaDB
- **Frontend & Styling**: Tailwind CSS (v4 / CLI)
- **Icons**: SVG Modern terintegrasi

---

## 📂 Struktur Direktori

```text
nzrfzr-note/
├── config/
│   └── koneksi.php       # Konfigurasi koneksi database MySQL
├── function/
│   ├── delete.php        # Logika penghapusan catatan
│   └── logout.php        # Logika proses logout sesi
├── includes/
│   └── navbar.php        # Komponen navigasi atas (Header)
├── pages/
│   ├── login.php         # Halaman autentikasi masuk
│   ├── create.php        # Halaman pembuatan catatan baru
│   └── edit.php          # Halaman pengubahan catatan lama
├── src/
│   ├── input.css         # Sumber file CSS Tailwind
│   └── output.css        # Hasil kompilasi CSS Tailwind
├── index.php             # Halaman utama / Dashboard utama
├── package.json          # Manajemen package Node (untuk Tailwind CLI)
└── README.md             # Dokumentasi proyek
```

---

## ⚙️ Panduan Instalasi & Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda (misalnya menggunakan Laragon, XAMPP, atau PHP Server bawaan):

### 1. Persiapan Repositori
Clone repositori ini atau salin seluruh folder proyek ke direktori server lokal Anda (misalnya `C:\laragon\www\` atau `C:\xampp\htdocs\`).

### 2. Setup Database
Buka phpMyAdmin atau MySQL client pilihan Anda, lalu jalankan query SQL berikut untuk membuat database dan tabel yang diperlukan:

```sql
-- 1. Buat Database
CREATE DATABASE IF NOT EXISTS nzrfzr_notes;
USE nzrfzr_notes;

-- 2. Buat Tabel Konten
CREATE TABLE IF NOT EXISTS konten (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(60) NOT NULL,
    konten TEXT NOT NULL,
    diubah_pada TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

### 3. Konfigurasi Koneksi Database
Sesuaikan kredensial database Anda pada file `config/koneksi.php`:

```php
$host = 'localhost';
$user = 'root';
$pass = ''; // isi password database jika ada
$dbname = 'nzrfzr_notes';
```

### 4. Setup Tailwind CSS (Opsional / Developer Mode)
Jika Anda ingin memodifikasi styling atau mengompilasi ulang Tailwind CSS, Anda membutuhkan Node.js. Jalankan perintah berikut di terminal pada direktori proyek:

```bash
# Menginstal dependencies
npm install

# Menjalankan kompiler Tailwind CSS secara real-time (--watch)
npx @tailwindcss/cli -i ./src/input.css -o ./src/output.css --watch
```

### 5. Jalankan Aplikasi
1. Aktifkan server lokal Anda (Apache & MySQL).
2. Akses aplikasi melalui peramban (browser) di alamat:
   `http://localhost/nzrfzr-note/`

---

## 🔑 Kredensial Login Default

Untuk masuk ke aplikasi, gunakan akun berikut pada halaman login:
- **Username**: `admin`
- **Password**: `admin123`

---

## 📝 Catatan Tambahan
Konfigurasi database dan session akan mengarahkan pengguna ke halaman login terlebih dahulu apabila session `username` belum terdaftar. Seluruh halaman telah disesuaikan agar berjalan dinamis baik di dalam root direktori maupun di dalam sub-direktori.
