<div class="thead">
	<div class="wrap-addP">
		<div style="margin-top: 30px;">
			<h2 style="color: #777;font-weight: 400;">
				Add Category
			</h2>
		</div>
		<?php
		if (isset($_REQUEST['catId'])) {
			$p_k = $_REQUEST['catId'];
			$br = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM category WHERE p_k = '$p_k'"));
			?>
			<form method="POST" action="inc/actions/update/update_cat.php" enctype="multipart/form-data">
				<div class="addP-input-div">
					<label class="addP-input-label">Category name</label>
					<input type="hidden" name="id" value="<?php echo $p_k; ?>">
					<input type="text" name="title" value="<?php echo $br['category_name'];?>" class="addP-input">
				</div>	
				<div class="addP-input-div">
					<input type="submit" name="submit" value="Save Category" class="addProd">
				</div>			
			</form>
		<?php
		} else {

		?>

		<form method="POST" action="inc/actions/category_add.php" enctype="multipart/form-data">
			<div class="addP-input-div">
				<label class="addP-input-label">Category name</label>
				<input type="text" name="title" placeholder="Brands Name" class="addP-input">
			</div>	
			<div class="addP-input-div">
				<input type="submit" name="submit" value="Save Category" class="addProd">
			</div>			
		</form>
		<?php
		}

		?>
	</div>
</div>