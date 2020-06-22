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
	$sql = "SELECT costumer.username,pemesanan.* FROM pemesanan INNER JOIN costumer ON pemesanan.idcostumer = costumer.id_costumer WHERE idpemesanan=$id  AND pemesanan.status=0 OR pemesanan.status =3";
			
	//Mendapatkan Hasil 
	$r = mysqli_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"username"=>$row['username'],
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