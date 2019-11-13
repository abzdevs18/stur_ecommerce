<div class="thead">
	<div class="wrap-addP">
		<div style="margin-top: 30px;">
			<h2 style="color: #777;font-weight: 400;">
				Add Another Product
			</h2>
		</div>
		<form method="POST" action="inc/actions/product_add.php" enctype="multipart/form-data">
			<div class="addP-input-div">
				<label class="addP-input-label">Product Name</label>
				<input type="text" name="name" placeholder="Product" class="addP-input">
			</div>	
			<div class="addP-input-div">
				<label class="addP-input-label">Model</label>
				<input type="text" name="model" placeholder="Model" class="addP-input">
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Price</label>
				<input type="text" name="price" placeholder="Price" class="addP-input">
			</div>	
			<div class="addP-input-div">
				<label class="addP-input-label">Item Available</label>
				<input type="number" name="quantity" min="0" value="0" class="addP-input">
			</div>	
<!-- 			<div class="addP-input-div">
				<label class="addP-input-label">Description</label>
				<input type="text" name="description" placeholder="Description" class="addP-input">
			</div> -->
			<div class="addP-input-div">
				<label class="addP-input-label">Brand</label>
				<select name="brand" style="width: 106%;" class="addP-input">
				<?php
				$q = mysqli_query($conn, "SELECT * FROM brand");
				$fetch = mysqli_fetch_assoc($q);
				foreach ($q as $key => $value) {
					++$key;
					?>
					
					<option value="<?php echo$value['p_k'] ?>"> <?php echo $value['brand_name']; ?> </option>

				<?php
				}
				?>
				</select>
			</div>	
			<div class="addP-input-div">
				<label class="addP-input-label">Category</label>
				<select name="category" style="width: 106%;" class="addP-input">
				<?php
				$q = mysqli_query($conn, "SELECT * FROM category");
				$fetch = mysqli_fetch_assoc($q);
				foreach ($q as $key => $value) {
					++$key;
					?>
					
					<option value="<?php echo $value['p_k'] ?>"> <?php echo $value['category_name'] ?> </option>

				<?php
				}
				?>
				</select>
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Description</label>
				<textarea id="description" name="description" class="addP-input" value="" style="font-family: arial;color: #444;"></textarea>
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Information</label>
				<textarea id="description" name="information" class="addP-input" value="" style="font-family: arial;color: #444;"></textarea>
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Product Image</label>
				<input type="file" name="image" accept="*/image" class="addP-input">
			</div>		
			<div class="addP-input-div">
				<input type="submit" name="submit" value="Save Product" class="addProd">
			</div>	
		</form>
	</div>
</div>