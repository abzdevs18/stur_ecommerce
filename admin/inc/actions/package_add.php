<?php
include '../conn_db.php';
if (isset($_POST['title'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$people = $_POST['people'];
	$status = $_POST['status'];
	$tit = ucwords($title);

	// $status = array();
	/*Image Path*/

	/*Quantity*/
	parse_str($_POST['quantity'],$a);
	parse_str($_POST['product_name'],$b);
	// $package_photo = $_POST['package_photo'];

	$check_cat = mysqli_query($conn, "SELECT `name` FROM `package` WHERE `name` = '$tit'");
	$num_rows = mysqli_num_rows($check_cat);
	if ($num_rows > 0) {
		// $status['exist'] = 1;
		// echo json_encode($status);
		header("Location: ../../package.php?p=2");
		exit();
	}else{
		$cat_query = mysqli_query($conn, "INSERT INTO `package`(`name`, `description`, `price`, `people`, `status`) VALUES ('$tit','$description','$price','$people','$status')");
		if ($cat_query) {
			$id = mysqli_insert_id($conn);
			$target = "../../uploads/photo/".basename($_FILES["package_photo"]['name']);
			$image = $_FILES["package_photo"]['name'];
			if (move_uploaded_file($_FILES["package_photo"]["tmp_name"], $target)) {
				$insert_img = "INSERT INTO `images`(`product_fk`, `package_fk`, `image_path`) VALUES (null,'$id','$image')";
				$sql = mysqli_query($conn,$insert_img);
				if ($sql) {
					$items_q = "";
					$q = array();
					$p = array();
					$g = count($a['quantity']);
					for ($i=0; $i < $g ; $i++) { 
						$r = $a['quantity'][$i];
						$q[] = $r;
					}

					$s = count($b['product_name']);
					for ($ia=0; $ia < $s ; $ia++) { 
						$t = $b['product_name'][$ia];
						$p[]=$t;
					}
					foreach ($q as $key => $value) {
						$p_fk = $p[$key];
						$items_q .= "INSERT INTO `package_items`(`package_fk`, `product_fk`, `quantity`) VALUES ('$id','$p_fk', '$value');";
					}
					// echo "$items_q";
					$q = mysqli_multi_query($conn,$items_q);
					if ($q) {
						$url = array(
							"url" => "../../packages.php?p=6"
						);
						// echo json_encode($url);
						echo "Success";
					}else {
						echo "Failed";
						// echo mysqli_error($conn);
					}
				}
			}else {
				echo "err";
			}
		}else {
			echo mysqli_error($conn);
		}
	}
}