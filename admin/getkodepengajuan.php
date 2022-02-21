<?php

include "../koneksi/koneksi.php";

$kode_brg = $_POST['kode'];

$query = mysqli_query($db, "select * from stokbarang WHERE kode_brg='$kode_brg'");

if (mysqli_num_rows($query)) {
	$row = mysqli_fetch_assoc($query);
	echo $row['stok'];
}
