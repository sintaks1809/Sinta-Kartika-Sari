<?php
session_start();
include '../../koneksi/koneksi.php';

$nama_barang	            = mysqli_real_escape_string($db, $_POST['nama_barang']);
$type_barang		= mysqli_real_escape_string($db, $_POST['type_barang']);
$ruangan	            = mysqli_real_escape_string($db, $_POST['ruangan']);
$penanggung_jawab       = mysqli_real_escape_string($db, $_POST['penanggung_jawab']);
$jumlah       				    = mysqli_real_escape_string($db, $_POST['jumlah']);
$tahun_anggaran       				    = mysqli_real_escape_string($db, $_POST['tahun_anggaran']);
$gambar			            = $_FILES['gambar']['name'];

$nama_file_lengkap 		= $_FILES['gambar']['name'];
$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
$tipe_file 		= $_FILES['gambar']['type'];
$ukuran_file 	= $_FILES['gambar']['size'];
$tmp_file 		= $_FILES['gambar']['tmp_name'];


if (
	!($nama_barang == '') and !($type_barang == '') and !($ruangan == '') and !($penanggung_jawab == '') and !($jumlah == '')   and !($tahun_anggaran == '') and
	($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)
) {

	$nama_baru = $nama_barang . $ext_file;
	$path = "../barangbaru/" . $nama_baru;
	move_uploaded_file($tmp_file, $path);

	$sql = "INSERT INTO tb_barangbaru(nama_barang, type_barang, ruangan, penanggung_jawab, jumlah,tahun_anggaran, gambar)
				values ('$nama_barang', '$type_barang', '$ruangan', '$penanggung_jawab', '$jumlah','$tahun_anggaran','$nama_baru')";
	$execute = mysqli_query($db, $sql);

	echo "<Center><h2><br>Terima Kasih<br>Barang Baru Telah Didaftarkan ke Sistem</h2></center>
			<meta http-equiv='refresh' content='2;url=../databarangbaru.php'>";
} else {
	echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../inputbarangbaru.php'>";
}
