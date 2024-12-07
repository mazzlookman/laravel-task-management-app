# Task Management Simple

Task Management Simple ini adalah aplikasi sederhana untuk mengelola daftar tugas (to-do list) menggunakan Laravel 9. Aplikasi ini memiliki fitur autentikasi pengguna dan pengelolaan tugas.

## Features
- **Autentikasi User**
  - Login untuk logged user.
  - Logout dari sesi.
- **Manajemen Tugas**
  - Menampilkan daftar tugas.
  - Menambah tugas baru.
  - Menghapus tugas.

## Tech Stack
- **Backend**: Laravel 9
- **Storage**: Session
- **Middleware**: 
  - `OnlyGuestMiddleware`: Membatasi akses untuk user yang sudah login.
  - `OnlyMemberMiddleware`: Membatasi akses untuk user yang belum login.

## Routes
Berikut adalah rute-rute utama pada aplikasi:
- **Homepage**: `GET /`  
  Menampilkan halaman utama.
  
- **Autentikasi**:  
  - `GET /login`: Menampilkan halaman login (hanya untuk guest).
  - `POST /login`: Melakukan proses login (hanya untuk guest).
  - `POST /logout`: Melakukan proses logout (hanya untuk logged user).

- **Manajemen Tugas**:  
  - `GET /tasks`: Menampilkan daftar tugas (hanya untuk logged user).  
  - `POST /tasks`: Menambahkan tugas baru (hanya untuk logged user).  
  - `POST /tasks/{id}/delete`: Menghapus tugas berdasarkan ID (hanya untuk logged user).

## How to Run?
1. Clone repository ini:
   ```bash
   git clone https://github.com/mazzlookman/laravel-task-management-simple.git your-project-directory
   cd your-project-directory
   ```

2. Install dependensi dengan Composer:
   ```bash
   composer install
   ```

3. Salin file .env.example menjadi .env:
   ```bash
   cp .env.example .env
   ```

4. Generate app key
   ```bash
   php artisan key:generate
   ```
 
5. Jalankan server pengembangan:
   ```bash
   php artisan serve
   ```

6. Akses aplikasi di [http://localhost:8000](http://localhost:8000).

---
Thanks. ✨
