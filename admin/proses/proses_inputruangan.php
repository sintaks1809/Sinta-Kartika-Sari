<?php
session_start();
include '../../koneksi/koneksi.php';

$ruangan                      = mysqli_real_escape_string($db, $_POST['ruangan']);


if (
    !($ruangan == '')
) {

    $sql = "INSERT INTO tb_ruangan (ruangan)
				values ('$ruangan')";
    $execute = mysqli_query($db, $sql);

    echo "<Center><h2><br>Terima Kasih<br>Data Nama Ruangan Telah Dimasukkan</h2></center>
    <meta http-equiv='refresh' content='2;url=../dataruangan.php'>";
} else {
    echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
    <meta http-equiv='refresh' content='2;url=../inputruangan.php'>";
}
