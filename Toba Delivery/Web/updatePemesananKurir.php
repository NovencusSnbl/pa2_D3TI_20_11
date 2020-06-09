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
		$sql = "UPDATE pemesanan SET status = 1  WHERE idpemesanan = $id;";
		
		//Meng-update Database 
		if(mysqli_query($con,$sql)){
			echo 'Berhasil Menerima';
		}else{
			echo 'Gagal Menerima';
		}
		
		mysqli_close($con);
	}
?>