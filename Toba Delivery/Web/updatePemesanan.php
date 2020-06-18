<?php 
 
 /*
 
 penulis: Muhammad yusuf
 website: https://www.kodingindonesia.com/
 
 */
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//MEndapatkan Nilai Dari Variable 
		$id = $_POST['idpemesanan'];
		$asal = $_POST['asal'];
		$tujuan = $_POST['tujuan'];
		$idproduk = $_POST['idproduk'];
		
		//import file koneksi database 
		require_once('koneksi.php');
		
		//Membuat SQL Query
		$query = "SELECT status FROM pemesanan WHERE idpemesanan=$id LIMIT 1";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
 		
 		$status = $row['status'];
 		
 		if ($status == 3) {
 			echo "Pesanan sudah dibatalkan, tidak dapat dilanjutkan!";
 		}
 		else{
		$sql = "UPDATE pemesanan SET status = 3  WHERE idpemesanan = $id";
		
		//Meng-update Database 
		if(mysqli_query($con,$sql)){
			echo 'Berhasil Membatalkan';
		}else{
			echo 'Gagal Membatalkan';
		}
		}
		mysqli_close($con);
	}
?>