<?php
include 'inc/conn_db.php';
if ( isset($_POST['id']) ) {
	$id = $_POST['id'];
	$info = mysqli_query($conn, "SELECT * FROM package WHERE p_k = '$id'");
	if ($info) {
		$row = mysqli_fetch_assoc($info);
		$u_id = $row['p_k'];
			$img = "SELECT * FROM images WHERE package_fk = '$u_id'";
			$q_img = mysqli_query($conn,$img);
			if ($q_img) {
				$wall = mysqli_fetch_assoc($q_img);?>
					<div class="pro-wrp">
						<?php
						if($wall){?>
							<div style="background-image:linear-gradient(to top, rgba(51,51,51,0.2), rgba(51,51,51,0)),url('<?php echo "uploads/photo/". $wall['image_path'];?>');height: 160px;background-size: contain;background-repeat: no-repeat;background-position: center;background-size: cover;">
						<?php
							} else {?>
							<div style="background-image:linear-gradient(to top, rgba(51,51,51,0.2), rgba(51,51,51,0)),url('../image/default/wall.jpg');height: 160px;background-size: contain;background-repeat: no-repeat;background-position: center;background-size: cover;">
						<?php	} ?>
						</div>
						<div style="display: flex;">
							<div style="margin-top: 20px;text-align: center;">
							<!-- 		Contact #: <span style="font-size: 13px;font-style: italic;"><?php echo $row['id'];?></span> -->
									<input type="hidden" id="jkl" value="<?php echo $u_id;?>">
									<span style="color: #555;font-size: 20px;"><?php echo $row['name'];?></span><br />
								</div>	
							</div>
							<div id="introProf">
								<div style="padding: 3px 0px;">
									Description: <span style="font-size: 13px;font-style: italic;"><?php echo $row['description'];?></span>
								</div><br />
							</div>	
								<div id="p-action-btn" style="position: relative;top: -20px;padding: 11px;">
									<!-- <button class="reMvPrev more">show more..</button> -->
									<a href="inc/suspended.php?id=<?php echo $id; ?>" style="float: right;"><button class="reMvPrev" style="margin-top: 0px;">Edit</button></a>								
								</div>							
						</div>
					</div>
			<?php
			}
	}
}