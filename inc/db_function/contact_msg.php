<?php
include '../conn.php';
if (isset($_POST['submit'])) {
	date_default_timezone_set("America/New_York");
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$lname = mysqli_real_escape_string($conn,$_POST['lname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$sub_msg = mysqli_real_escape_string($conn,$_POST['sub_msg']);
	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$date = date('j M Y');
	$time = date("h:ia");
	$feed = mysqli_query($conn,"INSERT INTO `contact_messages`(`name`, `lastname`, `email`, `subject`, `content`, `date`, `time`) VALUES('$name','$lname','$email','$sub_msg','$content','$date','$time')");
	if ($feed) {
		header("Location:../../index.php");
	}else{
		echo mysqli_error($conn);
	}
}