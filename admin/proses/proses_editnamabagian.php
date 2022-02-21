<?php
session_start();
include '../../koneksi/koneksi.php';

$id                                      = mysqli_real_escape_string($db, $_POST['id_bagian']);
$nama_bagian                              = mysqli_real_escape_string($db, $_POST['nama_bagian']);

$sql1          = "SELECT * FROM tb_nama_bagian where id_bagian ='" . $id . "'";
$query1      = mysqli_query($db, $sql1);
$data         = mysqli_fetch_array($query1);

if (!($nama_bagian == '')) {

    $sql1 = "UPDATE tb_nama_bagian SET   nama_bagian = '$nama_bagian'

                                        WHERE id_bagian = $id";

    $execute = mysqli_query($db, $sql1);

    echo "<Center><h2><br>Data Nama Jabatan telah diubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-namabagian.php?id_bagian=" . $id . "'>";
} else {
    echo "<Center><h2>Silahkan Ulangi, Data Nama Jabatan Belum Berubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../editnamabagian.php?id_bagian=" . $id . "'>";
}
