<?php
// include('header.php');
require_once 'header.php';
include 'inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-reserv_list">
				<span>Orders</span>
			</div>
				
			<div class="table-alums">
				<div class="thead">
					<table>
						<div style="width: 100%;line-height: 4;vertical-align: middle;padding-left: 10px;">
							<div style="display: inline-block;">	
								<!-- <button style="padding: 2px;outline: none;background-color: #f5f5f5;"><i class="fas fa-search"></i>Search Orders</button> -->
								<label class="search-field-wrapper" style="border: 1px solid #16c1c2;position: relative;padding: 4px 8px;">
									<i class="fas fa-search"></i>
									<input type="text" name="search-user" placeholder="Search user message..." id="recipient">
								</label>
							</div>
<!-- 							<div style="display: inline-block;float: right;margin-right: 44px;position: relative;">
								<div style="display: flex;flex-direction: column;margin: 0 auto;padding-top: 5px;">
									<div style="display: flex;flex-direction: row;width: calc( 100% - 50px );color: #333;">
										<label style="width: 100px;">Filter by: </label>
										<select style="height: 30px;border: 1px solid;border: 1px solid #999;border-radius: 3px;width: 200px;margin-top: 18px;" id="emStat">
										  <option value="0" selected>All</option>
										  <option value="1">Pending</option>
										  <option value="2">Confirmed</option>
										  <option value="3">Delivery Date</option>
										</select>
									</div>
								</div>
							</div> -->
						</div>
						<thead>
							<tr id="t-up">
								<!-- <th></th> -->
								<th>Name</th>
								<th>Email</th>
								<!-- <th>Contact Number</th> -->
								<th>Status</th>
								<th>Delivery Date/Time</th>
								<!-- <th>View</th> -->
							</tr>
						</thead>
						<tbody class="na">
						<?php
							$w = mysqli_query($conn, "SELECT * FROM reservations WHERE pack_fk != 0");
							while ($reserve_ord = mysqli_fetch_assoc($w)) {
								$id = $reserve_ord['u_fk'];
								$id_p = $reserve_ord['p_k'];
								$r_stat = $reserve_ord['r_status'];
								$check = mysqli_query($conn,"SELECT * FROM customer WHERE p_k = '$id'");
								$row = mysqli_fetch_assoc($check);
								$em = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM c_email WHERE email_fk = '$id'"));
								$cp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM c_phone WHERE phone_fk = '$id'"));
								?>
								<tr>
									<input type="hidden" id="u_fk_id" value="<?php echo $id;?>">
									<input type="hidden" id="r_id" value="<?php echo $id_p;?>">
									<input type="hidden" id="u_fk_email_<?php echo $id;?>" value="<?php echo  $em['email'];?>">
									<input type="hidden" id="u_fk_name_<?php echo $id;?>" value="<?php echo  $row['name'];?>">
									<input type="hidden" id="u_fk_cell_<?php echo $id;?>" value="<?php echo  $cp['number'];?>">
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $em['email']; ?></td>
									<td style="text-align: center;">
										<select class="order_b uc" id="<?php echo $id;?>">
											<option selected value="0">Pending</option>
											<option value="1" <?php if ($r_stat == 1) {
												echo "selected";
											}?>>Confirm</option>
										</select>
									</td>
									<td><?php echo  $reserve_ord['delivery_date'];?></td>
									<!-- <td>
										<a href="#"><button class="order_b">View Details</button></a>
									</td> -->
								</tr>
						<?php	}
						?>					
						</tbody>
					</table>
				</div>
				<div class="showProf">
					<div class="hid">
						<!-- data profile here -->
					</div>
				</div>
			</div><!-- End table  -->
		</div>
	</section>
</div>

<?php
include('footer.php');
?>