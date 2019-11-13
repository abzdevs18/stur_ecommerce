<?php
	include 'conn.php';
	session_start();

	// $imageSrc = $_POST['img'];
	$usr_id = $_SESSION['user_id'];

	$target = "uploaded/".basename($_FILES['photo']['name']);
	$image = $_FILES['photo']['name'];

	$post_timestamp = $_SERVER['REQUEST_TIME'];
if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {

		$i_m = "SELECT * FROM customer_image WHERE c_fk = '$usr_id' AND profile_status = '1'";
		$i_m_query = mysqli_query($conn, $i_m);
		$result = mysqli_num_rows($i_m_query);
		if ($result < 1) {
			$queryImage = "INSERT INTO `customer_image`(`c_fk`, `image_name`, `profile_status`) VALUES ('$usr_id','$image',1)";
			$queryUpdate = mysqli_query($conn,$queryImage);
			if ($queryUpdate) {
				header("Location: ../account.php");
				exit();
			}else {
				echo mysqli_error($conn);
			}
		}else {
			if ($rows = mysqli_fetch_assoc($i_m_query)) {
				$image_name = $rows['image_name'];
				// Don't remove the photo from the DB. just update the value of profile_status into 0
				$u_p = "UPDATE customer_image SET profile_status = 0 WHERE image_name = '$image_name'";
				$u_p_query = mysqli_query($conn, $u_p);
				if ($u_p_query) {
					// Serve us the update command for the profile_status
					$queryImage = "INSERT INTO `customer_image`(`c_fk`, `image_name`, `profile_status`) VALUES ('$usr_id','$image',1)";
					$queryUpdate = mysqli_query($conn,$queryImage);
					if ($queryUpdate) {
						header("Location: ../account.php");
						exit();
					}else {
						echo mysqli_error($conn);
					}
				}else {
					echo "$image_name <br> $image <br>".mysqli_error($conn);
				}
			}
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

