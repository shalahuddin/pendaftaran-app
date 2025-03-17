# Aplikasi Pendaftaran Sederhana (Laravel + API)

Aplikasi ini adalah aplikasi pendaftaran sederhana yang dibuat menggunakan Laravel dan MySQL, dilengkapi dengan fitur CRUD (Create, Read, Update, Delete) dan API (RESTful) yang dapat digunakan oleh aplikasi lain atau diuji menggunakan Postman.

## Fitur Utama

-   Form pendaftaran dengan validasi input
-   Upload foto
-   CRUD data pendaftar via web
-   CRUD API (Insert, Select, Update, Delete) berbasis JSON
-   Export data ke PDF

## Requirements

-   PHP >= 8.1
-   Composer
-   MySQL / MariaDB
-   Laravel >= 10

---

## Langkah Instalasi

### 1. Clone atau Copy Project

```bash
git clone https://github.com/shalahuddin/pendaftaran-app.git
cd pendaftaran-app
```

### 2. Install Dependency Laravel

```bash
composer install
```

### 3. Setup File Environment

Buat file `.env`:

```bash
cp .env.example .env
```

Lalu edit `.env` sesuai konfigurasi database lokal kamu:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_kamu
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key Laravel

```bash
php artisan key:generate
```

### 5. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 6. (Opsional) Buat Symlink untuk Storage

```bash
php artisan storage:link
```

### 7. Jalankan Server Laravel

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://127.0.0.1:8000`.

---

## API Endpoint

| Method | Endpoint             | Deskripsi              |
| ------ | -------------------- | ---------------------- |
| GET    | /api/pendaftars      | Ambil semua data       |
| GET    | /api/pendaftars/{id} | Ambil detail pendaftar |
| POST   | /api/pendaftars      | Tambah data pendaftar  |
| PUT    | /api/pendaftars/{id} | Update data pendaftar  |
| DELETE | /api/pendaftars/{id} | Hapus data pendaftar   |

### **Note:**

-   Pastikan saat POST/PUT menyertakan `Content-Type: multipart/form-data` karena ada upload file `foto`.
-   Coba import file **postman_collection.json** untuk testing lebih mudah via Postman.

---

## Testing API dengan Postman

1. Import file `postman_collection.json`.
2. Sesuaikan URL jika server lokal berjalan di port berbeda.
3. Jalankan endpoint API sesuai kebutuhan.

---

## Credit

Dibuat oleh: Teuku Muhammad Shalahuddin  
Framework: Laravel 10  
Database: MySQL

---
