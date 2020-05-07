<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: LoginAdmin.php");
   exit;
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>TOBA DELIVERY</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <header>
    <div class="main">
      <div class="logo">
        <h1><b></b></h1>
      </div>
      <ul>
        <li class="active"><a href="#">Home</a></li>
        <li><a href="persetujuanAkunKurir.php">Approve Kurir</a></li>
        <li><a href="persetujuanAkun.php">Approve Costumer</a></li>
        <li><a href="tambahProduk.php">Tambah Produk</a></li>
        <li><a href="#">About</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="button">
      
    </div>
    <div class="title">
      <h1>TOBA DELIVERY</h1>
    </div>
  </header>

</body>
</html>