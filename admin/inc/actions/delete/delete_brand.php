<?php
include '../../conn_db.php';

if (isset($_REQUEST['brandId'])) {
	$id = $_REQUEST['brandId'];
	$check_cat = mysqli_query($conn, "SELECT * FROM brand WHERE p_k = '$id'");
	$num_rows = mysqli_num_rows($check_cat);
	if ($num_rows < 0) {
		header("Location: ../../category.php?p=5&categoryDoesNotExist");
		exit();
	}else {
		$insert_cat = "DELETE FROM `brand` WHERE p_k = '$id'";
		$sql = mysqli_query($conn,$insert_cat);
		if ($sql) {
			header("Location: ../../../brands.php?p=5");
			exit();
		}else{
		echo mysqli_error($conn);
		}
	}
}