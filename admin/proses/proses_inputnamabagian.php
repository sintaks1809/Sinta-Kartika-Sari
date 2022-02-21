<?php
session_start();
include '../../koneksi/koneksi.php';

$nama_bagian                      = mysqli_real_escape_string($db, $_POST['nama_bagian']);


if (
    !($nama_bagian == '')
) {

    $sql = "INSERT INTO tb_nama_bagian (nama_bagian)
				values ('$nama_bagian')";
    $execute = mysqli_query($db, $sql);

    echo "<Center><h2><br>Terima Kasih<br>Data Nama Jabatan Telah Dimasukkan</h2></center>
    <meta http-equiv='refresh' content='2;url=../datanamabagian.php'>";
} else {
    echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
    <meta http-equiv='refresh' content='2;url=../inputnamabagian.php'>";
}
