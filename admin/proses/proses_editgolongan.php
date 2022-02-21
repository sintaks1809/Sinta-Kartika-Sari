<?php
                session_start();
                include '../../koneksi/koneksi.php';
        
                $id                               	   = mysqli_real_escape_string($db, $_POST['id_bagian']);
                $golongan                              = mysqli_real_escape_string($db, $_POST['golongan']);
        
$sql1  		= "SELECT * FROM tb_golongan where id_bagian ='" . $id . "'";
$query1  	= mysqli_query($db, $sql1);
$data 		= mysqli_fetch_array($query1);

if  (!($golongan == '') 
) {

	$sql1 = "UPDATE tb_golongan SET   golongan = '$golongan'

                                        WHERE id_bagian = $id";

	$execute = mysqli_query($db, $sql1);

		echo "<Center><h2><br>Data Golongan telah diubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-golongan.php?id_bagian=" . $id . "'>";
} else {
		echo "<Center><h2>Silahkan Ulangi, Data Golongan Belum Berubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../editgolongan.php?id_bagian=" . $id . "'>";
	}