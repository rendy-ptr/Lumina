# Lumina

<img width="2559" height="1259" alt="Screenshot 2025-10-10 173726" src="https://github.com/user-attachments/assets/5a526f33-0327-4d33-a0c5-5e550cb5ca6f" />
Lumina adalah platform blog modern berbasis Laravel 12 yang menampilkan artikel, sistem komentar, likes, dan fitur interaksi penulis–pembaca. Proyek ini mengutamakan kemudahan pengembangan dengan dukungan asset build via Vite serta opsi menjalankan aplikasi secara lokal ataupun melalui Docker.

## Fitur Utama
- Pengelolaan blog lengkap dengan kategori dan penulis
- Sistem komentar dengan autentikasi pengguna
- Dukungan like dan follow untuk konten & penulis
- Integrasi ikon berbasis Blade dan asset bundling dengan Vite

## Teknologi
- Laravel 12 (PHP 8.2)
- MySQL 8
- Redis 7 (opsional)
- Vite + Tailwind CSS & ekosistem Blade Icons

## Sistem Requirement
- PHP >= 8.2 dengan ekstensi: `pdo_mysql`, `mbstring`, `bcmath`, `intl`, `gd`, `zip`, `redis`
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
Gunakan opsi ini jika ingin menjalankan aplikasi tanpa menginstal PHP, Composer, Node.js, atau MySQL secara manual.

1. Salin file environment contoh dan sesuaikan:
   ```bash
   cp .env.docker.example .env.docker
   ```
2. Build dan jalankan seluruh container:
   ```bash
   docker compose up -d --build
   ```
3. Dependency PHP terpasang otomatis saat container `app` pertama kali berjalan. Jika Anda mengubah `composer.json`, jalankan ulang perintah berikut:
   ```bash
   docker compose exec app composer install
   ```
4. Install dependency JavaScript dan proses asset:
   ```bash
   docker compose exec app npm install
   docker compose exec app npm run build
   ```
   Untuk hot reload selama pengembangan:
   ```bash
   docker compose exec app npm run dev -- --host
   ```
5. Selesaikan inisialisasi Laravel:
   ```bash
   docker compose exec app php artisan key:generate
   docker compose exec app php artisan migrate --seed
   docker compose exec app php artisan storage:link
   ```

Setelah seluruh langkah di atas, aplikasi siap diakses di `http://localhost:8000`. MySQL dapat dijangkau via `localhost:33060`, sedangkan Redis tersedia di `localhost:63790`. Gunakan `docker compose down` untuk mematikan seluruh container.

## Perintah Berguna
- `php artisan test` — menjalankan seluruh pengujian aplikasi
- `php artisan migrate:fresh --seed` — reset database dan jalankan seeder ulang
- `npm run lint` / `npm run build` — sesuaikan dengan skrip npm yang tersedia
- `composer dump-autoload` — regenerasi autoloader Composer

## Lisensi
Proyek ini menggunakan lisensi MIT. Anda bebas memanfaatkan, memodifikasi, dan mendistribusikan ulang selama tetap mencantumkan lisensi yang sama.
