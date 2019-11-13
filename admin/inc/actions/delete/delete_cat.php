<?php
include '../../conn_db.php';

if (isset($_REQUEST['catId'])) {
	$id = $_REQUEST['catId'];
	$check_cat = mysqli_query($conn, "SELECT `category_name` FROM category WHERE p_k = '$id'");
	$num_rows = mysqli_num_rows($check_cat);
	if ($num_rows < 0) {
		header("Location: ../../category.php?p=1&categoryDoesNotExist");
		exit();
	}else {
		$insert_cat = "DELETE FROM `category` WHERE p_k = '$id'";
		$sql = mysqli_query($conn,$insert_cat);
		if ($sql) {
			header("Location: ../../../category.php?p=1");
			exit();
		}else{
		echo mysqli_error($conn);
		}
	}
}