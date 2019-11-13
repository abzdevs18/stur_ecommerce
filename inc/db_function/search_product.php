<?php
	/*Script located in js/functions/main_functions.js*/
	
	if (isset($_POST['product'])) {
		// session_start();
		// error_reporting(0);
		include '../conn.php';
		// search user db and store the result to array
		$query = "SELECT p_k,name_p FROM product";
		$query_result = mysqli_query($conn, $query);
		$name = array();
		while ($row = mysqli_fetch_assoc($query_result)) {
			$name[] = $row;
		}

		$nameI = mysqli_real_escape_string($conn, $_POST['product']);
		$nameinput = ucwords(strtolower($nameI));
		// Check the the array of users if the search value is equal to one of the users in the array
		if (!empty($nameinput)) {
				$r = '';
			foreach ($name as $key => $value) {
				$im = implode(",", $value);
				if (strpos($im, $nameinput) === false) {
					echo '<a href="#" style="font-size: 18px;"><p style="padding-left: 10px;text-decoration:none;" class="link_result">No Result Found...</p></a>';
					break;
				}
				if (strpos($im, $nameinput) !== false) {
					echo '<a href="product_preview.php?prodId='.$value['p_k'].'" style="font-size: 18px;"><p style="padding-left: 10px;" class="link_result">'.$value['name_p'].'</p></a>';
				}
			}
		}
	}
?>