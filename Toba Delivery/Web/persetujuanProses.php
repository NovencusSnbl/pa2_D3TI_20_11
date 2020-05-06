<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: LoginAdmin.php");
   exit;
 }
require 'function.php';

$idcostumer=$_GET["id_costumer"];
if (approve($idcostumer)>0) {
	echo "
 	<script>
 	alert('Berhasil diapprove');
 	document.location.href = 'persetujuanAkun.php';
 	</script>
 	";

 	
 }
 else{
 	echo "
 	<script>
 	alert('Gagal diapprove');
 	document.location.href = 'persetujuanAkun.php';
 	</script>
 	";
 }

?>