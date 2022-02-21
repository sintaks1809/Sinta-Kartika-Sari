<?php
session_start();
include '../../koneksi/koneksi.php';
$id				            = mysqli_real_escape_string($db, $_POST['id_barang']);
$nama_barang	            = mysqli_real_escape_string($db, $_POST['nama_barang']);
$type_barang		= mysqli_real_escape_string($db, $_POST['type_barang']);
$ruangan	            = mysqli_real_escape_string($db, $_POST['ruangan']);
$penanggung_jawab       = mysqli_real_escape_string($db, $_POST['penanggung_jawab']);
$jumlah       				    = mysqli_real_escape_string($db, $_POST['jumlah']);
$tahun_anggaran       				    = mysqli_real_escape_string($db, $_POST['tahun_anggaran']);
$gambar			            = $_FILES['gambar']['name'];


$sql  		= "SELECT * FROM tb_barangbaru where id_barang='" . $id . "'";
$query  	= mysqli_query($db, $sql);
$data 		= mysqli_fetch_array($query);

//jika gambar tidak ada
if ($gambar == '') {
	$ext			= substr($data['gambar'], strripos($data['gambar'], '.'));
	$nama_b  		= $nama_barang . $ext;
	rename("../barangbaru/" . $data['gambar'], "../barangbaru/" . $nama_b);
	$sql = "UPDATE tb_barangbaru set 
						nama_barang		            = '$nama_barang',
						type_barang		= '$type_barang',
						ruangan 			= '$ruangan',
						penanggung_jawab                = '$penanggung_jawab',
						jumlah 		= '$jumlah',
						tahun_anggaran 		= '$tahun_anggaran',
						gambar				= '$nama_b' 
				where id_barang = $id";

	$execute = mysqli_query($db, $sql);

	echo "<Center><h2><br>Data Barang Baru telah terubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../detail-barangbaru.php?id_barang=" . $id . "'>";
} else {

	$tipe_file 		= $_FILES['gambar']['type'];
	$ukuran_file 	= $_FILES['gambar']['size'];
	if (($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)) {
		unlink("../../admin/barangbaru/" . $data['gambar']);
		$ext_file		= substr($gambar, strripos($gambar, '.'));
		$tmp_file 		= $_FILES['gambar']['tmp_name'];

		$nama_baru = $nama_barang . $ext_file;
		$path = "../barangbaru/" . $nama_baru;
		move_uploaded_file($tmp_file, $path);

		$sql = "UPDATE tb_barangbaru set 
						nama_barang		            = '$nama_barang',
						type_barang		= '$type_barang',
						ruangan 			= '$ruangan',
						penanggung_jawab                = '$penanggung_jawab',
						jumlah 		= '$jumlah',
						tahun_anggaran 		= '$tahun_anggaran',
						gambar				= '$nama_baru' 
				where id_barang = $id";

		$execute = mysqli_query($db, $sql);

		echo "<Center><h2><br>Data Barang Baru telah terubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-barangbaru.php?id_barang=" . $id . "'>";
	} else {
		echo "<Center><h2><br>Gambar yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editbarangbaru.php?id_barang=" . $id . "'>";
	}
}
