<?php

// Memanggil Koneksi Database
include "koneksi.php";

// Menguji Jika Tombol Simpan di Klik
if(isset($_POST['bsimpan'])){

    // Persiapan Simpan Data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_mhs (nim, nama, alamat, prodi)
                                     VALUES ('$_POST[tnim]',
                                             '$_POST[tnama]',
                                             '$_POST[talamat]',
                                             '$_POST[tprodi]') ");
    // Jika Simpan Sukses
    if($simpan){
        echo "<script>
                alert('Simpan Data Sukses!');
                document.location='index.php';
            </script>";
    } else{
        echo "<script>
                alert('Simpan Data Gagal!');
                document.location='index.php';
            </script>";
    }
}



// Menguji Jika Tombol Ubah di Klik
if(isset($_POST['bubah'])){

    // Persiapan Ubah Data
    $ubah = mysqli_query($koneksi, "UPDATE tbl_mhs SET 
                                                        nim = '$_POST[tnim]',
                                                        nama = '$_POST[tnama]',
                                                        alamat = '$_POST[talamat]',
                                                        prodi = '$_POST[tprodi]'
                                                    WHERE id_mhs = '$_POST[id_mhs]'
                                                        ");


    // Jika Ubah Sukses
    if($ubah){
        echo "<script>
                alert('Ubah Data Sukses!');
                document.location='index.php';
            </script>";
    } else{
        echo "<script>
                alert('Ubah Data Gagal!');
                document.location='index.php';
            </script>";
    }
}



// Menguji Jika Tombol Hapus di Klik
if(isset($_POST['bhapus'])){

    // Persiapan Hapus Data
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_mhs WHERE id_mhs = '$_POST[id_mhs]'");


    // Jika Hapus Sukses
    if($hapus){
        echo "<script>
                alert('Hapus Data Sukses!');
                document.location='index.php';
            </script>";
    } else{
        echo "<script>
                alert('Hapus Data Gagal!');
                document.location='index.php';
            </script>";
    }
}




?>