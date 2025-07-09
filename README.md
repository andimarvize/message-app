<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">Message App - Laravel</h1>

## Deskripsi

Aplikasi sederhana berbasis Laravel untuk pengiriman dan pengelolaan pesan antar pengguna. Project ini merupakan bagian dari tugas akademik dengan fokus pada implementasi fitur-fitur dasar Laravel seperti autentikasi, CRUD, routing, dan controller.

---

## ✅ Fitur Aplikasi

- Registrasi user
- Login dan Logout user
- Kirim pesan ke user lain
- Melihat daftar pesan yang masuk dan keluar
- Melihat detail pesan
- Hapus pesan dari halaman detail

---

## 🚀 Cara Menjalankan Aplikasi

### 1. Persiapan Tools
Pastikan Anda sudah menginstal:
- XAMPP (Apache & MySQL)
- Git
- Composer
- Node.js & NPM

### 2. Clone Project
```bash
git clone https://github.com/username/message-app.git
cd message-app

#Install Dependency Laravael
composer install

# Setting Database 
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=

#menggunakan compile asset frontend
npm install 
npm run dev

#menjalankan server 
php artisan serve 

buka browser dan akses 
http://127.0.0.1:8000/ - http://localhost:8000
