<?php
session_start();
include '../conn.php';
// $total_i = 0;
$c_id = $_SESSION['user_id'];
$output='';
$item = mysqli_query($conn,"SELECT COUNT(*) AS numb FROM customer_cart WHERE c_fk = '$c_id'");
$count = mysqli_fetch_assoc($item);
$total_i = $count['numb'];

$menu = array(
	'item_number' => $total_i
	);
echo json_encode($menu);

