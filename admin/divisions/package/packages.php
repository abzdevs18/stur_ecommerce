				<div class="thead">
					<table>
						<div style="width: 100%;line-height: 4;vertical-align: middle;padding-left: 10px;">
							<div style="display: inline-block;">	
								<a href="add_package.php?p=2"><button style="padding: 2px;"><i class="fas fa-plus"></i> Add Package</button></a>
								<label class="search-field-wrapper" style="border: 1px solid #16c1c2;position: relative;padding: 4px 8px;">
									<i class="fas fa-search"></i>
									<input type="text" name="search-user" placeholder="Search user message..." id="recipient">
								</label>
							</div>
						</div>
						<thead>
							<tr id="t-up">
								<!-- <th>Image</th> -->
								<th>Name</th>
								<th>Price</th>
								<th>People</th>
								<th>Products</th>
								<th>Status</th>
								<th>Actions</th>
								<th>View</th>
							</tr>
						</thead>
						<tbody class="na">
						<?php
							$w = mysqli_query($conn, "SELECT * FROM package");
							while ($package = mysqli_fetch_assoc($w)) {
								$id = $package['p_k'];
								$check = mysqli_query($conn,"SELECT * FROM images WHERE package_fk = '$id'");
								$row = mysqli_fetch_assoc($check);
								$p_num = mysqli_query($conn,"SELECT COUNT(package_fk) AS prod_num FROM package_items WHERE package_fk = '$id'");
								$prod_num= mysqli_fetch_assoc($p_num);
								?>
							<tr id="b-l">

								<td><?php echo  $package['name'];?></td>
								<td><?php echo  $package['price'];?></td>
								<td><?php echo  $package['people'];?></td>
								<td><a href="product.php?p=6&id=<?php echo $id; ?> "><?php echo  $prod_num['prod_num'];?></a></td>
								<td><?php 
								if ($package['status'] == 1) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Active</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Inactive</button>";
								}?></td>
								<td><button style="padding: 1px 3px;"><i class="fas fa-pencil-alt"></i></button> | <button style="padding: 1px 5px;"><i class="fas fa-times"></i></button></td>
								<td><button onclick="showProf(<?php echo $id;?>)">Show Profile</button></td>
							</tr>		
						<?php
							}
							?>					
						</tbody>
					</table>
				</div>
				<div class="showProf">
					<div class="hid">
						<!-- data profile here -->
					</div>
				</div>