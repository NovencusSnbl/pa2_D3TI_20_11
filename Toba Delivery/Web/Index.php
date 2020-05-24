<?php
require 'function.php'; 
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
  <style type="text/css">
    #alert-popover

        {

        display: block;

        position: absolute;

        bottom: 50px;

        left: 50px;

        }

        .wrapper

        {

        display: table-cell;

        vertical-align: bottom;

        height: auto;

        width: 200px;

        }

        .alert-default

      {

              color: #333333;

              background: #f2f2f2;

              border-color: #cccccc;

              }
  </style>
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
      <?php
        error_reporting(0);



//

        $connect = mysqli_connect("localhost", "root", "", "pa2");

        $query = "SELECT * FROM kurir WHERE status = 0 ORDER BY id_kurir ASC LIMIT 1";

        $result = mysqli_query($connect, $query);



        while ($row = mysqli_fetch_array($result))

        {

        $output .= '

          <div class="alert alert-default" style="border-radius:5px;padding:5px 5px 5px 5px">

          <p>Kurir :<strong>'.$row["email"].'</strong>

          <small><em>mendaftar</em></small><br>

          </p>

          </div><br>

        ';

        }


        echo $output;

        $connect2 = mysqli_connect("localhost", "root", "", "pa2");

        $query2 = "SELECT * FROM Costumer WHERE status = 0 ORDER BY id_costumer ASC LIMIT 1";

        $result2 = mysqli_query($connect2, $query2);



        while ($row2= mysqli_fetch_array($result2))

        {

        $output2 .= '

          <div class="alert alert-default" style="border-radius:5px;padding:5px 5px 5px 5px">

          <p>Costumer :<strong>'.$row2["email"].'</strong>

          <small><em>mendaftar</em></small><br>

          </p>

          </div><br>

        ';

        }


        echo $output2;
      ?>
    </div>
  </header>

</body>
</html>