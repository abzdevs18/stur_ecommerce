<?php
include '../conn_db.php';

if (isset($_POST['submit'])) {
	$name = $_POST['title'];
	$tit = ucwords($name);
	$check_cat = mysqli_query($conn, "SELECT `brand_name` FROM brand WHERE brand_name = '$tit'");
	$num_rows = mysqli_num_rows($check_cat);
	if ($num_rows > 0) {
		header("Location: ../../brands.php?p=5&categoryExist");
		exit();
	}else {
		$target = "../../uploads/photo/".basename($_FILES['package_photo']['name']);
		$image = $_FILES['package_photo']['name'];
		if (move_uploaded_file($_FILES["package_photo"]["tmp_name"], $target)) {
			$insert_img = "INSERT INTO `brand`(`brand_name`, `image_path`) VALUES ('$name','$image')";
			$sql = mysqli_query($conn,$insert_img);
			if ($sql) {
				header("Location: ../../brands.php?p=5");
				exit();
			}else{
				echo mysqli_error($conn);
			}
		}else{
			echo "wrong";
		}
	}
}