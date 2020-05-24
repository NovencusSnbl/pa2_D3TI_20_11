<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: LoginAdmin.php");
   exit;
 }
require 'function.php';

$idcostumer=$_GET["id_kurir"];
if (nonaktifKurir($idcostumer)>0) {
	echo "
 	<script>
 	alert('Berhasil dinonnaktifkan');
 	document.location.href = 'persetujuanAkunKurir.php';
 	</script>
 	";

 	
 }
 else{
 	echo "
 	<script>
 	alert('Gagal dinonaktifkan');
 	document.location.href = 'persetujuanAkunKurir.php';
 	</script>
 	";
 }

?>