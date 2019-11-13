<?php
include 'conn.php';
// session_start();
// $available = 0;
if (isset($_POST['action'])) {
	if ($_POST['action'] == 'increase') {
		$cart_id = $_POST['cart_id'];
		$quantity = $_POST['quantity'];
		$customer_id = $_POST['customer_id'];
		$update_cart = mysqli_query($conn,"UPDATE customer_cart SET quantity='$quantity' WHERE c_fk = '$customer_id' AND p_k = '$cart_id'");
		if ($update_cart) {
			echo "updated";
		}else{
			echo mysqli_error($conn);
		}
	}
	if ($_POST['action'] == 'decrease') {
		$cart_id = $_POST['cart_id'];
		$quantity = $_POST['quantity'];
		$customer_id = $_POST['customer_id'];
		$update_cart = mysqli_query($conn,"UPDATE customer_cart SET quantity='$quantity' WHERE c_fk = '$customer_id' AND p_k = '$cart_id'");
		if ($update_cart) {
			echo "updated";
		}else{
			echo mysqli_error($conn);
		}
	}
}