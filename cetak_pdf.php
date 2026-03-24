<?php
// Memanggil koneksi database
include "koneksi.php";
// Memanggil TCPDF
require_once('TCPDF-main/tcpdf.php');

// Fungsi untuk mendapatkan nama bulan dalam bahasa Indonesia
function getNamaBulan($bulan)
{
    $namaBulan = [
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
    ];

    return $namaBulan[(int)$bulan];
}

// Fungsi untuk mendapatkan nama hari dalam bahasa Indonesia
function getNamaHari($hari)
{
    $namaHari = [
        "Sunday" => "Minggu",
        "Monday" => "Senin",
        "Tuesday" => "Selasa",
        "Wednesday" => "Rabu",
        "Thursday" => "Kamis",
        "Friday" => "Jumat",
        "Saturday" => "Sabtu"
    ];

    return $namaHari[$hari];
}

// Membuat instance TCPDF
$pdf = new TCPDF();

// Menyetel informasi dokumen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Data Mahasiswa');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Menyetel font
$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

// Menyetel margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Menyetel auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Menyetel image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Menambahkan halaman
$pdf->AddPage();

// Menyetel zona waktu ke WIB (Waktu Indonesia Barat)
date_default_timezone_set('Asia/Jakarta');

// Tanggal dan jam cetak
$tanggalCetak = getNamaHari(date('l')) . ', ' . date('j') . ' ' . getNamaBulan(date('n')) . ' ' . date('Y');
$jamCetak = date('H:i:s');

// Konten HTML untuk di-render sebagai PDF
$html = '<h1>Data Mahasiswa</h1>
        <p style="text-align: right;">Tanggal Cetak: ' . $tanggalCetak . ' ' . $jamCetak . '</p>
        <style>
            th {
                padding: 5px 3px; /* Sesuaikan nilai padding untuk mengatur ruang antar teks */
            }
        </style>
        <table border="1" cellspacing="0" cellpadding="4">
            <tr>
                <th><b>No.</b></th>
                <th><b>NIM</b></th>
                <th><b>Nama Lengkap</b></th>
                <th><b>Alamat</b></th>
                <th><b>Jurusan</b></th>
            </tr>';

// Mengambil data dari database
$no = 1;
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_mhs ORDER BY id_mhs");
while($data = mysqli_fetch_array($tampil)) {
    $html .= '<tr>
                <td style="padding: 5px 3px;">' . $no++ . '</td>
                <td>' . $data['nim'] . '</td>
                <td>' . $data['nama'] . '</td>
                <td>' . $data['alamat'] . '</td>
                <td>' . $data['prodi'] . '</td>
              </tr>';
}

$html .= '</table>';

// Mencetak konten HTML
$pdf->writeHTML($html, true, false, true, false, '');

// Menutup dan output PDF sebagai unduhan
$pdf->Output('data_mahasiswa.pdf', 'D');
?>
