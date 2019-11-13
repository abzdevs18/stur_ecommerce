<?php
// include('header.php');
require_once 'header.php';
include 'inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Add Brands</span>
				<a href="brands.php?p=1"><span style="float: right;font-size: 16px;text-decoration: underline;font-style: italic;color: #555;">Back</span></a>
			</div>
			<div class="table-alums">
				<?php include 'divisions/brand/add_brand.php'; ?>
				<div class="showProf">
					<div class="hid">
						<!-- data profile here -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
include('footer.php');
?>