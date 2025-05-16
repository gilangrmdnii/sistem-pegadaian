

# Pawn System Project

Sistem pergadaian berbasis web untuk manajemen barang gadai, pelanggan, transaksi gadai, pembayaran, dan pelunasan. Aplikasi ini dibangun menggunakan Laravel sebagai framework backend dan memiliki fitur-fitur untuk mengelola barang gadai, pelanggan, transaksi gadai, serta riwayat pembayaran.

## Fitur Utama

* **Manajemen Barang Gadai**: Menambah, mengedit, dan menghapus barang gadai.
* **Manajemen Pelanggan**: Menambah dan mengelola data pelanggan.
* **Transaksi Gadai**: Membuat, melihat, dan mengelola transaksi gadai.
* **Pembayaran Gadai**: Pencatatan pembayaran, perhitungan bunga, dan status pelunasan transaksi.
* **Riwayat Transaksi**: Menampilkan riwayat transaksi dan pembayaran untuk barang gadai.
* **Autentikasi Pengguna**: Login untuk admin yang dapat mengakses fitur manajemen.

## Prasyarat

Sebelum menjalankan aplikasi, pastikan kamu memiliki software berikut yang terpasang di sistem kamu:

* **PHP**: Versi 7.4 atau lebih tinggi
* **Composer**: Dependency manager untuk PHP
* **MySQL** atau **MariaDB**: Database untuk menyimpan data
* **Node.js** dan **NPM**: Untuk menjalankan proses build frontend (jika diperlukan)
* **Laravel**: Framework PHP yang digunakan dalam proyek ini

## Instalasi

### 1. Clone Repositori

Clone repositori ini ke mesin lokal kamu:

```bash
git clone https://github.com/gilangrmdnii/sistem-pegadaian.git
```

### 2. Instal Dependensi Backend

Masuk ke folder proyek dan instal dependensi yang diperlukan dengan Composer:

```bash
cd pawn-system-project
composer install
```

### 3. Konfigurasi Database

Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database dan variabel lingkungan lainnya:

```bash
cp .env.example .env
```

Buka file `.env` dan ubah pengaturan berikut sesuai kebutuhan:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pawn_system
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan untuk mengganti nilai `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan konfigurasi yang sesuai dengan server database yang kamu gunakan.

### 4. Menjalankan Migrasi Database

Setelah konfigurasi database, jalankan perintah migrasi untuk membuat struktur tabel di database:

```bash
php artisan migrate
```

### 5. Generate Key Aplikasi

Generate kunci aplikasi untuk mengamankan sesi dan enkripsi data:

```bash
php artisan key:generate
```

### 6. Menjalankan Seeder

Jika kamu ingin menambahkan data dummy ke dalam database (misalnya data pengguna), jalankan perintah seeder:

```bash
php artisan db:seed
```

**Contoh Data Login Admin Default**:
Untuk login ke aplikasi menggunakan akun admin, gunakan email dan password berikut:

* **Email**: `admin@example.com`
* **Password**: `password`

### 7. Menjalankan Aplikasi

Setelah semua konfigurasi selesai, jalankan server Laravel dengan perintah berikut:

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`. Kamu bisa mengaksesnya melalui browser.

## Struktur Direktori

* **app/**: Berisi kode aplikasi utama, termasuk model, controller, dan middleware.
* **database/migrations/**: Berisi file migrasi untuk membuat tabel di database.
* **database/seeders/**: Berisi file seeder untuk mengisi database dengan data awal.
* **resources/views/**: Berisi tampilan HTML untuk aplikasi, termasuk blade templates.
* **routes/**: Berisi file untuk mendefinisikan rute aplikasi.

## Troubleshooting

* **Masalah Koneksi Database**: Pastikan database yang kamu konfigurasi di file `.env` dapat diakses. Periksa apakah `DB_HOST`, `DB_USERNAME`, dan `DB_PASSWORD` sudah benar.
* **Aplikasi Tidak Bisa Dijalankan**: Pastikan kamu telah menjalankan semua perintah instalasi dan migrasi dengan benar.
* **Autentikasi Gagal**: Gunakan kredensial login default untuk login sebagai admin jika belum ada akun pengguna yang dibuat.


