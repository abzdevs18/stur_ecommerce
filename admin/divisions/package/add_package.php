<div class="thead">
	<div class="wrap-addP">
		<div style="margin-top: 30px;">
			<h2 style="color: #777;font-weight: 400;">
				Add Another Package
			</h2>
		</div>
		<form method="POST" action="inc/actions/package_add.php" enctype="multipart/form-data" id="package_holder">
			<input type="hidden" id="p_k">
			<div class="addP-input-div">
				<label class="addP-input-label">Package Name</label>
				<input type="text" name="title" placeholder="Product" class="addP-input" id="title">
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Description</label>
				<textarea id="description" class="addP-input" value="" style="font-family: arial;color: #444;"></textarea>
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Price<em style="font-size: 10px;"> in Peso(P)</em></label>
				<input type="text" id="price" class="addP-input">
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">People</label>
				<input type="text" id="people" class="addP-input">
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Status</label>
				<select id="status" style="width: 106%;" class="addP-input">
					<option value="1">Active</option>
					<option value="0">Inactive</option>
				</select>
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Add Product</label>
				<div class="addP-input" style="display: flex;flex-direction: row;">
					<input type="number" id="quantity" value="0" min="0" class="addP-input" style="width: 60px;border: none;background:none;">
					<select id="product" class="addP-input" style="width: calc( 100% - 60px );border: none;background:none;">
						<option>Menu Name</option>
					<?php
					$q = mysqli_query($conn, "SELECT * FROM product");
					$fetch = mysqli_fetch_assoc($q);
					foreach ($q as $key => $value) {
						++$key;
						?>
						
						<option value="<?php echo $key ?>" class="product_name" id="<?php echo $value['name'] ?>"> <?php echo $value['name'] ?> </option>

					<?php
					}
					?>
					</select><br>
				</div>
				<p id="error_qunatity" class="addP-input" style="display: none;text-align: left;padding-left: 0;border: navajowhite;font-size: 13px;color: red;">Please add atleast one(1) value</p>
				<button style="width: 100px;padding: 3px 7px;margin: 10px 0px;" id="ded">Add</button>
				<div style="width: 425px;">
					<table style="border-left: 1px solid #cfdbe2;display: none;" id="ta">
						<tr>
							<th style="border-right: 1px solid #cfdbe2;">Quantity</th>
							<th style="border-right: 1px solid #cfdbe2;">Name of Menu</th>
							<th style="border-right: 1px solid #cfdbe2;">Action</th>
						</tr>
						<tbody id="d">
						</tbody>
					</table>
				</div>
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Image</label>
				<input type="file" id="image" name="package_photo" accept="*/image" class="addP-input">
			</div>		
			<div class="addP-input-div">
				<input type="submit" id="add_prod" value="Save Product" class="addProd">
			</div>	
		</form>	
	</div>
</div>