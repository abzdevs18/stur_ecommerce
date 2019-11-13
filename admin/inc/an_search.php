<?php
	
	if (isset($_POST['name'])) {
		include 'conn_db.php';
		// search user db and store the result to array
		$n = $_POST['name'];
		$nameinput = ucwords(strtolower($n));
		$query = "SELECT * FROM customer WHERE name LIKE '%$nameinput%' AND p_k != 0";
		$query_result = mysqli_fetch_assoc(mysqli_query($conn, $query));
		$fk = $query_result['p_k'];
							$w = mysqli_query($conn, "SELECT * FROM reservations WHERE u_fk = '$fk'");
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
	}


	if (isset($_POST['stat'])) {
		include '../../inc/conn_db.php';
		// search user db and store the result to array
		$n = $_POST['stat'];
		$nameinput = ucwords(strtolower($n));
		$query = "SELECT * FROM users WHERE Employed = '$n' AND id != 0";
		$query_result = mysqli_query($conn, $query);
		$name = array();
		// $js = json_encode($name);
		while($customers = mysqli_fetch_assoc($query_result)) {
								$id = $customers['id'];
								$check = mysqli_query($conn,"SELECT * FROM about WHERE f_k = '$id'");
								$row = mysqli_fetch_assoc($check);?>
		<tr id="b-l">
								<td><?php echo  $customers['userName'];?></td>
								<td><?php echo  $customers['userLastName'];?></td>
								<td><?php echo  $row['email'];?></td>
								<td><?php echo  $customers['course'];?></td>
								<td><?php 
								if ($customers['online'] == 1) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Online</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Offline</button>";
								}?></td>
								<td><button onclick="showProf(<?php echo  $customers['id'];?>)">Show Profile</button></td>
							</tr>	
		<?php
			}		
	}
?>