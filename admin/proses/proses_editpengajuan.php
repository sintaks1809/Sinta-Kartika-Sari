<?php
session_start();
include '../../koneksi/koneksi.php';

$id                          = mysqli_real_escape_string($db, $_POST['id_pengajuan']);
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



$sql1         = "SELECT * FROM tb_pengajuan where id_pengajuan ='" . $id . "'";
$query       = mysqli_query($db, $sql1);
$data         = mysqli_fetch_array($query);

if (
    !($nama_barang == '') and !($type_barang == '') and !($jumlah == '') and !($satuan == '') and
    !($nama_pegawai == '') and !($ruangan == '') and !($tanggal_pengajuan == '')  and !($id == '')
) {

    $sql1 = "UPDATE tb_pengajuan set 
						nama_barang             = '$nama_barang',
						type_barang    		             = '$type_barang',
						jumlah	             = '$jumlah',
						satuan                  = '$satuan',
                        	nama_pegawai                  = '$nama_pegawai',
                            	ruangan                  = '$ruangan',
						tanggal_pengajuan		             = '$tanggal_pengajuan'
				where id_pengajuan = $id";

    $execute = mysqli_query($db, $sql1);

    echo "<Center><h2><br>Data Permintaan Barang telah diubah</h2></center>
        <meta http-equiv='refresh' content='2;url=../detail-pengajuan.php?id_pengajuan=" . $id . "'>";
} else {

    echo "<Center><h2>Silahkan Ulangi, Data Permintaan Barang Belum Berubah</h2></center>
        <meta http-equiv='refresh' content='2;url=../editpengajuan.php?id_pengajuan=" . $id . "'>";
}
