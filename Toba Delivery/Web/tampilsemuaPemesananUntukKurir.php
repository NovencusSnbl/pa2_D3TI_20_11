<?php 

 /*
 
 penulis: Muhammad yusuf
 website: https://www.kodingindonesia.com/
 
 */

	//Import File Koneksi Database
	require_once('koneksi.php');
	
	//Membuat SQL Query
	$sql = "SELECT * FROM pemesanan where status = 0";
	
	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
			"idpemesanan"=>$row['idpemesanan'],
			"asal"=>$row['asal'],
			"tujuan"=>$row['tujuan'],
			"idproduk"=>$row['idproduk'],
			"idcostumer"=>$row['idcostumer']
		));
	}


	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>