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
   git clone https://github.com/Fern-Aerell/ProductDocs.git
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

4. **Generate Kunci Aplikasi**

   Jalankan perintah berikut untuk menghasilkan kunci aplikasi:

   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database**

   Jalankan migrasi untuk membuat tabel yang diperlukan:

   ```bash
   php artisan migrate
   ```

6. **Jalankan Seeder untuk Data User**

   Setelah migrasi, jalankan seeder untuk membuat data Superadmin dan Admin sementara:

   ```bash
   php artisan db:seed
   ```

7. **Buat Link Storage**

   Jalankan perintah berikut untuk membuat link simbolik ke direktori storage:

   ```bash
   php artisan storage:link
   ```

8. **Menjalankan Server**

   Untuk menjalankan server pengembangan:

   ```bash
   php artisan serve
   ```

   Akses aplikasi di [http://127.0.0.1:8000](http://127.0.0.1:8000).

9. **Menjalankan NPM Dev**

    Untuk mengkompilasi aset frontend dan menjalankan server Vite:

    ```bash
    npm run dev
    ```

## Data user sementara

   - **Superadmin**
     - Email: `superadmin@gmail.com`
     - Password: `123`

   - **Admin**
     - Email: `admin@gmail.com`
     - Password: `123`

## Informasi Tambahan

Pastikan untuk memeriksa dokumentasi Laravel untuk informasi lebih lanjut mengenai fitur dan penggunaan.

---

Terima kasih telah menggunakan ProductDocs!