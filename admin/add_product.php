<?php
// include('header.php');
require_once 'header.php';
include 'inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Products</span>
				<a href="product.php?p=6"><span style="float: right;font-size: 16px;text-decoration: underline;font-style: italic;color: #555;">Back</span></a>
			</div>
				
			<div class="table-alums">
				<?php include 'divisions/products/add_product.php'; ?>
			</div><!-- End table  -->
		</div>
	</section>
</div>

<?php
include('footer.php');
?>