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
		
		$query = "SELECT idproduk FROM pemesanan WHERE idpemesanan='$id'";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
 		
 		$id_produk = $row['idproduk'];

 	
			//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
			$sql = "SELECT * FROM produk WHERE id_produk='$id_produk'";
			
			//Mendapatkan Hasil 
			$r = mysqli_query($con,$sql);
			
			//Memasukkan Hasil Kedalam Array
			$result = array();
			$row = mysqli_fetch_array($r);
			array_push($result,array(
					"id_produk"=>$row['id_produk'],
					"nama_produk"=>$row['nama_produk'],
					"harga"=>$row['harga'],
					"gambar"=>$row['gambar'],
					"nama_toko"=>$row['nama_toko'],
					"alamat"=>$row['alamat']
				));	
			
        $pembayaran = (2*20/100*$row["harga"])+$row["harga"];
		//Membuat SQL Query
		$sql = "UPDATE pemesanan SET status = 2,pembayaran=$pembayaran  WHERE idpemesanan = $id";
		//Meng-update Database 
		if(mysqli_query($con,$sql)){
			echo 'Barang sampai';
		}else{
			echo 'Gagal sampai';
		}
		
		mysqli_close($con);
	}
?>