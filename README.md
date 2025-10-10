# Lumina

<img width="2559" height="1259" alt="Screenshot 2025-10-10 173726" src="https://github.com/user-attachments/assets/5a526f33-0327-4d33-a0c5-5e550cb5ca6f" />
Lumina adalah platform blog modern berbasis Laravel 12 yang menampilkan artikel, sistem komentar, likes, dan fitur interaksi penulis–pembaca. Proyek ini mengutamakan kemudahan pengembangan dengan dukungan asset build via Vite serta opsi menjalankan aplikasi secara lokal ataupun melalui Docker.

## Fitur Utama
- Pengelolaan blog lengkap dengan kategori dan penulis
- Sistem komentar dengan autentikasi pengguna
- Dukungan like dan follow untuk konten & penulis
- Integrasi ikon berbasis Blade dan asset bundling dengan Vite

## Teknologi
- Laravel 12 (PHP 8.3)
- MySQL 8
- Redis 7 (opsional)
- Vite + Tailwind CSS & ekosistem Blade Icons

## Sistem Requirement
- PHP >= 8.3 dengan ekstensi: `pdo_mysql`, `mbstring`, `bcmath`, `intl`, `gd`, `zip`, `redis`
- Composer 2.x
- Node.js 20.x & npm (atau package manager kompatibel)
- MySQL 8.x
- Redis 7.x (opsional tapi direkomendasikan)
- Git untuk mengelola repositori dan dependency

## Instalasi Manual (Tanpa Docker)
1. **Clone repositori & masuk ke folder proyek**
   ```bash
   git clone https://github.com/rendy-ptr/Lumina.git
   cd Lumina
   ```
2. **Salin file environment dan sesuaikan konfigurasi**
   ```bash
   cp .env.example .env
   ```
   Ubah kredensial database, Redis, Cloudinary, serta konfigurasi lain sesuai lingkungan Anda.
3. **Install dependency PHP**
   ```bash
   composer install
   ```
4. **Generate application key**
   ```bash
   php artisan key:generate
   ```
5. **Jalankan migrasi dan seeder (opsional)**
   ```bash
   php artisan migrate --seed
   ```
6. **Install dependency JavaScript dan build asset**
   ```bash
   npm install
   npm run build
   ```
   Untuk mode pengembangan gunakan:
   ```bash
   npm run dev
   ```
7. **Jalankan aplikasi**
   ```bash
   php artisan serve
   ```
   Aplikasi tersedia di `http://127.0.0.1:8000`. Jalankan `npm run dev` di terminal terpisah agar Vite memantau perubahan front-end secara live.

## Lingkungan Docker
Gunakan opsi ini jika ingin menjalankan aplikasi tanpa menyiapkan PHP/Node/MySQL secara manual.

1. **Clone repositori (jika belum) dan masuk ke direktori proyek**
   ```bash
   git clone <url-repo-anda> lumina
   cd lumina
   ```
2. **Siapkan konfigurasi environment khusus Docker**
   ```bash
   cp .env.docker.example .env.docker
   ```
   Perbarui kredensial yang diperlukan (mis. Cloudinary, secret key lain). File `.env` tidak dipakai oleh Docker kecuali Anda memetakan sendiri; semua variabel diambil dari `.env.docker`.
3. **Build serta jalankan container**
   ```bash
   docker compose up -d --build
   ```
   Composer akan otomatis menjalankan `composer install` saat container `app` pertama kali hidup. Cek progres lewat:
   ```bash
   docker compose logs -f app
   ```
4. **Pasang dependency front-end**
   ```bash
   docker compose exec app npm install
   ```
5. **Proses asset sesuai kebutuhan**
   - Build sekali jalan (mode produksi):
     ```bash
     docker compose exec app npm run build
     ```
   - Mode pengembangan dengan hot reload:
     ```bash
     docker compose exec app npm run dev -- --host
     ```
6. **Lengkapi inisialisasi Laravel**
   ```bash
   docker compose exec app php artisan key:generate
   docker compose exec app php artisan migrate --seed
   docker compose exec app php artisan storage:link
   ```

Setelah langkah di atas, aplikasi aktif di `http://localhost:8000`. MySQL tersedia pada `localhost:33060` (user/password sesuai `.env.docker`), Redis pada `localhost:63790`. Hentikan seluruh container dengan `docker compose down`, atau sertakan `-v` untuk sekalian menghapus volume (`mysql-data`, `vendor`, `node_modules`) bila ingin benar-benar bersih.

## Perintah Berguna
- `php artisan test` — menjalankan seluruh pengujian aplikasi
- `php artisan migrate:fresh --seed` — reset database dan jalankan seeder ulang
- `npm run lint` / `npm run build` — sesuaikan dengan skrip npm yang tersedia
- `composer dump-autoload` — regenerasi autoloader Composer

## Lisensi
Proyek ini menggunakan lisensi MIT. Anda bebas memanfaatkan, memodifikasi, dan mendistribusikan ulang selama tetap mencantumkan lisensi yang sama.
