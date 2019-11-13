<?php
include '../conn_db.php';

if (isset($_POST['submit'])) {
	$name = $_POST['title'];
	$tit = ucwords($name);
	$check_cat = mysqli_query($conn, "SELECT `category_name` FROM category WHERE category_name = '$tit'");
	$num_rows = mysqli_num_rows($check_cat);
	if ($num_rows > 0) {
		header("Location: ../../category.php?p=1&categoryExist");
		exit();
	}else {
		$insert_cat = "INSERT INTO `category`(`category_name`) VALUES ('$name')";
		$sql = mysqli_query($conn,$insert_cat);
		if ($sql) {
			header("Location: ../../category.php?p=1");
			exit();
		}else{
			echo mysqli_error($conn);
		}
	}
}