<?php

// Memanggil Koneksi Database
include "koneksi.php";

session_start();

// Memeriksa apakah pengguna sudah login
if(!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    header("location:login.php?pesan=belum_login");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            margin-bottom: 50px;
            margin-top: 100px;
            position: relative;
        }

        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 40px;
            z-index: 99999;
        }

        .float {
            background-color: #0f52ba;
            margin-top: -20px;
            height: 60px;
        }

        .left {
            float: left;
            padding: 5px;
            box-sizing: border-box;
            margin-left: 20px;
        }

        h4 {
            display: inline-block; 
            font-family: 'agency fb';
            font-weight: bold;
            padding: 15px;
            text-transform: uppercase;
            font-size: 30px;
            margin-top: -7px;
            color: white;
            /* border: 1px solid black; */
        }

        .right {
            float: right;

        }

        .left img {
            width: 41px;
            margin-top: -17px;
        }

        .right img {
            width: 90px; 
            margin-top: -15px;
        }

        .modal-dialog {
            margin-top: 100px;
        }

        .logo-background {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-image: url('image/usm.png'); 
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            width: 800px; 
            height: 800px;
            opacity: 0.2;
            z-index: 0;
        }

    </style>
</head>

<body>

    <div class="logo-background">

    </div>

    <div class="mt-3 top-bar">
        <div class="float">
            <nav class="left">
                <a href="https://usm.ac.id/id/"><img src="image/usm.png" alt=""></a>
                <h4>Universitas Semarang</h4>
            </nav> 
            <nav class="right">
                <a href="logout.php" id="logout-button"><img src="image/tombol-logout1.png" alt=""></a>
            </nav>
        </div>
    </div>

    <div class="container">

            <div class="judul">
                <h1 style="text-align: center; font-family: Montserrat; color: #008B8B; font-weight: bold;" >Daftar Data Mahasiswa</h1>
                <br>
            </div>

           <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <a href="cetak_pdf.php" class="btn btn-secondary mb-3">
                    Cetak 
                </a>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Nim</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>

                    <?php

                    // Persiapan Menampilkan Data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_mhs ORDER BY id_mhs");
                    while($data = mysqli_fetch_array($tampil)) :

                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td><?= $data['prodi'] ?></td>
                            <td>
                                <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                            </td>
                        </tr>

                        <!-- Awal Modal Ubah -->
                        <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_mhs" value="<?= $data['id_mhs'] ?>">

                                        <div class="modal-body">
                                        
                                            <div class="mb-3">
                                                <label class="form-label">NIM</label>
                                                <input type="text" class="form-control" name="tnim" value="<?= $data['nim'] ?>" placeholder="Masukkan NIM Anda!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Lengkap Anda!">
                                            </div>

                                            <div class="mb-3">
                                                <label  class="form-label">Alamat</label>
                                                <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat'] ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label  class="form-label" name="talamat">Prodi</label>
                                                <select class="form-select" name="tprodi">
                                                    <option value="<?= $data['prodi'] ?>"><?= $data['prodi']?></option>
                                                    <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                                                    <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                                    <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                                    <option value="S1 - Ilmu Komunikasi">S1 - Ilmu Komunikasi</option>
                                                    <option value="S1 - Pariwisata">S1 - Pariwisata</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Ubah -->

                        <!-- Awal Modal Hapus -->
                        <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_mhs" value="<?= $data['id_mhs'] ?>">

                                        <div class="modal-body">
                                        
                                           <h5 class="text-center">Apakah anda yakin akan menghapus data ini?<br>
                                                <span class="text-danger"><?= $data['nim']?> - <?= $data['nama']?></span>
                                           </h5>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary" name="bhapus">Ya, Hapus aja!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Hapus -->

                    <?php endwhile; ?>
                </table>



                <!-- Awal Modal Tambah -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Form Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi_crud.php">
                            <div class="modal-body">
                                
                                    <div class="mb-3">
                                        <label class="form-label">NIM</label>
                                        <input type="text" class="form-control" name="tnim" placeholder="Masukkan NIM Anda!">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap Anda!">
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label">Alamat</label>
                                        <textarea class="form-control" name="talamat" rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label" name="talamat">Prodi</label>
                                        <select class="form-select" name="tprodi">
                                            <option>- Pilih Fakultas -</option>
                                            <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                                            <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                            <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                            <option value="S1 - Ilmu Komunikasi">S1 - Ilmu Komunikasi</option>
                                            <option value="S1 - Pariwisata">S1 - Pariwisata</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah -->



            </div>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
