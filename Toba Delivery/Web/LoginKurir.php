<?php
	
	include 'koneksi.php';
	$email = $_POST["email"];
	$password = $_POST["password"];


	// $email = "s@gmail.com";
	// $password = "suka2saya";
	$isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
	if ($con) {
		if ($isValidEmail === 0) {
			echo "Email is not valid";
		}
		else{
			$sqlCheckEmail = "SELECT * from kurir WHERE email LIKE '$email' ";
			$usernameQuery = mysqli_query($con,$sqlCheckEmail); 
			if(mysqli_num_rows($usernameQuery)>0){

				$sqlLoginStatus = "SELECT * FROM kurir WHERE email = '$email' AND PASSWORD='$password'";
				$loginStatusQuery = mysqli_query($con,$sqlLoginStatus);
				if (mysqli_num_rows($loginStatusQuery)>0) {
					$sqlLogin = "SELECT * FROM kurir WHERE email = '$email' AND PASSWORD='$password' AND STATUS = 1";
					$loginQuery = mysqli_query($con,$sqlLogin);
					$login = mysqli_fetch_assoc($loginQuery);

					
					if (mysqli_num_rows($loginQuery)>0) {
						
						$_SESSION['idkurir'] =  $login['id_kurir'];
						// $_SESSION['logged_email']=$email;
						echo "Loggin Success"	;

					}
					else{
						echo "akun belum disetujui";
					}
				}
				else{
					echo "Wrong password";
				}
			}
			else{
				echo "This email not registered";
			}
		}
	}

	else{
		echo "Koneksi error";
	}

	// $koneksi = mysqli_connect("localhost","root","");
	// $database = mysqli_select_db($koneksi,"tkpembinaporsea");

	// $username = $_POST['email'];
	// $password = $_POST['password'];

	

	// $result = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$username' AND password='$password' ");

	// $row = mysqli_fetch_array($result);
	// $data = $row[0];

	// if ($data) {
	// 	echo "Login Berhasil";
	// }

	// else {
	// 	$data = "username atau password tidak benar";
	// }

?>


