	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/surveys.php');

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
			<h3> Surveys Page </h3>

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
													<th class="text-center">Is the easy to familiarize?</th>
													<th class="text-center">Was your ticket easily addressed?	</th>
													<th class="text-center">Is the ticketing easily understood?	</th>
													<th class="text-center">Is the button easily to navigate?	</th>
													<th class="text-center">Is the system helpful to you?		</th>
													<th class="text-center">Comments		</th>
												</tr>
											</thead>
											<tbody>
											<?php while ($val = $survey->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->name; ?></td>
													<td class="text-center"><?php echo $val->survey1; ?></td>
													<td class="text-center"><?php echo $val->survey2; ?></td>
													<td class="text-center"><?php echo $val->survey3; ?></td>
													<td class="text-center"><?php echo $val->survey4; ?></td>
													<td class="text-center"><?php echo $val->survey5; ?></td>
													<td class="text-center"><?php echo $val->improve; ?></td>
													
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