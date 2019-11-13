				<div class="thead">
					<table>
						<div style="width: 100%;line-height: 4;vertical-align: middle;padding-left: 10px;">
							<div style="display: inline-block;">	
								<a href="add_product.php?p=6"><button style="padding: 2px;"><i class="fas fa-plus"></i> Add Product</button></a>
								<label class="search-field-wrapper" style="border: 1px solid #16c1c2;position: relative;padding: 4px 8px;">
									<i class="fas fa-search"></i>
									<input type="text" name="search-user" placeholder="Search user message..." id="recipient">
								</label>
							</div>
						</div>
						<thead>
							<tr id="t-up">
								<th>Image</th>
								<th>Name of Product</th>
								<th>Product Brand</th>
								<th>Category</th>
								<th>Status</th>
								<th>Actions</th>
								<!-- <th>View</th> -->
							</tr>
						</thead>
						<tbody class="na">
						<?php
							if (isset($_REQUEST['id'])) {
								$id = $_REQUEST['id'];
								$w = mysqli_query($conn, "SELECT * FROM product WHERE package_fk = '$id'");
								while ($pack_item = mysqli_fetch_assoc($w)) {
									$id = $pack_item['product_fk'];
									$check = mysqli_query($conn,"SELECT image_name FROM product_images WHERE product_fk = '$id'");
									$row = mysqli_fetch_assoc($check);
									$items = mysqli_query($conn, "SELECT * FROM product WHERE p_k = '$id'");
									$product = mysqli_fetch_assoc($items);
									?>

									<tr id="b-l">
										<td>
											<div style="width: 225px;height: 130px;background-color: red;margin: 10px auto;background-position: center;background-repeat: no-repeat;background-size: cover;background-image: url('<?php echo 'uploads/photo/'.$row['image_path']; ?>');">
											</div>
										</td>
										<td><?php echo  $product['name'];?></td>
										<td><?php echo  $product['description'];?></td>
										<td><a href="category.php?p=5&id=<?php echo $id; ?> "><?php echo  $product['category_fk'];?><?php echo  $product['category_fk'];?></a></td>
										<td><?php 
										if ($product['product_quantity'] > 0) {
											echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Available</button>";
										}else{
											echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Inactive</button>";
										}?></td>
										<td><button style="padding: 1px 3px;"><i class="fas fa-pencil-alt"></i></button> | <button style="padding: 1px 5px;"><i class="fas fa-times"></i></button></td>
										<!-- <td><button onclick="showProf(<?php echo $id;?>)">View Image</button></td> -->
									</tr>
							<?php
								}
							}elseif (isset($_REQUEST['catId'])) {
								$id = $_REQUEST['catId'];
								$w = mysqli_query($conn, "SELECT * FROM product WHERE category_fk = '$id'");
							}else{
								$w = mysqli_query($conn, "SELECT * FROM product");
							}
							while ($product = mysqli_fetch_assoc($w)) {
								$id = $product['p_k'];
								$check = mysqli_query($conn,"SELECT * FROM product_image WHERE product_fk = '$id'");
								$row = mysqli_fetch_assoc($check);
								?>
							<tr id="b-l">
								<td>
									<div style="width: 190px;height: 100px;background-color: red;margin: 10px auto;background-position: center;background-repeat: no-repeat;background-size: cover;background-image: url('<?php echo 'uploads/photo/'.$row['image_name']; ?>');">
									</div>
								</td>
								<td><?php echo  $product['name_p'];?></td>
								<td><?php echo  $product['model_p'];?></td>
								<td><?php echo  $product['category'];?></td>
								<td><?php 
								if ($product['product_quantity'] > 0) {
									echo "<button style='background-color:green;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Available</button>";
								}else{
									echo "<button style='background-color:red;padding: 2px 5px;color: #fff;border: 1px solid #999;border-radius: 24px;font-size: 10px;font-weight: bold;'>Out of Stock</button>";
								}?></td>
								<td><button style="padding: 1px 3px;"><i class="fas fa-pencil-alt"></i></button> | <button style="padding: 1px 5px;"><i class="fas fa-times"></i></button></td>
								<!-- <td><button onclick="showProf(<?php echo $id;?>)">View Image</button></td> -->
							</tr>		
						<?php
							}
							?>					
						</tbody>
					</table>
				</div>