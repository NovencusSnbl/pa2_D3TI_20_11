<?php
define('HOST','127.0.0.1');
 define('USER','root');
 define('PASS','');
 define('DB','pa2');
  $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
$sql = "select * from produk";
$res = mysqli_query($con,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('id_produk'=>$row[0],
'nama_produk'=>$row[1],
'harga'=>$row[2],
'gambar'=>$row[3],
'nama_toko'=>$row[4],
'alamat'=>$row[5]
));
}
echo json_encode(array("result"=>$result));
mysqli_close($con);
?>