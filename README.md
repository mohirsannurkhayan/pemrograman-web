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
- ➕ **Tambah Data** — Form untuk menambahkan data mahasiswa baru
- ✏️ **Ubah Data** — Modal form untuk mengedit data mahasiswa yang sudah ada
- 🗑️ **Hapus Data** — Menghapus data mahasiswa dari database
- 🖨️ **Cetak Data** — Fitur cetak daftar mahasiswa

---

## 🖥️ Tampilan Aplikasi

### Halaman Login
Form login dengan validasi username dan password untuk mengamankan akses sistem.

### Halaman Data Mahasiswa
Tabel daftar mahasiswa lengkap dengan kolom: No, NIM, Nama Lengkap, Alamat, Jurusan, dan Aksi (Ubah/Hapus).

### Form Edit Data (Modal)
Modal popup untuk mengubah data mahasiswa dengan field: NIM, Nama Lengkap, Alamat, dan Prodi.

---

## 🗂️ Struktur Direktori

```
pemrograman-web/
├── index.php           # Halaman utama (daftar mahasiswa)
├── login.php           # Halaman login
├── logout.php          # Proses logout
├── tambah.php          # Proses tambah data
├── ubah.php            # Proses ubah data
├── hapus.php           # Proses hapus data
├── cetak.php           # Halaman cetak data
├── koneksi.php         # Konfigurasi koneksi database
├── css/
│   └── style.css       # Custom styling
└── assets/
    └── logo-unimus.png # Logo universitas
```

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|-----------|------------|
| PHP | Backend / server-side scripting |
| MySQL | Database management |
| HTML5 & CSS3 | Struktur dan tampilan halaman |
| Bootstrap | Framework CSS responsif |
| phpMyAdmin | Manajemen database via GUI |
| XAMPP | Local development server |

---

## ⚙️ Cara Instalasi & Menjalankan

### Prasyarat
Pastikan sudah menginstall salah satu dari:
- [XAMPP](https://www.apachefriends.org/) atau [Laragon](https://laragon.org/)

### Langkah Instalasi

1. **Clone repositori ini**
   ```bash
   git clone https://github.com/username/pemrograman-web.git
   ```

2. **Pindahkan ke folder htdocs**
   ```
   Salin folder ke: C:/xampp/htdocs/pemrograman web/
   ```

3. **Import database**
   - Buka `http://localhost/phpmyadmin`
   - Buat database baru dengan nama `db_mahasiswa`
   - Import file SQL yang tersedia di folder `database/`

4. **Konfigurasi koneksi database**

   Buka file `koneksi.php` dan sesuaikan:
   ```php
   <?php
   $host     = "localhost";
   $user     = "root";
   $password = "";
   $database = "db_mahasiswa";
   
   $koneksi = mysqli_connect($host, $user, $password, $database);
   ?>
   ```

5. **Jalankan aplikasi**

   Buka browser dan akses: `http://localhost/pemrograman%20web/login.php`

---

## 🔑 Akun Default

| Username | Password |
|----------|----------|
| admin    | admin123 |

---

## 📊 Struktur Database

### Tabel `mahasiswa`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT (PK, AUTO_INCREMENT) | ID unik mahasiswa |
| nim | VARCHAR(20) | Nomor Induk Mahasiswa |
| nama | VARCHAR(100) | Nama lengkap mahasiswa |
| alamat | TEXT | Alamat mahasiswa |
| jurusan | VARCHAR(50) | Program studi |

### Tabel `users`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT (PK, AUTO_INCREMENT) | ID user |
| username | VARCHAR(50) | Username login |
| password | VARCHAR(255) | Password (md5/hash) |

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
