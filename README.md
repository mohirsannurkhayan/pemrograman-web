# 📚 Sistem Informasi Data Mahasiswa - Universitas Semarang

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

> Tugas Akhir Mata Kuliah Pemrograman Web — Sistem manajemen data mahasiswa berbasis web dengan fitur autentikasi dan CRUD lengkap.

---

## 📋 Deskripsi Proyek

Aplikasi web berbasis PHP dan MySQL untuk mengelola data mahasiswa Universitas Semarang. Sistem ini memungkinkan admin untuk melakukan operasi CRUD (Create, Read, Update, Delete) terhadap data mahasiswa secara efisien melalui antarmuka yang sederhana dan responsif.

---

## ✨ Fitur Utama

- 🔐 **Login & Autentikasi** — Sistem login dengan session untuk keamanan akses
- 📋 **Daftar Data Mahasiswa** — Menampilkan seluruh data mahasiswa dalam bentuk tabel
- ➕ **Tambah Data** — Form modal untuk menambahkan data mahasiswa baru
- ✏️ **Ubah Data** — Modal form untuk mengedit data mahasiswa yang sudah ada
- 🗑️ **Hapus Data** — Menghapus data mahasiswa dari database
- 🖨️ **Cetak PDF** — Fitur cetak daftar mahasiswa dalam format PDF menggunakan TCPDF

---

## 🗂️ Struktur Direktori

```
Pemrograman Web/
├── .vscode/                  # Konfigurasi Visual Studio Code
├── image/                    # Folder gambar/aset
│   ├── gambar-usm.jpeg       # Gambar Universitas Semarang
│   ├── tombol-logout.png     # Ikon tombol logout
│   ├── tombol-logout1.png    # Ikon tombol logout (alternatif)
│   └── usm.png               # Logo Universitas Semarang
├── TCPDF-main/               # Library TCPDF untuk generate PDF
│   ├── config/
│   ├── examples/
│   ├── fonts/
│   ├── include/
│   ├── tools/
│   ├── CHANGELOG.TXT
│   ├── composer.json
│   ├── LICENSE.TXT
│   ├── README.md
│   ├── tcpdf_autoconfig.php
│   ├── tcpdf_barcodes_1d.php
│   ├── tcpdf_barcodes_2d.php
│   ├── tcpdf_import.php
│   ├── tcpdf_parser.php
│   ├── tcpdf.php
│   └── VERSION
├── aksi_crud.php             # Proses operasi CRUD (tambah, ubah, hapus)
├── cetak_pdf.php             # Generate dan cetak data mahasiswa ke PDF
├── index.php                 # Halaman utama (daftar data mahasiswa)
├── koneksi.php               # Konfigurasi koneksi database
├── login.php                 # Halaman form login
├── login_exe.php             # Proses autentikasi login
├── logout.php                # Proses logout dan hapus session
└── README.md                 # Dokumentasi proyek
```

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| PHP | Backend / server-side scripting |
| MariaDB / MySQL | Database management |
| HTML5 & CSS3 | Struktur dan tampilan halaman |
| Bootstrap | Framework CSS responsif |
| TCPDF | Library PHP untuk generate file PDF |
| phpMyAdmin | Manajemen database via GUI |
| XAMPP / Laragon | Local development server |
| Visual Studio Code | Code editor |

---

## ⚙️ Cara Instalasi & Menjalankan

### Prasyarat
Pastikan sudah menginstall salah satu dari:
- [XAMPP](https://www.apachefriends.org/) atau [Laragon](https://laragon.org/)

### Langkah Instalasi

**1. Clone repositori ini**
```bash
git clone https://github.com/mohirsannurkhayan/pemrograman-web.git
```

**2. Pindahkan ke folder htdocs**
```
Salin folder ke: C:/xampp/htdocs/Pemrograman Web/
```

**3. Buat database**
- Buka `http://localhost/phpmyadmin`
- Buat database baru dengan nama `crude_php`
- Import file SQL: klik tab **Import** → pilih file `crude_php.sql`

**4. Konfigurasi koneksi database**

Buka file `koneksi.php` dan sesuaikan:
```php
<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "crude_php";

$koneksi = mysqli_connect($host, $user, $password, $database);
?>
```

**5. Jalankan aplikasi**

Buka browser dan akses:
```
http://localhost/Pemrograman%20Web/login.php
```

---

## 🔑 Akun Default

| Username | Password |
|----------|----------|
| admin    | 12345 |

---

## 📊 Struktur Database

Nama database: **`crude_php`**

### Tabel `tbl_mhs`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id_mhs | int(11) — PK, AUTO_INCREMENT | ID unik mahasiswa |
| nim | varchar(20) | Nomor Induk Mahasiswa |
| nama | varchar(100) | Nama lengkap mahasiswa |
| alamat | text | Alamat mahasiswa |
| prodi | varchar(100) | Program studi |

### Tabel `tbl_pengguna`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | int(11) — PK, AUTO_INCREMENT | ID unik pengguna |
| username | varchar(50) | Username untuk login |
| password | varchar(255) | Password (terenkripsi) |
| nama_lengkap | varchar(100) | Nama lengkap pengguna |

---

## 🖥️ Tampilan Aplikasi

### Halaman Login
Form login dengan validasi username dan password untuk mengamankan akses sistem.

### Halaman Data Mahasiswa
Tabel daftar mahasiswa lengkap dengan kolom: No, NIM, Nama Lengkap, Alamat, Jurusan, dan Aksi (Ubah/Hapus).

### Form Tambah / Edit Data
Modal popup untuk menambah atau mengubah data mahasiswa dengan field: NIM, Nama Lengkap, Alamat, dan Prodi.

### Cetak PDF
Fitur untuk mencetak seluruh data mahasiswa dalam format PDF menggunakan library TCPDF.

---

## 👨‍💻 Informasi Pengembang

| | |
|--|--|
| **Nama** | [Nama Lengkap Kamu] |
| **NIM** | [NIM Kamu] |
| **Mata Kuliah** | Pemrograman Web |
| **Universitas** | Universitas Semarang |
| **Tahun** | 2024/2025 |

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan tugas akhir mata kuliah Pemrograman Web. Bebas digunakan sebagai referensi belajar.

---

> ⭐ Jika repositori ini bermanfaat, jangan lupa beri bintang!
