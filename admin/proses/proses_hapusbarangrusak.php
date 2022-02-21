<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_barang'])) {

	$id = $_GET['id_barang'];
    	

	$sql2  		= "SELECT * FROM tb_barangrusak where id_barang='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_barangrusak WHERE id_barang='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                unlink("../barangrusak/".$data2['gambar']);
                echo "<Center><h2><br>Data Barang Rusak telah Dihapus</h2></center>
				<meta http-equiv='refresh' content='2;url=../databarangrusak.php'>";
            }		else{
			echo "<Center><h2><br>GAGAL MENGHAPUS<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../databarangrusak.php'>";
	}	
}	
}
