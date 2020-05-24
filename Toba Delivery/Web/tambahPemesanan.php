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
 $idproduk = $_POST["idproduk"];
 // $asal = 'Porsea';
 // $tujuan = 'Laguboti';
 // $idproduk = 1;

	$sqlCheckUsername = "SELECT * from produk WHERE id_produk LIKE '$idproduk'";

			$usernameQuery = mysqli_query($conn,$sqlCheckUsername); 


			if (mysqli_num_rows($usernameQuery) > 0) {
				$sql_register = "INSERT INTO pemesanan VALUES('',now(),'','$asal','$tujuan','','','','$idproduk','')";

				if (mysqli_query($conn,$sql_register)) {
					echo "Sukses Memesan!";
				}
				else
				{
					echo "Gagal Memesan!";
				}
				
			}
			else{
				echo "id produk yang dimaksud tidak ada!";
			}
 

?>