<?php
 require'function.php';
 if(isset($_POST["submit"])) {

 //cek apakah data berhasil dikirm atau tidak
 if(tambahSaran($_POST)>0) {
 	echo "
 	<script>
 	alert('Saran berhasil dikirm');
 	document.location.href = 'kurir.php'
 	</script>
 	";
 }
 else{
 	echo "
 	<script>
 	alert('Saran Gagal dikirim');
 	document.location.href = 'saran.php'
 	</script>
 	";
 }
 }

 ?>
<!DOCTYPE html>
<html>
 <head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,
initial-scale=1">
<title>E-kurir</title>
<link href="kurircss/css/bootstrap.min.css"
rel="stylesheet">
<link rel="stylesheet" type="text/css" href="kurircss/css/myCustom.css">
<link href="kurircss/css/myCustom.css" rel="stylesheet">

<script src="kurircss/js/jquery-3.1.1.js"></script>
<script src="kurircss/js/jquery-2.1.4.min.js"></script>
<script src="kurircss/js/jquery-ui.min.js"></script>
<script src="kurircss/js/jquery-ui.js"></script>

<script src="kurircss/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script 
src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min
.js"></script>
<script
src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js
></script>
<![endif]-->
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

}
/* Change styles for span and cancel button on extra small screens */

 </style>
<body style="background-color: #2A598E">
<nav class="navbar navbar-inverse navbar-static-top">

 <div class="container">
<div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed"
 datatoggle="collapse" data-target="#bs-example-navbar-
 collapse-1" ariaexpanded="false">
 <span class="sr-only">T<h1 class="headline">TobaKurir</h1></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 	<h1 class="headline" style="margin-top: 0px;padding-top: 5px">TobaKurir</h1>
 
</div>
<div class="collapse navbar-collapse" id="bs-examplenavbar-collapse1">

 <ul class="nav navbar-nav navbar-right">
 <li><a href="#">Tentang</a></li>
 <li class="dropdown">
 	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria- haspopup="true" aria-expanded="false">Layanan
 		<span class="caret"></span>
		<ul class="dropdown-menu">
 			<li><a href="#">College of Electrical and Informatic Engineering</a></li>
 			<li><a href="#">College of Biotechnology</a></li>
 			<li><a href="#">College of Industrial Technology</a></li>
 		</ul>
	</a>
 
 </li>
 <li><a href="#">Contact Us</a></li>
 </ul>
</div>
</div>
</nav>
<div class="jumbotron" style="background-image: url(kurircss/images/g2.jpg);">
 <div class="container">
 <h1 class="headline">E-kurir</h1>
 <h1 class="headline" style="color: black">Layanan Cepat, Aman, Tepat</h1>
 <p>Aplikasi Antar barang terpercaya disekitar TOBASA.</p>
 <br>
 <p><a class="btn btn-primary btn-lg" href="registerKurir.php"
role="button">Daftar Sekarang &raquo;</a> <a class="btn btnprimary
btn-lg" href="saran.php" role="button" style="color: white">Saran dan Masukan
&raquo;</a></p> 
</div>
</div>
<center><h1>Kritik dan Saran</h1></center>
 	<form action="" method="post" enctype="multipart/form-data">
		
		<table>			
		
		<br>
		<div class="container">
	    <label><b>Email</b></label>
	    <br><input type="text" style="width: 450px" name="email" placeholder="masukkan email anda" required ><br>
      
        <br><label><b>Nama </b></label><br>
        <input type="text" style="width: 450px" placeholder="masukkan nama anda" name="nama" required>

		<br>
		<br>
	    <label><b>Kritik dan Saran anda</b></label>
		<br>
	    <textarea placeholder="masukkan kritik dan saran anda disini"  name="deskripsi" rows="4" cols="64" style="color: black">
  		
  		</textarea>
	    <br><br>
		</table>
		<br>
		<button type="submit" name="submit" style="width: 83%;margin-left: 40px">Kirim</button>
	</form>


</body>
</html>
