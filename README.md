## Pawon Adji

Pawon Adji adalah website yang dibuat oleh tim 2nd Gear dengan tujuan menyebarluaskan usaha yang dimiliki oleh penjual, agar usahanya lebih dikenal dan pembeli bisa berkomunikasi dengan penjual.

## Prasyarat

Berikut beberapa hal yang perlu diinstal terlebih dahulu:

-   Composer (https://getcomposer.org/)
-   PHP ^8.2
-   MySQL 15.x
-   NodeJS ^20.x (https://nodejs.org/)
-   XAMPP (https://www.apachefriends.org/)

Jika Anda menggunakan XAMPP, PHP, dan MySQL sudah menjadi satu paket di dalam aplikasi XAMPP.

## Langkah-langkah Instalasi

1. Clone repository ini dengan memilih tipe protokol HTTPS atau SSH. Jika belum memiliki setup SSH, bisa menggunakan HTTPS.
```

2. Instal seluruh packages yang dibutuhkan.

```bash
$ npm install
```

```bash
$ composer install
```

3. Siapkan database dan atur value pada file `.env` sesuai dengan konfigurasi Anda.

```bash
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

4. Ubah value `APP_NAME=` pada file `.env` menjadi nama aplikasi yang Anda inginkan.

```bash
APP_NAME=
```

5. Ubah value `APP_TIMEZONE=` pada file `.env` menjadi lokasi Timezone Anda.

```bash
APP_TIMEZONE=
```

6. Migrate seluruh migrasi dan seeding data palsu.

```bash
$ php artisan migrate:fresh --seed
```

7. Jalankan local server Laravel.

```bash
$ php artisan serve
```

```bash
INFO  Server running on [http://127.0.0.1:8000].

Press Ctrl+C to stop the server
```

8. Jalankan juga development server untuk NPM.

```bash
$ npm run dev
```

```bash
> dev
> vite


  VITE v5.4.9  ready in 341 ms

  ➜  Local:   http://localhost:5173/
  ➜  Network: use --host to expose
  ➜  press h + enter to show help

  LARAVEL v11.28.1  plugin v

  ➜  APP_URL: http://localhost

```

## User default aplikasi untuk login

```bash
Email   : pembeli@mail.com
Pass    : 12345678

Email : penjual@mail.com
Pass : 12345678
```

## Dibuat dengan

-   Laravel 12 (https://laravel.com/)
- 
