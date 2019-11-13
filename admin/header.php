<?php
error_reporting(0);
	session_start();
	include 'inc/conn_db.php';
	if ($_SESSION['id']) {
	$id = $_SESSION['id'];
	$img = "SELECT * FROM `admin_profile_photo` WHERE f_k = '$id' AND prof_status = 1";
	$q_img = mysqli_query($conn,$img);
	$row = mysqli_fetch_assoc($q_img);
	$numRow = mysqli_num_rows($q_img);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>STUR-Ecom System</title>
	<meta charset="utf-8">
	<link rel="icon" type="text/css" href="../assets/images/hero_ico.ico">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="Assets/css/fa/css/all.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/message.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="Assets/css/list_style.css">
	<link rel="stylesheet" href="Assets/script/morris/morris.css">
	<link rel="stylesheet" type="text/css" href="Assets/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="Assets/slick/slick-theme.css"/>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	<script src="Assets/script/morris/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
	<!-- animsition.css -->
	<link rel="stylesheet" href="Assets/css/animsition.min.css">

	<style type="text/css">
		.slick-dots {
			bottom: 5px !important;/*
			width: calc( (100% / 4) - 10px );
			float: left;*/
		}
		.slick-next {
			right: 25px !important;
		}
		.slick-dotted.slick-slider {
			margin-bottom: 5px !important;
		}
		/* Sidebar Menu */
		.sidebar-menu-container {
		 	width: 250px;
		 	height: 100vh;
		 	background-color: #f3f3f3;
		 	position: fixed;
		 	top: 60px;
		 	left: -250px;
		 	transition: all .3s ease-in-out;
		 	z-index: 9999999;
		 	box-shadow: 0px 7px 16px 1px #999;
		 	
		 }

		 .sidebar-menu-active {
		 	left: 0px;
		 }
	</style>
</head>
<body>
	<main>
		<div style="display:none;width: 100%;height: 100vh;background-color: #fff;position: fixed;z-index: 999999;text-align: center;" id="gif">
			<div style="display: flex;flex-direction: column;margin-top: 150px;">
				<img src="../assets/images/placing_loading.gif" style="width: 400px;margin: 0 auto;">
				<span style="top: -10px;margin-top: -80px;font-size: 25px;font-family: pacifico;color: #444;">Executing Request...</span>
			</div>
		</div>
		<nav style="position: fixed;">
			<div class="nav-wrapper">
				<div class="feature-left-items">
					<i class="fas fa-bars" style="position: absolute;left: 0;margin: 18px;font-size: 25px;color: #f3f3f3;cursor: pointer;" id="menu-sidebar"></i>
					<a href="packages.php?p=2">
						<div class="menu-icon">
							<!-- <i class="fas fa-bars"></i> -->
							<img src="Assets/images/hero.png">
						</div>
					</a>
				<!-- 	<div class="upload" style="margin-top: 5px;">
						<button class="popclick"><i class="fas fa-plus"></i> Upload</button>
					</div> -->
					<div class="background-upload" style="display: none;">
					</div>
					<!-- <form> -->
						<div class="upload-form animsition" data-animsition-in-class="zoom-in-sm" data-animsition-in-duration="300" data-animsition-out-class="zoom-out-sm" data-animsition-out-duration="200" style="display: none;margin: 0 auto;position: absolute;">
							<div class="top-upload-form">
								<i class="far fa-times-circle"></i>
							</div>
							<div class="admin-photo">
								<?php
									if($numRow > 0){?>
									<img src="<?php echo "inc/uploaded/profile/".$row['image_path']; ?>" name="profile_img" id="profileImageContainer" alt="Profile Image">
									<?php 
										} else {?>
									<img src="Assets/images/default/user_default.png" name="profile_img" id="profileImageContainer" alt="Profile Image">
									<?php
										}
								?>	
								<!-- <img src="../image/prof.jpg"> -->
							</div>
							<!-- POST START HERE -->
							<div class="post-content">
								<input type="text" id="content" name="post-content" placeholder="What do you want to discuss?">		
								<div style="position: absolute;display: none;" id="progress">
									<span>Uploading</span>
								</div>				
							</div>
							<div id="photo-preview-wrapper" style="display: none;">
								<!-- icon for removing Preview -->
								<i class="far fa-times-circle remove-preview"></i>
								<img src="#" id="preview-photo" >
							</div>
							<div class="video-container" style="width: 100%;display: none;margin-top: 30px;">
								<i class="far fa-times-circle remove-preview"></i>
								<video width="100%" controls>
									  <source src="#" id="v-upload">
   										Your browser does not support HTML5 video.
								</video>
							</div>
							<div class="bottom-upload-form">
								<div class="upload-files">
									<!-- Photo Selection -->
									<div class="photo-select">
										<input type="file" name="admin_photo" class="upload-photo" id="pUpload" accept="image/*">			
										<i class="fas fa-camera"></i>						
									</div>
									<!-- Video Selection input given below -->
									<div class="video-select">
										<input type="file" name="video" class="upload-video" id="vidUp" accept="video/*">			
										<i class="fas fa-video"></i>				
									</div>
								</div>
								<div class="upload-submit">
									<input type="submit" name="submit" value="Post" id="adminP">
								</div>
							</div>
						</div>
					<!-- </form> -->
				</div>
				
				<div class="feature-right-items" style="padding: 5px 0px;">
					<div class="notification">
						<i class="far fa-bell"></i>
									<div style="position: absolute;top: -10px;margin-left: 20px;">
										<span style="line-height: 3;vertical-align: middle;background-color: #f9b606;padding: 3px 6px;border-radius: 57px;font-size: 10px;color: #222;font-weight: bold;display: none;" id="badge">1</span>
									</div>
						<div class="drop-down-notification" style="width: 245px;height: auto;margin-left: -220px;display: none;">
							<i class="fas fa-caret-up"></i>

							<?php
								include 'inc/conn_db.php';
								$us = 0;
								$c = mysqli_query($conn,"SELECT * FROM comments WHERE user_id != '$us' ORDER BY comment_timestamp DESC LIMIT 5");
								while($rw = mysqli_fetch_assoc($c)){
									$msg_sender = $rw['user_id'];
									$img = "SELECT * FROM user_user_photo WHERE user_id = '$msg_sender' AND profile_photo = 1";
									$q_img = mysqli_query($conn,$img);
									$r = mysqli_fetch_assoc($q_img);

							?>
							<div class="notif-msg" style="color: #333;width: auto;">
								<!-- <div class="notif-head"> -->
									<?php
									if($r){?>
										<div class="notif-head" style="background-image: url('Assets/images/200px-Negros_Oriental_State_University.png');background-position: center;background-size: contain;background-repeat: no-repeat;">
									<?php } else {?>
										<div class="notif-head" style="background-image: url('Assets/images/200px-Negros_Oriental_State_University.png');background-position: center;background-size: contain;background-repeat: no-repeat;">	
										<?php	
									}
										?>
									</div>								
								<!-- </div> -->
								<div class="notif-content">
									<?php 

									$n = mysqli_query($conn,"SELECT * FROM users WHERE id = '$msg_sender'");
									$rt = mysqli_fetch_assoc($n);

									?>
									<span><b><?php echo $rt['userName']; ?></b> comment on Admin's Post</p></span>
									<p><?php echo $rw['comment_content']; ?></p>
								</div>
							</div>
							<?php
								}
						?>
						</div>
					</div>
				<!-- 	<?php
					$md = mysqli_query($conn, "SELECT id FROM users WHERE id != 0 ORDER BY id ASC LIMIT 1");
					$e = mysqli_fetch_assoc($md);
					?> -->
					<a href="message.php?user=<?php echo $e['id'];?>"><div class="message" style="margin-right: 0px;">
						<i class="far fa-envelope"></i>
	<!-- 					<div class="drop-down-message">
							<i class="fas fa-caret-up"></i>
							<div class="drop-notif">
								<span>You have 2 new Messages</span>
							</div>
							<div class="notif-msg">
								
							</div>
				
						</div> -->
					</div></a>
					<div class="profile">
						<div class="p-">
							<!-- <div class="p-i"> -->
							<?php
								if($numRow){?>
									<div class="p-i" style="background-image: url('<?php echo "inc/uploaded/profile/".$row['image_path']; ?>');background-position: center;background-size: cover;">
								<?php 
									} else {?>
									<div class="p-i" style="background-image: url('Assets/images/default/user_default.png');background-position: center;background-size: cover;">
								<?php
									}
							?>						
							</div>
							<div class="b-p">
								<span>Me <i class="fas fa-caret-down"></i></span>
							</div>
						</div>
						<div class="p-drp" style="display: none;">
							<div class="p-a">
									<!-- Profile image in the center of navigation -->
									<?php
										if($numRow){?>
											<div class="p-i drp-p-i" style="background-image: url('<?php echo "inc/uploaded/profile/".$row['image_path']; ?>');background-position: center;background-size: cover;">
										<?php 
											} else {?>
											<div class="p-i drp-p-i" style="background-image: url('Assets/images/default/user_default.png');background-position: center;background-size: cover;">
										<?php
											}
										?>
									<!-- End of the profile -->
									<div class="p-up">
										<i class="fas fa-camera cam-admin"></i>
										<form method="POST" action="inc/prof_update.php" enctype="multipart/form-data" id="update_admin_prof">
											<input type="file" name="adminP" id="updateAd" accept="image/*">
										</form>
									</div>							
								</div>
								<div class="p-d">
									<?php
									$id = $_SESSION['id'];
									$img = mysqli_query($conn,"SELECT * FROM `admin_user` WHERE id = '$id'");
									$fetch = mysqli_fetch_assoc($img);
									?>
									<span><?php echo $fetch['name'] ?></span>
									<p>Negros ORiental State University</p>
								</div>
							</div>
							<div class="v-p">
								<p>Manage</p>
							</div>
							<div class="m-p">
								<!-- <a href="#">View Profile</a> -->
								<a href="inc/logout.php">Log Out</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<section class="sidebar-menu-container">
			<div id="menu-wraper">
				<a href="brands.php?p=5">
					<div id="menu-items" class="<?php if($_REQUEST['p'] == '5'){echo "active";}?>">
						<i class="fab fa-slack"></i>
						<span>Brand</span>
					</div>
				</a>
				<a href="category.php?p=1">
					<div id="menu-items" class="<?php if($_REQUEST['p'] == '1'){echo "active";}?>">
						<i class="fab fa-slack"></i>
						<span>Category</span>
					</div>
				</a>
				<a href="product.php?p=6">
					<div id="menu-items" class="<?php if($_REQUEST['p'] == '6'){echo "active";}?>">
						<i class="far fa-folder-open"></i>
						<span>Product</span>
					</div>
				</a>
				<a href="packages.php?p=2">
					<div id="menu-items" class="<?php if($_REQUEST['p'] == '2'){echo "active";}?>">
						<i class="fas fa-box"></i>
						<span>Packages</span>
					</div>
				</a>
				<a href="orders.php?p=3">
					<div id="menu-items" class="<?php if($_REQUEST['p'] == '3'){echo "active";}?>">
						<i class="far fa-calendar-check"></i>
						<span>Orders</span>
					</div>
				</a>
				<a href="feedback.php?p=4">
					<div id="menu-items" class="<?php if($_REQUEST['p'] == '4'){echo "active";}?>">
						<i class="fas fa-comments"></i>
						<span>Feedbacks</span>
					</div>
				</a>
			</div>		
		</section>
<?php
} else {
	header("Location: index.php");
	exit();
}