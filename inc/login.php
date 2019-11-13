<?php
	session_start();
	if (isset($_POST['login'])) {
		include 'conn.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$userPass = mysqli_real_escape_string($conn, $_POST['password']);
		$check = mysqli_query($conn,"SELECT * FROM customer_email WHERE c_email = '$email'");
		$result = mysqli_num_rows($check);
		if ($result < 1) {
			//User doesn't match to any names in the satabasse;
			header("Location: ../login.php?user=doesn't_Match");
			exit();
		}else{
			$row = mysqli_fetch_assoc($check);
			$id = $row['c_fk'];
			$ab = mysqli_query($conn, "SELECT * FROM `customer` WHERE `p_k` = '$id'");
			$res = mysqli_fetch_assoc($ab);
			$hashed = password_verify($userPass,$res['password']);
			if ($hashed == false) {
				header("Location: ../login.php?password=Failed&p=6&nav=1");
				exit();
			}else {
				//create session
				$_SESSION['user_id'] = $res['p_k'];
				header("Location: ../account.php");
				exit();
			}
		}

	}