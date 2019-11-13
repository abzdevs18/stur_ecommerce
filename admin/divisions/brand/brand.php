				<div class="thead">
					<table>
						<div style="width: 100%;line-height: 4;vertical-align: middle;padding-left: 10px;">
							<div style="display: inline-block;">	
								<a href="add_brand.php?p=5"><button style="padding: 2px;"><i class="fas fa-plus"></i> Add Brand</button></a>
								<label class="search-field-wrapper" style="border: 1px solid #16c1c2;position: relative;padding: 4px 8px;">
									<i class="fas fa-search"></i>
									<input type="text" name="search-user" placeholder="Search user message..." id="recipient">
								</label>
							</div>
						</div>
						<thead>
							<tr id="t-up">
								<th>Brand names</th>
								<th>Products</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody class="na">
						<?php
							if (isset($_REQUEST['id'])) {
								$id = $_REQUEST['id'];
								$w = mysqli_query($conn, "SELECT * FROM brand WHERE p_k = '$id'");
							}else{
								$w = mysqli_query($conn, "SELECT * FROM brand");
							}
							while ($brand = mysqli_fetch_assoc($w)) {
								$id = $brand['p_k'];
								$prod = mysqli_query($conn,"SELECT COUNT(category) AS product_num FROM product WHERE brand = '$id'");
								$prod = mysqli_fetch_assoc($prod);
								?>
							<tr id="b-l">
								<td><?php echo  $brand['brand_name'];?></td>
								<td><a href="product.php?p=6&brandId=<?php echo $id; ?> "><?php echo  $prod['product_num'];?></a></td>
								<td>
									<a href="add_brand.php?p=5&brandId=<?php echo $id; ?> "><button style="padding: 1px 3px;"><i class="fas fa-pencil-alt"></i></button></a> | 
									<a href="inc/actions/delete/delete_brand.php?p=5&brandId=<?php echo $id; ?> "><button style="padding: 1px 5px;"><i class="fas fa-times"></i></button></a>
								</td>
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