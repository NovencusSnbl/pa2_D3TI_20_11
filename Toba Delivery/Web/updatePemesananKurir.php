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
		$idkurir = $_POST['idkurir'];
		
		//import file koneksi database 
		require_once('koneksi.php');
		// $idkurir = $_SESSION['idkurir'];
		
		//Membuat SQL Query
		$query = "SELECT status FROM pemesanan WHERE idpemesanan=$id LIMIT 1";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
 		
 		$status = $row['status'];
 		
 		if ($status == 3) {
 			echo "Maaf, Pesanan sudah dibatalkan, tidak dapat dilanjutkan!";
 		}

 		else{
 			$idkurirselect = "SELECT id_kurir from kurir where id_kurir LIKE '$idkurir'";
		 	$kurirQuery = mysqli_query($con,$idkurirselect); 

		 	if (mysqli_num_rows($kurirQuery) > 0) { 

			$sql = "UPDATE pemesanan SET status = 1,idkurir='$idkurir' WHERE idpemesanan = '$id'";
			
			//Meng-update Database 
			if(mysqli_query($con,$sql)){
				echo 'Berhasil Menerima';
			}else{
				echo 'Gagal Menerima';
			}
		}
		else{
			echo "bukan id anda!";
		}
		}
		mysqli_close($con);
	}

?>