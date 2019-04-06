# Antipsen API

Antipsen (Anti Titip Absen) adalah sebuah projek aplikasi absensi siswa dari IT Club SMA Negeri 6 Depok. Repository ini merupakan bagian backend dari aplikasi Antipsen.

## Requirement

- PHP 7.2
- MySQL 5.7 / MariaDB 10.1

## Requirement for development

Untuk mengembangkan aplikasi ini, minimal dikomputer kalian harus terinstall:

- PHP 7.3
- MySQL 5.7 / MariaDB 10.1
- Apache 2.4
- Git
- Composer
- PostMan

Untuk PHP, MySQL/MariaDB, dan Apache bisa mendownload XAMPP karena XAMPP sudah mencakup 3 item tersebut. Kemudian untuk **Git** bisa di mendownload [Github for Desktop](https://desktop.github.com) atau [Git CLI](https://git-scm.com/downloads) dan untuk Composer bisa mendownload di [https://getcomposer.org/](https://getcomposer.org/).

## Instalasi

- Clone repository ini dengan cara mengetikkan perintah pada Terminal (Linux) atau Git Bash (Windows)

`git clone https://github.com/cybersixclub/antipsen-api`

- Kemudian ubah working directory ke folder antipsen-api dengan mengetikkan perintah

`cd antipsen-api`

- Setelah itu jalankan perintah `composer dump-autoload` untuk membuat file autoloader.

## Configuration

Setelah sukses terinstall, buka file `app.example.php` dan save as `app.php` kemudian ubah konfigurasi file app.php sesuai kebutuhan. Berlaku juga terhadap file `database.example.php`. Simpan file tersebut sebagai `database.php` dan ubah konfigurasi seperti host, username, password, dll. sesuai kebutuhan.

## Feature

- [ ] Absensi QR Code
- [ ] Konfigurasi akses untuk user

## License

Apache-2.0

