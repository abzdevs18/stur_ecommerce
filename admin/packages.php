<?php
// include('header.php');
require_once 'header.php';
include 'inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Packages</span>
			</div>
				
			<div class="table-alums">
				<?php include 'divisions/package/packages.php'; ?>
			</div><!-- End table  -->
		</div>
	</section>
</div>

<?php
include('footer.php');
?>