<?php
// include('header.php');
require_once 'header.php';
include 'inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Category</span>
			</div>
			<div class="table-alums">
				<?php include 'divisions/category/category.php'; ?>
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