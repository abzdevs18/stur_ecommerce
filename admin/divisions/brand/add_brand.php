<div class="thead">
	<div class="wrap-addP">
		<div style="margin-top: 30px;">
			<h2 style="color: #777;font-weight: 400;">
				Add Brand
			</h2>
		</div>
		<?php
		if (isset($_REQUEST['brandId'])) {
			$p_k = $_REQUEST['brandId'];
			$br = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM brand WHERE p_k = '$p_k'"));
			?>
			<form method="POST" action="inc/actions/update/update_brand.php" enctype="multipart/form-data">
				<div class="addP-input-div">
					<label class="addP-input-label">Brand name</label>
					<input type="hidden" name="id" value="<?php echo $p_k;?>">
					<input type="text" name="title" value="<?php echo $br['brand_name'];?>" class="addP-input">
				</div>
				<div class="addP-input-div">
					<label class="addP-input-label">Image</label>
					<input type="file" id="image" name="package_photo" value="c:/passwords.txt" accept="*/image" class="addP-input">
				</div>		
				<div class="addP-input-div">
					<input type="submit" name="submit" value="Save Brand" class="addProd">
				</div>			
			</form>
		<?php
		} else {

		?>

		<form method="POST" action="inc/actions/brand_add.php" enctype="multipart/form-data">
			<div class="addP-input-div">
				<label class="addP-input-label">Brand name</label>
				<input type="text" name="title" placeholder="Brands Name" class="addP-input">
			</div>
			<div class="addP-input-div">
				<label class="addP-input-label">Image</label>
				<input type="file" id="image" name="package_photo" accept="*/image" class="addP-input">
			</div>		
			<div class="addP-input-div">
				<input type="submit" name="submit" value="Save Brand" class="addProd">
			</div>			
		</form>
		<?php
		}

		?>

	</div>
</div>