# ProductDocs

ProductDocs adalah aplikasi dokumentasi berbasis Laravel 11 yang memungkinkan admin untuk mengelola dokumentasi produk dengan mudah.

## Persyaratan

- PHP 8.2 atau lebih tinggi
- MySQL
- Composer
- Node.js dan NPM

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan proyek:

1. **Clone Repositori**

   ```bash
   git clone https://github.com/username/ProductDocs.git
   cd ProductDocs
   ```

2. **Instal Dependensi**

   Pastikan Composer dan NPM sudah terinstal, kemudian jalankan:

   ```bash
   composer install
   npm install
   ```

3. **Salin File `.env`**

   Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi sesuai dengan kebutuhan Anda:

   ```bash
   cp .env.example .env
   ```

6. **Generate Kunci Aplikasi**

   Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

   ```bash
   php artisan key:generate
   ```

7. **Migrasi Database**

   Jalankan migrasi untuk membuat tabel yang diperlukan:

   ```bash
   php artisan migrate
   ```

8. **Buat Link Storage**

   Jalankan perintah berikut untuk membuat link simbolik ke direktori storage:

   ```bash
   php artisan storage:link
   ```

9. **Menjalankan Server**

   Untuk menjalankan server pengembangan:

   ```bash
   php artisan serve
   ```

   Akses aplikasi di [http://127.0.0.1:8000](http://127.0.0.1:8000).

10. **Menjalankan NPM Dev**

    Untuk mengkompilasi aset frontend dan menjalankan server Vite:

    ```bash
    npm run dev
    ```

## Fitur Admin

- Akses halaman admin di `/admin`.
- Buat user admin baru dengan menjalankan perintah:

   ```bash
   php artisan make:filament-user
   ```

## Informasi Tambahan

Pastikan untuk memeriksa dokumentasi Laravel untuk informasi lebih lanjut mengenai fitur dan penggunaan.

---

Terima kasih telah menggunakan ProductDocs!
```
Kamu bisa mengganti URL repositori di langkah 1 sesuai dengan repositori GitHub milikmu. Jika ada yang perlu ditambahkan atau diperbaiki, beri tahu saya ya!
