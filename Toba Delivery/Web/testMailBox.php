<?php
require 'PHPMailer/PHPMailerAutoload.php';
require 'koneksi.php';
$query = "SELECT * FROM costumer WHERE id_costumer=100009 LIMIT 1";

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
$mail->addAddress('novencussinambela00@gmail.com', 'USER');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Pengaktifan Akun Pengguna';
$mail->Body    = 'Selamat '.$row['email'].' anda berhasil mendaftar. Gunakan id: '.$row['id_costumer'].' untuk memesan produk!';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>