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
		$pemesanan = $_POST['pembayaran'];
		

		//import file koneksi database 
		require_once('koneksi.php');
		
		// $query = "SELECT status_bayar FROM pemesanan WHERE idpemesanan=28  LIMIT 1";

  //       $result = mysqli_query($con, $query);



  //       while ($row = mysqli_fetch_array($result))

  //       {

  //       $output .= $row["status_bayar"];

  //       }

  //       if ($output == 1) {
		// 	echo "Anda sudah bayar!";
		// }
        
  //       else{
		//Membuat SQL Query
		$query = "SELECT status_bayar FROM pemesanan WHERE idpemesanan=$id LIMIT 1";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
 		
 		$status_bayar = $row['status_bayar'];
 		
 		if ($status_bayar == 1) {
 			echo "Pesanan sudah sampai, tidak dapat membayar lagi!";
 		}
		
		else{
		$sql = "UPDATE pemesanan SET status_bayar = 1,waktu_sampai = now()  WHERE idpemesanan = $id";
		
		//Meng-update Database 
		if(mysqli_query($con,$sql)){
			echo 'Berhasil Membayar';
		}else{
			echo 'Gagal Membayar';
		}
		// }
		}
		mysqli_close($con);
	}
?>