<?php

include "../koneksi/koneksi.php";

$id = $_POST['id_pengajuan'];

$query = mysqli_query($db, "select * from tb_pengajuan WHERE id_pengajuan='$id'");

if (mysqli_num_rows($query)) {
	$row = mysqli_fetch_assoc($query);
	echo $row['type_barang'];
}
