<?php
include '../conn_db.php';
if (isset($_POST['p_k'])) {
	$pk=$_POST['p_k'];
	$prod = array();
	$m = mysqli_query($conn,"SELECT * FROM package WHERE p_k = '$pk'");
	if ($row = mysqli_fetch_assoc($m) {
		$prod[0]['pack'] = $row;
	}
	print_r($prod);
}
