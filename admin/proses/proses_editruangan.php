<?php
session_start();
include '../../koneksi/koneksi.php';

$id                                      = mysqli_real_escape_string($db, $_POST['id_ruangan']);
$ruangan                              = mysqli_real_escape_string($db, $_POST['ruangan']);

$sql1          = "SELECT * FROM tb_ruangan where id_ruangan ='" . $id . "'";
$query1      = mysqli_query($db, $sql1);
$data         = mysqli_fetch_array($query1);

if (!($ruangan == '')) {

    $sql1 = "UPDATE tb_ruangan SET   ruangan = '$ruangan'

                                        WHERE id_ruangan = $id";

    $execute = mysqli_query($db, $sql1);

    echo "<Center><h2><br>Data Nama Ruangan telah diubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-ruangan.php?id_ruangan=" . $id . "'>";
} else {
    echo "<Center><h2>Silahkan Ulangi, Data Nama Ruangan Belum Berubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../editruangan.php?id_ruangan=" . $id . "'>";
}
