<?php
// include('header.php');
require_once 'header.php';
include 'inc/functions/function.php';
?>

<div>
	<section id="list_of_alum">
		<div class="header-title">
			<div id="header-alumni">
				<span>Feedbacks</span>
			</div>
				
			<div class="table-alums">
				<div class="thead">
					<table>
						<div style="width: 100%;line-height: 4;vertical-align: middle;padding-left: 10px;">
							<!-- <div style="display: inline-block;">	 -->
								<!-- <button style="padding: 2px;"><i class="fas fa-plus"></i> Add Orders</button> -->
					<!-- 			<label class="search-field-wrapper" style="border: 1px solid #16c1c2;position: relative;padding: 4px 8px;">
									<i class="fas fa-search"></i>
									<input type="text" name="search-user" placeholder="Search user message..." id="recipient">
								</label>
							</div> -->
							<div style="display: inline-block;float: right;margin-right: 44px;position: relative;">
								<div style="display: flex;flex-direction: column;margin: 0 auto;padding-top: 5px;">
					<!-- 				<div style="display: flex;flex-direction: row;width: calc( 100% - 50px );color: #333;">
										<label style="width: 100px;">Filter by: </label>
										<select style="height: 30px;border: 1px solid;border: 1px solid #999;border-radius: 3px;width: 200px;margin-top: 18px;" id="emStat">
										  <option value="0" selected>All</option>
										  <option value="1">Pending</option>
										  <option value="2">Confirmed</option>
										  <option value="3">cancelled</option>
										</select>
									</div> -->
								</div>
							</div>
						</div>
						<thead>
							<tr id="t-up">
								<th>Name</th>
								<th>Lastname</th>
								<th>Feedback</th><!-- 
								<th>Course</th>
								<th>Job Related to Field</th>
								<th>Status</th>
								<th>View</th> -->
							</tr>
						</thead>
						<tbody class="na">
						<?php
							$w = mysqli_query($conn, "SELECT * FROM feedback");
							while ($alumni = mysqli_fetch_assoc($w)) {
								?>
							<tr id="b-l">
								<td><?php echo  $alumni['name'];?></td>
								<td><?php echo  $alumni['lastname'];?></td>
								<td><?php echo $alumni['content']; ?></td>
							</tr>		
						<?php
							}
							?>					
						</tbody>
					</table>
				</div>
				<div class="showProf">
					<div class="hid">
						<!-- data profile here -->
					</div>
				</div>
			</div><!-- End table  -->
		</div>
	</section>
</div>

<?php
include('footer.php');
?>