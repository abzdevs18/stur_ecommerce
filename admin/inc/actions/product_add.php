<?php
include '../conn_db.php';

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$model = $_POST['model'];
	$price = mysqli_real_escape_string($conn,$_POST['price']);
	$description = mysqli_real_escape_string($conn,$_POST['description']);
	$information = mysqli_real_escape_string($conn,$_POST['information']);
	$quantity = $_POST['quantity'];
	$brand = $_POST['brand'];
	echo $brand;
	$category = $_POST['category'];
	$tit = ucwords($name);
	$check_prod = mysqli_query($conn, "SELECT `name_p` FROM `product` WHERE `name_p` = '$tit'");
	$num_rows = mysqli_num_rows($check_prod);
	if ($num_rows > 0) {
		header("Location: ../../product.php?p=6&categoryExist");
		exit();
	}else{
		$cat_query = mysqli_query($conn, "INSERT INTO `product`(`brand`, `category`, `name_p`, `model_p`, `price_p`, `product_quantity`) VALUES ('$brand','$category','$name','$model','$price','$quantity')");
		if ($cat_query) {
			$id = mysqli_insert_id($conn);

			$details = mysqli_query($conn,"INSERT INTO `product_details`(`product_fk`, `description_p`, `information`) VALUES ('$id','$description','$information')");
			if ($details) {
				$target = "../../uploads/photo/".basename($_FILES['image']['name']);
				$image = $_FILES['image']['name'];
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
					$insert_img = "INSERT INTO `product_image`(`product_fk`, `image_name`) VALUES ('$id','$image')";
					$sql = mysqli_query($conn,$insert_img);
					if ($sql) {
						header("Location: ../../product.php?p=6");
						exit();
					}
				}
			}
		}
	}
}