<?php
session_start();
include '../../koneksi/koneksi.php';

$id                                      = mysqli_real_escape_string($db, $_POST['id_kabupaten']);
$nama_kabupaten                              = mysqli_real_escape_string($db, $_POST['nama_kabupaten']);

$sql1          = "SELECT * FROM tb_kabupaten where id_kabupaten ='" . $id . "'";
$query1      = mysqli_query($db, $sql1);
$data         = mysqli_fetch_array($query1);

if (!($nama_kabupaten == '')) {

    $sql1 = "UPDATE tb_kabupaten SET   nama_kabupaten = '$nama_kabupaten'

                                        WHERE id_kabupaten = $id";

    $execute = mysqli_query($db, $sql1);

    echo "<Center><h2><br>Data Kabupaten telah diubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-kabupaten.php?id_kabupaten=" . $id . "'>";
} else {
    echo "<Center><h2>Silahkan Ulangi, Data Kabupaten Belum Berubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../editkabupaten.php?id_kabupaten=" . $id . "'>";
}
