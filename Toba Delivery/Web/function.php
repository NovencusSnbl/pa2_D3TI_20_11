<?php
$conn=mysqli_connect("localhost","root","","pa2");

function query($query ){
	global $conn;  
	$result = mysqli_query($conn,$query);
	$rows=[];
	while 	($row = mysqli_fetch_assoc($result)) {
		$rows[]=$row;
	}
	return $rows;
}


function approve($data){
	global $conn;
 	$query="UPDATE costumer SET status = 1 WHERE id_costumer ='$data' ";
	mysqli_query($conn,$query);

 	return mysqli_affected_rows($conn);
}

function registrasiA($data){
	global $conn;

	$usernameA = strtolower(stripslashes( $data["username"]));
	$password = mysqli_real_escape_string($conn,$data["password"]);
	$password2= mysqli_real_escape_string($conn,$data["password2"]);

	//cek usernmae sudah ada 
	$result =mysqli_query($conn, "SELECT usernameA FROM admin WHERE usernameA = '$usernameA'");

	if (mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('Username sudah terdaftar!');
			</script>
		";
		return false;
	}

	//enkripsi password
	$pwd=password_hash($password,PASSWORD_DEFAULT);
	// $password=md5();
	//tambah user baru
	mysqli_query($conn, "INSERT INTO admin VALUES ('','$usernameA','$pwd')");
	return mysqli_affected_rows($conn);
	//cek konfirmasi password
	if ($password !== $password2) {
		echo "
			<script>
				alert ('konfirmasi password tidak sesuai');
			</script>
		";
		return false;
	}
}


function registrasiKurir($data){
	//ambil data dari tiap elemen
	global $conn;	

  // Hasil: 20-01-2017 05:32:15
 $nama=htmlspecialchars($data["nama"]);
 $email=htmlspecialchars($data["email"]);
 $password=htmlspecialchars($data["password"]);
 $gender=htmlspecialchars($data["gender"]);
 $fotoDiri = addslashes(upload());
 $alamat=htmlspecialchars($data["alamat"]);
 $fotoSIM = addslashes(uploadSIM());
 $fotoSTNK = addslashes(uploadSTNK());

 $result =mysqli_query($conn, "SELECT email FROM kurir WHERE email = '$email'");

	if (mysqli_fetch_assoc($result)) {
		echo "
			<script>
				alert('email sudah terdaftar!');
			</script>
		";
		return false;
	}

 if (!$fotoDiri || !$fotoSIM || !$fotoSTNK){
 	return false;	
 }
 else{
	$query="INSERT INTO kurir VALUES('','$nama','$email','$password','$gender','$fotoDiri','$alamat','$fotoSIM','$fotoSTNK','')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
 }
}

 function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile= $_FILES['gambar']['size'];
	$error=$_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	//cek apakah tidak ada gmabar di upload

	if ($error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu!');
		</script>";
 		return false;
	}
//cek apakah yang di upload memang gambar
	$ekstensiGambarValid=['jpg','jpeg','png','gif','jfif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar =strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			 	alert('Yang anda upload bukan gambar!');
			 </script>";
		return false;
	} 

	//cek jika tapi ukurannya terlalu besar
	if ($ukuranFile > 4000000 ) {
		echo "<script>
			alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}
	//lolos pengecekan,siap upload

	$namaFileBaru = uniqid();
	
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/PROFIL/'.$namaFileBaru);
	return $namaFileBaru;
}


function uploadSIM(){
	$namaFile = $_FILES['SIM']['name'];
	$ukuranFile= $_FILES['SIM']['size'];
	$error=$_FILES['SIM']['error'];
	$tmpName = $_FILES['SIM']['tmp_name'];


	//cek apakah tidak ada gmabar di upload

	if ($error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu!');
		</script>";
 		return false;
	}
//cek apakah yang di upload memang gambar
	$ekstensiGambarValid=['jpg','jpeg','png','gif','jfif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar =strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			 	alert('Yang anda upload bukan gambar!');
			 </script>";
		return false;
	} 

	//cek jika tapi ukurannya terlalu besar
	if ($ukuranFile > 4000000 ) {
		echo "<script>
			alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}
	//lolos pengecekan,siap upload

	$namaFileBaru = uniqid();
	
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/SIM/'.$namaFileBaru);
	return $namaFileBaru;
}

function uploadSTNK(){
	$namaFile = $_FILES['STNK']['name'];
	$ukuranFile= $_FILES['STNK']['size'];
	$error=$_FILES['STNK']['error'];
	$tmpName = $_FILES['STNK']['tmp_name'];


	//cek apakah tidak ada gmabar di upload

	if ($error === 4) {
		echo "<script>
			alert('pilih gambar STNK terlebih dahulu!');
		</script>";
 		return false;
	}
//cek apakah yang di upload memang gambar
	$ekstensiGambarValid=['jpg','jpeg','png','gif','jfif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar =strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			 	alert('Yang anda upload bukan gambar!');
			 </script>";
		return false;
	} 

	//cek jika tapi ukurannya terlalu besar
	if ($ukuranFile > 4000000 ) {
		echo "<script>
			alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}
	//lolos pengecekan,siap upload

	$namaFileBaru = uniqid();
	
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/STNK/'.$namaFileBaru);
	return $namaFileBaru;
}

function approveKurir($data){
	global $conn;
 	$query="UPDATE kurir SET status = 1 WHERE id_kurir ='$data' ";
	mysqli_query($conn,$query);

 	return mysqli_affected_rows($conn);
}
function tambahProduk($data){
	global $conn;	

  // Hasil: 20-01-2017 05:32:15
 $namaProduk=htmlspecialchars($data["produk"]);
 $hargaProduk=htmlspecialchars($data["harga"]);
 $gambarProduk = addslashes(uploadProduk());
 $namaToko=htmlspecialchars($data["toko"]);
 $alamat=htmlspecialchars($data["alamat"]);


 if (!$gambarProduk){
 	return false;	
 }
 else{
	$query="INSERT INTO produk VALUES('','$namaProduk','$hargaProduk','$gambarProduk','$namaToko','$alamat')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
 }
}

function uploadProduk(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile= $_FILES['gambar']['size'];
	$error=$_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];


	//cek apakah tidak ada gmabar di upload

	if ($error === 4) {
		echo "<script>
			alert('pilih gambar terlebih dahulu!');
		</script>";
 		return false;
	}
//cek apakah yang di upload memang gambar
	$ekstensiGambarValid=['jpg','jpeg','png','gif','jfif'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar =strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
			 	alert('Yang anda upload bukan gambar!');
			 </script>";
		return false;
	} 

	//cek jika tapi ukurannya terlalu besar
	if ($ukuranFile > 4000000 ) {
		echo "<script>
			alert('ukuran gambar terlalu besar!');
		</script>";
		return false;
	}
	//lolos pengecekan,siap upload

	$namaFileBaru = uniqid();
	
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	move_uploaded_file($tmpName, 'img/Produk/'.$namaFileBaru);
	return $namaFileBaru;
}

?>	