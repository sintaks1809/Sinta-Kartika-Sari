<?php
session_start();
include '../../koneksi/koneksi.php';

$nama_kabupaten                      = mysqli_real_escape_string($db, $_POST['nama_kabupaten']);


if (
    !($nama_kabupaten == '')
) {

    $sql = "INSERT INTO tb_kabupaten (nama_kabupaten)
				values ('$nama_kabupaten')";
    $execute = mysqli_query($db, $sql);

    echo "<Center><h2><br>Terima Kasih<br>Data Kabupaten Telah Dimasukkan</h2></center>
    <meta http-equiv='refresh' content='2;url=../datakabupaten.php'>";
} else {
    echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
    <meta http-equiv='refresh' content='2;url=../inputkabupaten.php'>";
}
