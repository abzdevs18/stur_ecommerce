<?php
include '../../conn_db.php';

if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['title'];
	$tit = ucwords($name);
	$check_cat = mysqli_query($conn, "SELECT * FROM brand WHERE p_k = '$id'");
	$num_rows = mysqli_num_rows($check_cat);
	if ($num_rows < 0) {
		header("Location: ../../brands.php?p=1&categoryExist");
		exit();
	}else {
		$target = "../../../uploads/photo/".basename($_FILES['package_photo']['name']);
		$image = $_FILES['package_photo']['name'];
		if (move_uploaded_file($_FILES["package_photo"]["tmp_name"], $target)) {
			$insert_img = "UPDATE `brand` SET `brand_name` = '$tit',`image_path`='$image' WHERE p_k = '$id'";
			$sql = mysqli_query($conn,$insert_img);
			if ($sql) {
				header("Location: ../../../brands.php?p=5");
				exit();
			}else{
				echo mysqli_error($conn);
			}
		}else{
			echo "wrong";
		}
	}
}