 <?php
 require'function.php';

 //ambil data dari URL
 $id=$_GET["id_kurir"];
 //query data mahasiswa berdasarkan id
 $kurir=query("SELECT * FROM kurir WHERE id_kurir=$id")[0];

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Data Kurir </title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
    
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
	<style type="text/css">
	table{
	border-color: transparent;
	color: white;
	
	}

	th, td {
	    text-align: center;
	    padding: 8px;
	    color: white;	
	}

	tr:nth-child{background-color: #f2f2f2}

	th {
	    color: white;

	}
	</style>
</head>
<center>
<body style="background-image:url(image/g3.jpg);background-size: cover;">
	<br><br><h1 style="color:white">Data Kurir</h1><hr style="border-width: 2px ;width: 200px;border-color: white;"><br><br><br>
	<form action="" method="post">
		<fieldset style="background-color: #4169E1;width: 50%;border-color: white;">
		<table border="">
			<tr>
				<th>ID Kurir</th>				
				<td></td>
				<td><?php echo $kurir["id_kurir"]; ?></td>
			</tr>
			<tr>
				<th>Nama Kurir</th>
				<td></td>
				<td><?php echo $kurir["nama"]; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td></td>
				<td><?php echo $kurir["email"]; ?><br></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td></td>
				<td><?php echo $kurir["gender"]; ?><br></td>
			</tr>
			<tr>
				<th>Profil</th>
				<td></td>
				<td><img src="img/PROFIL/<?php echo $kurir["fotoDiri"] ?>" style="width:420px"><br></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td></td>
				<td><?php echo $kurir["alamat"]; ?><br></td>
			</tr>
			<tr>
				<th>Lampiran SIM</th>
				<td></td>
				<td><img src="img/SIM/<?php echo $kurir["fotoSIM"] ?>" style="width:420px"><br></td>
			</tr>
			<tr>
				<th>Lampiran STNK</th>
				<td></td>
				<td><img src="img/STNK/<?php echo $kurir["fotoSTNK"] ?>" style="width:420px"><br></td>
			</tr>
			<tr>
				<th>Status</th>
				<td></td>
				<td><?php
					if ($kurir["status"] == 0) {
						echo "Belum disetujui";
					}
					else{
						echo "sudah disetujui";
					}

				 ?></td>
			</tr>

		</table>
		</fieldset>
	</form>
</body>
</center>
</html>