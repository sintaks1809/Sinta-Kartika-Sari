<?php
session_start();
include '../../koneksi/koneksi.php';

$golongan                      = mysqli_real_escape_string($db, $_POST['golongan']);


if (
	!($golongan == ''))
{

	$sql = "INSERT INTO tb_golongan (golongan)
				values ('$golongan')";
	$execute = mysqli_query($db, $sql);

    echo "<Center><h2><br>Terima Kasih<br>Data Golongan Telah Dimasukkan</h2></center>
    <meta http-equiv='refresh' content='2;url=../datagolongan.php'>";
} else {
echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
    <meta http-equiv='refresh' content='2;url=../inputgolongan.php'>";
}