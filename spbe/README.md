# Sistem Informasi Manajemen Perubahan TI Badan Pusat Statistik

### Framework 

* Laravel 9
* Bootstrap

### Installing

* git clone
```
git clone https://github.com/PradanaIN/spbe-bps.git
```

* install composer
```
composer install
```
* apabila terjadi error, update composer
```
composer update
```
* install dependency sweet-alert
```
composer require realrashid/sweet-alert
```
```
php artisan sweetalert:publish
```
* menghubungkan strorage
```
php artisan storage:link
```
* import database laravel_spbe atau migrasi database (pastikan sudah memiliki tabel database laravel_spbe)
```
php artisan migrate:fresh --seed
```
* menjalankan laravel pada localhost, selesai.
```
php artisan serve
```

## Developer
```
3SI3 222011330 Arnoldy Fatwa Rahmadin
3SI3 222011792 Erni Kurnia Putri
3SI3 222011636 Faiq Rosadi Arridho
3SI3 222011379 Maulana Pandudinata
3SI3 222011739 Muhammad Naufal Faishal
3SI3 222011436 Novanni Indi Pradana
3SI3 222011486 Rizquna Nurul Fatihah
3SI3 222011560 Widia Astuti
```

## Klien
```
Direktorat Sistem Informasi Statistik
```
