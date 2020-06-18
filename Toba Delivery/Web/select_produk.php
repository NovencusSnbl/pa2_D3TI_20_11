<?php 
 
 /*
 
 penulis: Muhammad yusuf
 website: https://www.kodingindonesia.com/
 
 */
	
	//Mendapatkan Nilai Dari Variable ID Pegawai yang ingin ditampilkan
	$id = $_GET['idpemesanan'];
	
	//Importing database
	$server		= "localhost"; //sesuaikan dengan nama server
	$user		= "root"; //sesuaikan username
	$password	= ""; //sesuaikan password
	$database	= "pa2"; //sesuaikan target databese
	 
	$con = mysqli_connect($server, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Gagal terhubung MySQL: " . mysqli_connect_error();
	}
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
 
	//Menampilkan dalam format JSON
	
	
	mysqli_close($con);
?>