# Technocorner2015-EEC

## Kata pengantar

Web EEC ini dikembangkan dengan [Framework Laravel](laravel.com) karena sekaligus sekalian untuk belajar dan biar lebih aman sistemnya (karena membangun dari framework yang sudah di desain oleh professional dan rapi). **Semua file web ada di dalam folder www.** Selain itu web ini juga menggunakan [Virtual Machine Vagrant](vagrantup.com), vagrant ini berfungsi sekedar untuk menjalankan seluruh web server dalam OS yang berbeda (OS di dalam OS, menjalan kan server web ini (Ubuntu) dalam windows/Linux kita sendiri). Tidak wajib harus menginstall vagrant, boleh saja langsung install Apache di komputer.

## List teknologi/framework yang digunakan

- [Laravel](laravel.com)
- [Vagrant](vagrantup.com)
- [Twitter Bootstrap](getbootstrap.com) - untuk desain awal CSS, selagi menunggu desain beneran
- [HTML 5 Boilerplate](html5boilerplate.com) - kerangka awal html5 yang rapi

## Cara menginstall

### Tanpa Virtual Machine

Program yang **HARUS** ada :

1. Git clone semua repo ini
2. Install Apache, PHP, MySQL (LAMP/WAMP/sejenisnya)
3. Pastikan mod_rewrite dan php5-mcrypt sudah aktif
3. Install Nodejs
4. Copy semua yang ada di dalam direktori **www** ke dalam folder www nya Apache
5. Ubah setting site-available apache agar public_html jadi ke folder /www/public_html/onlinetest (tidak perlu di server produksi)
5. Buka folder www/laravel4 dan jalankan perintah `php composer.phar install`
6. Buka folder www/public_html/onlinetes dan jalankan perintah `npm install`
6. Seharusnya sudah dapat dibuka dengan lancar *amin*

### Dengan Virtual Machine

1. Install VirtualBox
2. Install Vagrant
3. Buat direktori yang untuk menyimpan file file ini
4. git clone semua repo ini ke dalam direktori itu
5. Buka direktori itu dalam command line
6. Ketikkan perintah **vagrant up** untuk menjalankan vm **update, minta file vm box dari Dhika dulu**
7. Website bisa dibuka dengan alamat **localhost:10088** atau **192.168.2.2**

*NB kalau menjalankan vagrant up, berarti akan mendownload file installer Ubuntu yang kira2 besarnya 500 MB, jadi posisikan diri dulu di wifi yang kenceng.*

## Progress

- Selesai mensetup semua library dan frameworknya
- Baru membuat kasaran halaman login


## To Do

- Buat desain alur penggunaan/model/DB
- Buat desain UI
- Buat Model User
- Buat DB penyimpan