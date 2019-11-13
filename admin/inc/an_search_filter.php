<?php
	
	include 'conn_db.php';
	// search user db and store the result to array
	$n = $_POST['stat'];
	$q='';
	if ($n == 0) {
		$q.="SELECT * FROM reservations";
	}
	else if ($n == 1) {
		$q.="SELECT * FROM reservations WHERE r_status = 0";
	}
	else if ($n == 2) {
		$q.="SELECT * FROM reservations WHERE r_status = 1";
	}
	else if ($n == 3) {
		$q.="SELECT * FROM reservations ORDER BY delivery_date DESC";
	}
	$w = mysqli_query($conn, $q);					
	while ($reserv_list = mysqli_fetch_assoc($w)) {
		$id = $reserv_list['u_fk'];
		$r_stat = $reserv_list['r_status'];
		$check = mysqli_query($conn,"SELECT * FROM customer WHERE p_k = '$id'");
		$row = mysqli_fetch_assoc($check);
		$em = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM c_email WHERE email_fk = '$id'"));
		$cp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM c_phone WHERE phone_fk = '$id'"));
		?>
	<tr id="b-l">
		<td></td>
		<td><?php echo  $row['name'];?></td>
		<td><?php echo  $em['email'];?></td>
		<td><?php echo $cp['number']; ?></td>
		<td style="text-align: center;">
			<select class="order_b uc" id="<?php echo $id;?>">
				<option selected value="0">Pending</option>
				<option value="1" <?php if ($r_stat == 1) {
					echo "selected";
				}?>>Confirm</option>
			</select>
		</td>
		<td><?php echo  $reserv_list['delivery_date'];?></td>
		<td><button onclick="showProf(<?php echo $id;?>)" class="order_b">Show Profile</button></td>
	</tr>		
<?php
	}	
	