<?php
$conn=mysqli_connect("localhost","root","","pa2");

function query($query ){
	global $conn;  
	$result = mysqli_query($conn,$query);
	$rows=[];
	while 	($row = mysqli_fetch_assoc($result)) {
		$rows[]=$row;
	}
	return $rows;
}

	//ambil data dari tiap elemen
global $conn;	

 date_default_timezone_set('Asia/Jakarta');
  // Hasil: 20-01-2017 05:32:15
 $asal = $_POST["asal"];
 $tujuan = $_POST["tujuan"];
 // $asal = 'Porsea';
 // $tujuan = 'Laguboti';

	$query="INSERT INTO pemesanan VALUES('',now(),'','$asal','$tujuan','','','','')";
				if (mysqli_query($conn,$query)) {
					echo "Pesanan Berhasil";
				}
				else
				{
					echo "Pesanan Gagal";
				}
 

?>