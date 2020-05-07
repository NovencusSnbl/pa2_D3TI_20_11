 <?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: LoginAdmin.php");
   exit;
 }
 require'function.php';
 $loker = query("SELECT * from produk");
 if(isset($_POST["submit"])) {

 //cek apakah data berhasil dikirm atau tidak
 if(tambahProduk($_POST)>0) {
 	echo "
 	<script>
 	alert('Data berhasil register');
 	document.location.href = 'Index.php'
 	</script>
 	";
 }
 else{
 	echo "
 	<script>
 	alert('Data Gagal register');
 	document.location.href = 'tambahProduk.php'
 	</script>
 	";
 }
 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Akun Kurir</title>
</head>
<style type="text/css">
   *{
    padding: 0; margin: 0;
}
h2{
  color:#50626C;
  text-align: center;
  font-family: arial;
  text-transform: uppercase;
  border: 3px solid #f1f1f1;
  padding: 5px;
  width: 490px;
  margin: auto;
  margin-bottom: 10px;
    margin-top: 20px;
}
form {
    border: 3px solid #f1f1f1;
    font-family: arial;
    width: 500px;
    margin: auto;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
label{
  color:white;
  text-transform: uppercase;
}
button {
    background-color: #049372;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f03434;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;

}
span{
  color:#50626C;
}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
} 
  </style>
<center>
<body style="background-image:url(image/g2.jpg);background-size: cover;">
	<br>
	<br>
	<br>
	<br>

	<form action="" method="post" enctype="multipart/form-data">
		<h1>Tambah Produk</h1>
		<table>			
			
			<div class="container">
	    <label><b>Nama Produk</b></label>
	    <input type="text" name="produk" placeholder="masukkan nama produk" required><br>
      <label><b>Harga</b></label><br>
      <input type="number" name="harga" placeholder="    masukkan harga produk" required style="width:460px;height: 40px"><br><br>
      <label><b>Gambar Produk (dibawah 4 MB)</b></label><br>
      <fieldset style="background-color: white">
      <input type="file" name="gambar" required style="color: black;padding-top: 6px;padding-bottom: 6px;">
      </fieldset>
      <br><label><b>Nama toko</b></label>
      <input type="text" placeholder="masukkan nama toko" name="toko" required>
	    <br><label><b>alamat</b></label>
	    <input type="text" placeholder="masukkan alamat Toko" name="alamat" required>
	    <br><br>
	   
  </div>
		</table>
		<br>
		<button type="submit" name="submit" style="width: 93%">Tambahkan Produk</button>
	</form>
</body>
</center>
</html>