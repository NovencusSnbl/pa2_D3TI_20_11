<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: LoginAdmin.php");
   exit;
 }
 require 'koneksi.php';
require 'function.php';

$id_kurir=$_GET["id_kurir"];
if (approveKurir($id_kurir)>0) {
	require 'PHPMailer/PHPMailerAutoload.php';
		
		$query = "SELECT * FROM kurir WHERE id_kurir=$id_kurir LIMIT 1";

		        $result = mysqli_query($con, $query);
		        $row = mysqli_fetch_array($result);
				$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'nvsgokilabis@gmail.com';                 // SMTP username
		$mail->Password = '20001107n';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 465;                                    // TCP port to connect to

		$mail->setFrom('nvsgokilabis@gmail.com', 'admin TobaDelivery');
		$mail->addAddress($row['email'], 'USER');     // Add a recipient
		//$mail->addAddress('ellen@example.com');               // Name is optional
		$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Pengaktifan Akun Kurir';
		$mail->Body    = 'Selamat '.$row['email'].' anda berhasil mendaftar sebagai kurir. ID kurir anda adalah: '.$row['id_kurir'];
		$mail->AltBody = 'Semoga Sukses terus ya :)';

		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Message has been sent';
		}
	
		echo "
 	<script>
 	alert('Sukses diapprove');
 	document.location.href = 'persetujuanAkunKurir.php';
 	</script>
 	";
 	
 }
 else{
 	echo "
 	<script>
 	alert('Gagal diapprove');
 	document.location.href = 'persetujuanAkunKurir.php';
 	</script>
 	";
 }

?>