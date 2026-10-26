# Event Management System

Panduan singkat untuk menjalankan aplikasi ini di lingkungan local.

## Persyaratan

- PHP 8.3+
- Composer
- Node.js dan npm
- SQLite (database default proyek)

Pastikan `php` dan `composer` di terminal Anda menggunakan PHP 8.3. Jika ada beberapa versi PHP terinstal, cek:

```powershell
php -v
composer check-platform-reqs --no-dev
```

## 1. Clone project

```powershell
git clone https://github.com/DadenJulianto/event-management-system.git
cd event-management-system
```

## 2. Install dependency PHP

```powershell
composer install
```

## 3. Siapkan environment

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Pastikan file `.env` sudah berisi konfigurasi SQLite seperti ini:

```env
APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Jika file `database/database.sqlite` belum ada, buat terlebih dahulu:

```powershell
New-Item -ItemType File -Path database\database.sqlite -Force
```

## 4. Jalankan migration

```powershell
php artisan migrate
```

## 5. Jalankan seeder (opsional)

Seeder demo hanya untuk environment local/testing. Setelah mengisi credential demo di `.env`, jalankan:

```powershell
php artisan db:seed
```

Contoh variabel yang perlu diisi di `.env`:

```env
DEMO_ADMIN_EMAIL=admin@example.test
DEMO_ADMIN_PASSWORD=yourStrongPassword123
DEMO_EO_EMAIL=eo@example.test
DEMO_EO_PASSWORD=yourStrongPassword123
PAYMENT_SIMULATOR_ENABLED=true
```

## 6. Install dependency frontend

```powershell
npm install
```

## 7. Build aset frontend

```powershell
npm run build
```

## 8. Jalankan aplikasi

Buka terminal baru lalu jalankan:

```powershell
php artisan serve
```

Lalu buka browser ke URL yang ditampilkan, biasanya:

- http://127.0.0.1:8000

Untuk mode development frontend, jalankan di terminal kedua:

```powershell
npm run dev
```

## 9. Jalankan scheduler (opsional tapi disarankan)

Agar reservation expired bisa diproses, jalankan scheduler:

```powershell
php artisan schedule:work
```

## 10. Jalankan test

```powershell
php artisan test
```

## 11. Akun default / login

Setelah login, Anda dapat mendaftar sebagai customer dan mengajukan profil EO. Admin dapat melakukan approval untuk mengubah status EO menjadi approved.

Jika Anda memakai seeder demo, akun yang dibuat biasanya mengacu pada konfigurasi `DEMO_ADMIN_EMAIL` dan `DEMO_EO_EMAIL` di `.env`.

## Catatan penting

- Jangan menjalankan `php artisan migrate:fresh` di database yang sudah dipakai untuk data nyata.
- Gunakan PHP 8.3 saat menjalankan Composer dan Artisan.
- Simulator pembayaran hanya untuk local/testing dan bukan payment gateway nyata.
- Untuk deployment nyata, gunakan HTTPS, secret manager, dan konfigurasi keamanan yang sesuai.

## Struktur dasar aplikasi

- Frontend: Blade + Tailwind + Vite
- Backend: Laravel 13
- Database: SQLite
- Auth: Laravel Fortify / middleware role
- Fitur utama: EO approval, event review, publikasi, checkout, ticket, check-in, refund, dan laporan
