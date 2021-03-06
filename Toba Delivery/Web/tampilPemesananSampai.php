<?php 
 
 /*
 
 penulis: Muhammad yusuf
 website: https://www.kodingindonesia.com/
 
 */
	
	//Mendapatkan Nilai Dari Variable ID Pegawai yang ingin ditampilkan
	$id = $_GET['idpemesanan'];
			
	//Importing database
	require_once('koneksi.php');
	
	//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT d.username,c.harga,p.* FROM pemesanan p INNER JOIN produk c ON c.id_produk = p.idproduk INNER JOIN costumer d ON p.idcostumer = d.id_costumer WHERE idpemesanan=$id";
	
	//Mendapatkan Hasil 
	$r = mysqli_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"username"=>$row['username'],
			"harga"=>$row['harga'],
			"idpemesanan"=>$row['idpemesanan'],
			"asal"=>$row['asal'],
			"tujuan"=>$row['tujuan'],
			"idproduk"=>$row['idproduk'],
			"idcostumer"=>$row['idcostumer']
		));
 
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>