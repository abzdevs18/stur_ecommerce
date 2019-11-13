<?php 
	include 'conn.php';
	session_start();
	
	if (isset($_POST['signup'])) {
		
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$province = mysqli_real_escape_string($conn,$_POST['province']);
		$city = mysqli_real_escape_string($conn,$_POST['city']);
		$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
		$phone = mysqli_real_escape_string($conn,$_POST['phone']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
		// make the input text into lower case and convert each first letter of word uppercase
		$userName = ucwords(strtolower($name));
		$userLastname = ucwords(strtolower($lastname));


		if (!empty($name) || !empty($lastname) || !empty($email) || !empty($password) || !empty($phone)) {
			if (preg_match("/^[a-zA-Z ]*$/", $userName) && preg_match("/^[a-zA-Z ]*$/", $userLastname)) {
				if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/', $password)) {
					// (?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20}
					//make sure password is alphaNumeric
					header("Location: ../account.php?password=not_alphaNum");
					exit();
				}else{
					if ($password !== $confirm_password) {
						header("Location: ../account.php?password=PasswordDontmatch");
						exit();
					}else{
						//encrypt password
						$passEncrypt = password_hash($password, PASSWORD_DEFAULT);

						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
								header("Location: ../account.php?error=email");
								exit();
						}else{
							$emailCheck = "SELECT `c_email` FROM customer_email WHERE c_email = '$email'";

							$result = mysqli_query($conn, $emailCheck);
							$resultcheck = mysqli_num_rows($result);

							if ($resultcheck > 0) {
								header("Location: ../account.php?user=exist");
								exit();
							}else{
								$sql = "INSERT INTO `customer`(`name`, `lastname`, `password`) VALUES ('$name','$lastname','$passEncrypt');";
								$query = mysqli_query($conn,$sql);
								if ($query) {
									$f_ = mysqli_insert_id($conn);
									$email = mysqli_query($conn, "INSERT INTO customer_email(`c_fk`, `c_email`) VALUES ( '$f_','$email')");
									if ($email) {
										$contact = mysqli_query($conn, "INSERT INTO customer_phone(`c_fk`, `c_phone`) VALUES ( '$f_','$phone')");
										if ($contact) {
											$address = mysqli_query($conn, "INSERT INTO customer_address(`c_fk`, `province`, `city`) VALUES ( '$f_','$province','$city')");
											if ($address) {
												$display = mysqli_query($conn,"SELECT * FROM customer_email WHERE  c_fk = '$f_'");
												$row = mysqli_fetch_assoc($display);
												if ($display) {
													//create session
													$_SESSION['usrName'] = $row['name'];
													$_SESSION['usrLastName'] = $row['lastname'];
													$_SESSION['user_id'] = $res['p_k'];
													header("Location: ../account.php");
													exit();
												}
											}
										}
									}else{
									echo "hggj".mysqli_error($conn);
								}
								}else{
									echo mysqli_error($conn);
								}
							}
						}
					}
				}
			}else{
				//if user name is invalid
				header("Location: ../account.php?name=onlyLettersAllowed");
				exit();
			}
		}else{
			//make sure fill out everything
			header("Location: ../account.php?user=mistSomething");
			exit();
		}

	}