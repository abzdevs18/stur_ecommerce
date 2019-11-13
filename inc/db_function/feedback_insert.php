<?php
include '../conn.php';
if (isset($_POST['submit'])) {
	date_default_timezone_set("America/New_York");
	$customer = mysqli_real_escape_string($conn,$_POST['customer_ID']);
	$product = mysqli_real_escape_string($conn,$_POST['product_ID']);
	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$date = date('j M Y');
	$time = date("h:ia");
	$feed = mysqli_query($conn,"INSERT INTO `customer_feedback`(`c_fk`, `p_fk`, `content`,`time`,`date`) VALUES('$customer','$product','$content','$time','$date')");
	if ($feed) {
		header("Location:../../product_preview.php?prodId=".$product."");
	}
}