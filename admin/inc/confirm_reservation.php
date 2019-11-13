<?php
	include 'conn_db.php';

 if (isset($_POST['id'])) {
    $select_option = $_POST['option'];
   	$p_k = $_POST['p_k'];
   	$email = mysqli_real_escape_string($conn,$_POST['email']);
   	$name = mysqli_real_escape_string($conn,$_POST['name']);
    $sbj = "Reservation Confirmation";
    $msg = "Good Day ".$name."! Your Reservation with Us is now confirm!!";

      require '../PHPMailerAutoload.php';
      require 'credentials.php';
      $mail = new PHPMailer;
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = EMAIL;                 // SMTP username
      $mail->Password = PASS;                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to
      $mail->setFrom(EMAIL, 'BIG-DAY CELEBRATION Catering Services');
      $mail->addAddress($email);  
      $mail->addReplyTo(EMAIL);
      $mail->Subject = $sbj;
      $mail->Body    = $msg;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
				
			// $send_timestamp = $_SERVER['REQUEST_TIME'];
      // $conf = mysqli_query($conn,"SELECT * FROM reservations WHERE u_fk = '$id'");
      // $query_statement='';
      // while ($rw = mysqli_fetch_assoc($conf)) {
      
        $query = "UPDATE reservations SET r_status = '$select_option' WHERE p_k = '$p_k'";
        $query_statement = mysqli_query($conn,$query);
      // }

  		if ($query_statement) {
  				// after submit form redirect to the same person ID
  			echo "orders.php?p=3";
  		}else{
  			echo mysqli_error($conn);
  		}
    }
 }