<?php
    include '../conn.php';
    session_start();
    $c_id = $_SESSION['user_id'];

    if (isset($_POST['rate'])) {
    	$rate =  $_POST['rate'];
    	$product = $_POST['product'];

    	$check = mysqli_query($conn,"SELECT * FROM rating WHERE product_fk = '$product' AND c_fk = '$c_id'");
    	$num = mysqli_num_rows($check);
    	if ($num > 0) {
    		$up_rate = mysqli_query($conn,"UPDATE rating SET rating = '$rate'");
    		if ($up_rate) {
    			echo "done";
    		}
    	}else{
	    	$rate_q = mysqli_query($conn,"INSERT INTO `rating`(`c_fk`, `product_fk`, `rating`) VALUES ('$c_id','$product','$rate')");
	    	if ($rate_q) {
	    		echo "done";
	    	}
	    }
    }