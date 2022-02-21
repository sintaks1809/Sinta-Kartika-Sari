<?php
session_start();
include '../../koneksi/koneksi.php';

$nama_barang                = mysqli_real_escape_string($db, $_POST['nama_barang']);
$type_barang                         = mysqli_real_escape_string($db, $_POST['type_barang']);
$jumlah                      = mysqli_real_escape_string($db, $_POST['jumlah']);
$satuan                     = mysqli_real_escape_string($db, $_POST['satuan']);
$nama_pegawai                     = mysqli_real_escape_string($db, $_POST['nama_pegawai']);
$ruangan                     = mysqli_real_escape_string($db, $_POST['ruangan']);
$tanggal_pengajuan                      = mysqli_real_escape_string($db, $_POST['tanggal_pengajuan']);

date_default_timezone_set('Asia/Jakarta');
$thnNow                     = date("Y");
$tanggal_pengajuan                    = date('Y-m-d', strtotime($tanggal_pengajuan));


if (
    !($nama_barang == '') and !($type_barang == '') and !($jumlah == '') and !($satuan == '') and
    !($nama_pegawai == '') and !($ruangan == '') and !($tanggal_pengajuan == '')
) {

    $sql1 = "INSERT INTO tb_pengajuan (nama_barang,type_barang,jumlah,satuan,nama_pegawai,ruangan,tanggal_pengajuan)
    
	values ('$nama_barang','$type_barang','$jumlah','$satuan','$nama_pegawai','$ruangan','$tanggal_pengajuan')";
    $execute = mysqli_query($db, $sql1);

    echo "<Center><h2><br>Terima Kasih<br>Data Permintaan Barang Telah Didaftarkan ke Sistem</h2></center>
			<meta http-equiv='refresh' content='2;url=../datapengajuan.php'>";
} else {
    echo "<Center><h2>Silahkan isi semua kolom lalu tekan submit<br>Terima Kasih</h2></center>
			<meta http-equiv='refresh' content='2;url=../datapengajuan.php'>";
}
