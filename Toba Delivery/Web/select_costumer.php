<?php
require_once('koneksi.php');
		
		$query = "SELECT idcostumer FROM pemesanan WHERE idpemesanan='34'";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
 		
 		$id_costumer = $row['idcostumer'];

 	
			//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
			$sql = "SELECT * FROM costumer WHERE id_costumer='$id_costumer'";
			
			//Mendapatkan Hasil 
			$r = mysqli_query($con,$sql);
			
			//Memasukkan Hasil Kedalam Array
			$result = array();
			$row = mysqli_fetch_array($r);
			array_push($result,array(
					"id_costumer"=>$row['id_costumer'],
					"email"=>$row['email'],
					"username"=>$row['username'],
					"PASSWORD"=>$row['PASSWORD'],
					"mobile"=>$row['mobile'],
					"gender"=>$row['gender'],
					"status"=>$row['status']
				));	

			echo $row['id_costumer'];
?>