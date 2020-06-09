<?php
include 'koneksi.php';

	/*
	* Created by Belal Khan
	* website: www.simplifiedcoding.net 
	* Retrieve Data From MySQL Database in Android
	*/
	
	//database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'pa2');
	
	//connecting to database and getting the connection object
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	//Checking if any error occured while connecting
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}
	
	//creating a query
	$stmt = $conn->prepare("SELECT id_produk, nama_produk, alamat, nama_toko, harga, gambar FROM produk;");
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($id_produk, $nama_produk, $alamat, $nama_toko, $harga, $gambar);
	
	$products = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['id_produk'] = $id_produk; 
		$temp['nama_produk'] = $nama_produk; 
		$temp['alamat'] = $alamat; 
		$temp['nama_toko'] = $nama_toko; 
		$temp['harga'] = $harga; 
		$temp['gambar'] = $gambar; 
		array_push($products, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($products);

?>