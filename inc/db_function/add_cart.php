<?php
include '../conn.php';
	/*Responses*/
if ($_POST['action'] == "add") {
	$product_id = $_POST['id'];
	$customer_id = $_POST['customer_id'];
	$quantity = $_POST['quantity'];

	$num_row = mysqli_query($conn,"SELECT * FROM customer_cart WHERE product_fk = '$product_id' AND c_fk = '$customer_id'");
	if (mysqli_num_rows($num_row) > 0) {
		$r = mysqli_fetch_assoc($num_row);
		$q = $r['quantity'];
		$q = $q + $quantity;
		$update_cart = mysqli_query($conn,"UPDATE customer_cart SET quantity='$q' WHERE product_fk = '$product_id' AND c_fk = '$customer_id'");
		if ($update_cart) {
			$del = mysqli_query($conn,"DELETE FROM customer_wishlist WHERE product_fk = '$product_id' AND c_fk = '$customer_id'");
			if (!$del) {
				echo mysqli_error($conn);
			}else{
				echo "transfered";
			}
		}else{
			echo mysqli_error($conn);
		}
	}else{
		$query_insert_cart = mysqli_query($conn, "INSERT INTO `customer_cart`(`c_fk`, `product_fk`,`quantity`) VALUES ('$customer_id','$product_id','$quantity')");
		if ($query_insert_cart) {
			$del = mysqli_query($conn,"DELETE FROM customer_wishlist WHERE product_fk = '$product_id' AND c_fk = '$customer_id'");
			if (!$del) {
				echo mysqli_error($conn);
			}else{
				echo "transfered";
			}
		}else{
			echo mysqli_error($conn);
		}
	}
}

/*Must only delete users item*/
if (isset($_POST['id'])) {
	if ($_POST['action'] == 'remove_p') {
		$fk = $_POST['id'];
		$customer_id = $_POST['customer_id'];
		$del = mysqli_query($conn,"DELETE FROM customer_cart WHERE p_k = '$fk' AND c_fk = '$customer_id'");
		if ($del) {
			echo "Deleted";
			$cart_item_deleted .= 'true';
		}
	}
}

if (isset($_POST['id'])) {
	if ($_POST['action'] == 'remove_wishlist') {
		$fk = $_POST['id'];
		$del = mysqli_query($conn,"DELETE FROM customer_wishlist WHERE p_k = '$fk'");
		if ($del) {
			$wish_item_deleted .= 'true';
		}
	}
}
function remove_wish($conn,$id,$user){
		$del = mysqli_query($conn,"DELETE FROM customer_wishlist WHERE p_k = '$id' AND c_fk = '$user'");
		if ($del) {
			return true;
		}	
}
// $response = array(
// 	'inserted' => $inserted,
// 	// 'updated' => $updated,
// 	'cart_item_deleted' => $cart_item_deleted,
// 	'wish_item_deleted' => $wish_item_deleted,
// 	'wish_remove' => $wish_remove
// 	 );

// echo json_encode($response);