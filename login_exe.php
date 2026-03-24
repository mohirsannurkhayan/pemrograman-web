<?php
session_start();
include "koneksi.php";

// Menguji jika form login telah di-submit
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna dengan username dan password yang sesuai
    $query = "SELECT * FROM tbl_pengguna WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    // Menguji hasil dari query
    if($row) {
        // Jika pengguna ditemukan, set session dan arahkan ke halaman index.php
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        // Jika pengguna tidak ditemukan, arahkan kembali ke halaman login.php dengan pesan error
        header("location:login.php?pesan=gagal");
    }
} else {
    // Jika pengguna mencoba mengakses login_exe.php secara langsung tanpa melalui form login, arahkan ke halaman login.php
    header("location:login.php");
}

?>
