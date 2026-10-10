# MyCafe — Aplikasi Kasir Kafe

MyCafe adalah aplikasi kasir berbasis web yang dibuat sebagai proyek akhir saat kelas XI SMK. Aplikasi ini dikembangkan menggunakan **PHP Native** dan **MySQL** untuk membantu proses transaksi serta pengelolaan menu pada usaha kafe.

Repositori ini menyimpan **versi awal** proyek yang dibuat pada tahap pembelajaran. Struktur dan implementasinya masih mencerminkan proses belajar saat itu, sehingga proyek ini juga menjadi dokumentasi perjalanan pengembangan dari versi awal menuju versi yang diperbaiki.

## Fitur

### Kasir
- Login dan logout akun.
- Membuat transaksi penjualan serta menghitung total pembayaran dan kembalian.
- Mencari menu dan memfilter menu berdasarkan kategori.
- Melihat riwayat transaksi milik kasir yang sedang login.
- Memfilter riwayat transaksi berdasarkan rentang tanggal.
- Melihat detail transaksi dan mencetak struk.

### Owner
- Melihat dashboard ringkasan transaksi.
- Melihat menu dengan stok yang mencapai atau berada di bawah batas minimum.
- Mengelola data menu dan kategori.
- Mengelola akun kasir serta melihat arsip data yang dinonaktifkan.
- Melihat laporan transaksi berdasarkan rentang tanggal dan membuka detail transaksi.

## Teknologi

- **PHP Native**
- **MySQL** dengan ekstensi MySQLi
- **HTML, CSS, dan JavaScript**
- **Bootstrap 4.6**
- **jQuery**
- **Chart.js**
- **Git dan GitHub** untuk pengelolaan repositori

## Struktur Proyek

Berikut beberapa berkas dan direktori utama:

| Berkas/Direktori | Fungsi |
|---|---|
| `admin-dashboard.php` | Dashboard owner |
| `homepage-kasir.php` | Beranda dan riwayat transaksi kasir |
| `transaksi.php` | Proses pemilihan menu untuk transaksi |
| `transaksi-baru.php` | Memulai transaksi baru |
| `simpanTransaksi.php` | Menyimpan informasi pembayaran transaksi |
| `menu.php` | Pengelolaan menu |
| `kategori.php` | Pengelolaan kategori menu |
| `laporan-transaksi.php` | Menampilkan laporan transaksi |
| `fungsi/` | Proses penambahan, pengeditan, pengarsipan, dan detail transaksi |
| `css/` | Stylesheet halaman |
| `config.php` | Konfigurasi koneksi basis data |
| `auth.php` | Pemeriksaan sesi login |

## Persiapan Menjalankan Proyek

Pastikan perangkat telah memiliki:
- PHP dan MySQL/MariaDB, misalnya melalui XAMPP atau Laragon.
- Web server Apache atau server lokal sejenis.
- Browser web.

### Langkah Instalasi

1. Clone repositori ke direktori web server lokal, misalnya `htdocs` pada XAMPP atau `www` pada Laragon.

   ```bash
   git clone https://github.com/Aaalyaa/mycafe.git
   ```

2. Jalankan Apache dan MySQL/MariaDB melalui aplikasi web server lokal.

3. Buat basis data bernama `db_cafe` di MySQL.

4. Siapkan dan impor skema serta data basis data MyCafe ke `db_cafe`.

   **Catatan:** File ekspor SQL belum tersedia di repositori ini. Skema tabel dan data yang diperlukan harus disiapkan dari berkas lokal proyek atau ditambahkan ke repositori agar instalasi dapat dilakukan secara langsung.

5. Periksa konfigurasi koneksi pada `config.php`. Konfigurasi bawaan ditujukan untuk lingkungan lokal:

   ```php
   $servername = "localhost";
   $database = "db_cafe";
   $username = "root";
   $password = "";
   ```

   Sesuaikan nilainya dengan konfigurasi MySQL/MariaDB lokal.

6. Buka aplikasi melalui browser menggunakan alamat lokal sesuai nama folder proyek, misalnya `http://localhost/mycafe/`.

> **Penting:** Basis data harus memiliki struktur tabel dan data yang sesuai dengan kebutuhan kode PHP. Membuat basis data kosong saja tidak cukup untuk menjalankan aplikasi.

## Pengembangan Lanjutan

Versi ini dipertahankan sebagai arsip proyek pembelajaran awal. Pengembangan dan perapian struktur kode dilanjutkan pada repositori terpisah:

**[MyCafe — Versi Modifikasi](https://github.com/Aaalyaa/mycafe-modif)**

Kedua repositori menunjukkan bagian berbeda dari proses belajar: implementasi awal menggunakan PHP Native dan upaya lanjutan untuk memperbaiki struktur serta pemeliharaan kode.

## Batasan Proyek

Proyek ini dibuat untuk tujuan pembelajaran dan portofolio, bukan untuk langsung digunakan pada lingkungan produksi. Sebelum digunakan secara nyata, autentikasi, pengelolaan kredensial, validasi input, otorisasi akses, dan keamanan kueri perlu ditinjau serta diperkuat.

---

**Status:** Proyek pembelajaran — versi awal PHP Native.
