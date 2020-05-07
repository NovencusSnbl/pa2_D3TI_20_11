<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: LoginAdmin.php");
   exit;
 }
require 'function.php';

$costumer = query("SELECT * from kurir");

if (isset($_POST["ambil"])) {
		$status = approveKurir($_POST['status']);	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Persetujuan akun</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
	<style type="text/css">
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}
td{
	color: black;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
tr:hover {background-color:#f5f5f5;}
.btn {
  border: none;
  color: white;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
.danger {
	background-color: #f44336;
	border-radius: 5px;
	} /* Red */ 
.danger:hover {background: #da190b;}


	</style>
</head>
<body style="background-image: url(image/g3.jpg);background-size: cover;color: white;"> 

	<table border="0">
		<tr>
			<th>ID Kurir</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Foto Diri</th>
			<th>Alamat</th>
			<th>SIM</th>
			<th>KTP</th>
			<th>Status</th>
			<th>   </th>
		</tr>
		<?php foreach ($costumer as $row):?> 
	
		<tr>
			<td><?php echo $row["id_kurir"]; ?></td>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["email"]; ?><br></td>
			<td><?php echo $row["gender"]; ?><br></td>
			<td><img src="img/PROFIL/<?php echo $row["fotoDiri"] ?>" style="width:120px"><br></td>
			<td><?php echo $row["alamat"]; ?><br></td>
			<td><img src="img/SIM/<?php echo $row["fotoSIM"] ?>" style="width:120px"><br></td>
			<td><img src="img/STNK/<?php echo $row["fotoSTNK"] ?>" style="width:120px"><br></td>
			<?php
				
				if ($row["status"] == 0) {

					echo '<td style="color:red">Belum disetujui</td>';
				}
				else
					echo '<td style="color:green">Sudah Disetujui</td>';
			 ?><br></td>

			<td><?php
			if ($row["status"] == 0) {
			?>
			<a href="persetujuanAkunKurirProses.php?id_kurir=<?= $row["id_kurir"]; ?>" onclick="return confirm('Apakah anda yakin?');"><button type="submit" name="ambil" class="btn danger" >Aprrove</button></a>		
			<?php	}
			?>
		</tr>
		
	<?php endforeach ;?>
	</table>
	
</body>
</html>
