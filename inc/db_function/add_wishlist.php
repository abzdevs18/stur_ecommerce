<?php
include '../conn.php';
if ($_POST['action'] == "add") {
	$product_id = $_POST['id'];
	$customer_id = $_POST['customer_id'];

	$num_row = mysqli_query($conn,"SELECT * FROM customer_wishlist WHERE product_fk = '$product_id' AND c_fk = '$customer_id'");
	if (mysqli_num_rows($num_row) > 0) {
		echo "exist";
	}else{
		$query_insert_cart = mysqli_query($conn, "INSERT INTO `customer_wishlist`(`c_fk`, `product_fk`) VALUES ('$customer_id','$product_id')");
		if ($query_insert_cart) {
			echo "inserted";
		}else{
			echo mysqli_error($conn);
		}
	}
}