<?php
session_start();
include '../conn.php';
if (isset($_POST['check'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$brgy = $_POST['brgy'];
	$product = $_POST['product'];
	$payment_method = $_POST['payment'];
	$quantity = $_POST['quantity'];
	$c_id = $_SESSION['user_id'];

	$num_row = mysqli_query($conn,"SELECT * FROM billing_info WHERE c_fk = '$c_id'");
	if (mysqli_num_rows($num_row) > 0) {
		$billing_info = mysqli_query($conn,"UPDATE billing_info SET `name`='$name',`email`='$email',`phone`='$phone',`province`='$province',`city`='$city',`brgy`='$brgy' WHERE c_fk = '$c_id'");
		if ($billing_info) {

			$r = count($product);
			for($i = 0; $i <= $r; $i++){
				$order = place_order($conn,$c_id,$product[$i],$quantity[$i],$payment_method,$order_status);
				if ($order == 'inserted') {
					$update_cart = delete_cart_items($conn,$product[$i],$c_id);
					if($update_cart == 'cart_updated'){
						header("Location: ../../order_details.php");
					}
				}
			}
			// echo $r;
			echo "updated";
		}else{
			echo mysqli_error($conn);
		}
	}else{
		$query_insert_cart = mysqli_query($conn, "INSERT INTO `billing_info`(`c_fk`, `name`, `email`, `phone`, `province`, `city`, `brgy`) VALUES ('$c_id','$name','$email','$phone','$province','$city','$brgy')");
		if ($query_insert_cart) {
			$r = count($product);
			for($i = 0; $i <= $r; $i++){
				$order = place_order($conn,$c_id,$product[$i],$quantity[$i],$payment_method,$order_status);
				if ($order == 'inserted') {
					$update_cart = delete_cart_items($conn,$product[$i],$c_id);
					if($update_cart == 'cart_updated'){
						header("Location: ../../order_details.php");
					}
				}
			}
		}else{
			echo mysqli_error($conn);
		}
	}
}
function place_order($conn,$c_fk,$product_fk,$quantity,$payment_method,$order_status){
	$place = mysqli_query($conn,"INSERT INTO `orders`(`c_fk`, `product_fk`, `quantity`, `payment_method`, `order_status`) VALUE ('$c_fk','$product_fk','$quantity','$payment_method','$order_status')");
	if ($place) {
		return "inserted";
	}
}
function delete_cart_items($conn,$product_fk,$c_fk){
	$delete = mysqli_query($conn,"DELETE FROM `customer_cart` WHERE product_fk = '$product_fk' AND c_fk = '$c_fk'");
	if ($delete) {
		return "cart_updated";
	}
}
