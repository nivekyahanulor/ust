	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/reports.php');

	?>

	<div id="main">
		<center>
			<div class="bg-img">
				<img src="assets/images/favicon.png">
			</div>
		</center>
		<header class="mb-3">
			<a href="#" class="burger-btn d-block d-xl-none">
				<i class="bi bi-justify fs-3"></i>
			</a>
		</header>
		<div class="sidebar-title">
			<i class="fa fa-user-o" aria-hidden="true" style="color: #cca934; font-weight:bold"></i>
			<strong>
				<?php
				echo "<a href='profile.php?id=" . $_SESSION['name'] . "'>" . $_SESSION['name']  . "</a>";
				echo "<br>";
				if ($_SESSION['role'] == 1) {
					if ($_SESSION['position'] == 1) {
						echo '(Admin)';
					} else if ($_SESSION['position'] == 2) {
						echo '(Super Admin)';
					} else if ($_SESSION['position'] == 3) {
						echo '(Help Desk)';
					}
				} else {

					echo '(Member)';
				}
				?>
			</strong>

		</div>
		<div class="page-heading">
			<h3> Report Page </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
							
								<div class="card-body">
										<table class="table table-striped" id="table1">
											<thead>
												<tr>
													<th class="text-center">Name</th>
													<th class="text-center">User Name</th>
													<th class="text-center">Status</th>
													<th class="text-center">Date</th>
												</tr>
											</thead>
											<tbody>
											<?php while ($val = $login_history->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->name; ?></td>
													<td class="text-center"><?php echo $val->user_name; ?></td>
													<td class="text-center"><?php echo $val->status; ?></td>
													<td class="text-center"><?php echo $val->date_added; ?></td>
													
												</tr>

						<?php } ?>
						</tbody>
						</table>
						</div>
					</div>
				</div>
		</div>

	</div>

	</section>
	</div>

	<?php

	include('includes/footer.php');

	?>