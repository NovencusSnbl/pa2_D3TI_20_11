<?php
include 'koneksi.php';

// Create connection
$sql = "SELECT id_produk,nama_produk,gambar FROM produk";
$result = $con->query($sql);

if ($result->num_rows >0) {
 // output data of each row
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
 
} else {
 echo "0 results";
}
 echo $json;
$con->close();
?>