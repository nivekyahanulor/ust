	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/advocacy.php');

	?>

	<div id="main" style="position: relative;">
		<center>
			<div class="bg-img">
				<img src="assets/images/favicon.png">
			</div>
		</center>
		<header class="mb-3">
			<a href="#" class="burger-btn d-block d-xl-none">
				<i class="bi bi-justify fs-3"></i>
			</a>
			<a href="advocacy.php" style="font-size: 20px;color:#cca934;line-height: 33px;">
		</header>
		<div class="sidebar-title">
			<i class="fa fa-user-o" aria-hidden="true"></i>
			<strong>
				<?php
				echo "<a href='profile.php?id=" . $_SESSION['name'] . "'>" . $_SESSION['name']  . "</a>";
				echo "<br>";
				if ($_SESSION['role'] == 1) {
					if ($_SESSION['position'] == 1) {
						echo '(Program Proponent)';
					} else {
						echo '(Program Implementer)';
					}
				} else {

					echo '(Member)';
				}
				?>
			</strong>
		</div>
		<div class="page-heading">
			<h3>ADVOCACY</h3>
		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-9">
					<?php if ($_SESSION['role'] == 1) { ?>
						<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#advocacy" style="background-color: #cca934; border-color:#cca934"> Create an Advocacy </button></h4>
					<?php } ?><br>
					<div class="row">
						<?php while ($val = $advocacy->fetch_object()) { ?>
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4><?php echo $val->advocacy_title; ?> <small> <b> On-Going <?php echo $val->advocacy_status; ?>%</b> </small></h4>
										<h4><?php echo $val->advocacy_chapter; ?> Chapter</h4>
										<?php if ($_SESSION['role'] == 1) { ?>
											<a class="btn btn-sm btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->advocacy_id; ?>" style="float:right;"><i class="bi bi-trash"></i></a>
											<a class="btn btn-info btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#edit<?php echo $val->advocacy_id;; ?>" style="float:right;margin-right:10px;"> <i class="bi bi-pencil-square"></i> </button></a>
										<?php } ?>
									</div>
									<div class="card-body">
										<div class="container my-5">
											<ul class="qualitybar text-center">
												<?php
												if ($val->advocacy_status == 25) { ?>
													<li class="status_verified step1"><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->advocacy_id; ?>">RECIEVE RESOURCES</a></li>
													<li class="step2"><a href="#" data-bs-toggle="modal" data-bs-target="#step2">PROGRAM COMMITTEES</a></li>
													<li class="step3"><a href="#" data-bs-toggle="modal" data-bs-target="#step3">PROGRAM ACTIVITIES</a></li>
													<li class="step4"><a href="#" data-bs-toggle="modal" data-bs-target="#step4">REPORT</a></li>
												<?php } else if ($val->advocacy_status == 50) { ?>
													<li class="status_verified step1"><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->advocacy_id; ?>">RECIEVE RESOURCES</a></li>
													<li class="status_verified step2"><a href="#" data-bs-toggle="modal" data-bs-target="#step2<?php echo $val->advocacy_id; ?>">PROGRAM COMMITTEES</a></li>
													<li class="step3"><a href="#" data-bs-toggle="modal" data-bs-target="#step3">PROGRAM ACTIVITIES</a></li>
													<li class="step4"><a href="#" data-bs-toggle="modal" data-bs-target="#step4">REPORT</a></li>
												<?php } else if ($val->advocacy_status == 75) { ?>
													<li class="status_verified step1"><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->advocacy_id; ?>">RECIEVE RESOURCES</a></li>
													<li class="status_verified step2"><a href="#" data-bs-toggle="modal" data-bs-target="#step2<?php echo $val->advocacy_id; ?>">PROGRAM COMMITTEES</a></li>
													<li class="status_verified step3"><a href="#" data-bs-toggle="modal" data-bs-target="#step3<?php echo $val->advocacy_id; ?>">PROGRAM ACTIVITIES</a></li>
													<li class="step4"><a href="#" data-bs-toggle="modal" data-bs-target="#step4">REPORT</a></li>
												<?php } else if ($val->advocacy_status == 100) { ?>
													<li class="status_verified step1"><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->advocacy_id; ?>">RECIEVE RESOURCES</a></li>
													<li class="status_verified step2"><a href="#" data-bs-toggle="modal" data-bs-target="#step2<?php echo $val->advocacy_id; ?>">PROGRAM COMMITTEES</a></li>
													<li class="status_verified step3"><a href="#" data-bs-toggle="modal" data-bs-target="#step3<?php echo $val->advocacy_id; ?>">PROGRAM ACTIVITIES</a></li>
													<li class="status_verified step4"><a href="#" data-bs-toggle="modal" data-bs-target="#step4<?php echo $val->advocacy_id; ?>">REPORT</a></li>
												<?php } else { ?>
													<li class=" step1"><a href="#" data-bs-toggle="modal" data-bs-target="#step1">RECIEVE RESOURCES</a></li>
													<li class=" step2"><a href="#" data-bs-toggle="modal" data-bs-target="#step2">PROGRAM COMMITTEES</a></li>
													<li class=" step3"><a href="#" data-bs-toggle="modal" data-bs-target="#step3">PROGRAM ACTIVITIES</a></li>
													<li class=" step4"><a href="#" data-bs-toggle="modal" data-bs-target="#step4">REPORT</a></li>
												<?php } ?>

											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- EDIT -->
							<div class="modal fade text-left" id="edit<?php echo $val->advocacy_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header bg-info">
											<h5 class="modal-title white" id="myModalLabel130"><?php echo $val->advocacy_title; ?></h5>
										</div>
										<div class="modal-body">
											<form action="#" enctype="multipart/form-data" method="POST">
												<div class="modal-body">
													<input type="hidden" name="id" class="form-control" value="<?php echo $val->advocacy_id; ?>">
													<label>Title : </label>
													<div class="form-group">
														<input type="text" name="title" class="form-control" value="<?php echo $val->advocacy_title; ?>" required>
													</div>

													<label>Chapter : </label>
													<div class="form-group">
														<select name="chapter" id="sponsor" class="form-control" required>
															<option value="" selected> - Select Chapter - </option>
															<?php
															$q_e2 =  $mysqli->query("SELECT * from chapter");
															while ($val1 = $q_e2->fetch_object()) {

																if ($val->advocacy_chapter ==  $val1->chapter_name) {
															?>
																	<option value="<?php echo $val1->chapter_name; ?>" selected> <?php echo $val1->chapter_name; ?></option>
																<?php } else { ?>
																	<option value="<?php echo $val1->chapter_name; ?>"> <?php echo $val1->chapter_name; ?></option>
															<?php }
															} ?>
														</select>
													</div>

													<label>Description : </label>
													<div class="form-group">
														<input type="text" name="description" class="form-control" value="<?php echo $val->advocacy_sub_title; ?>" required>
													</div>

													<label>Date : </label>
													<div class="form-group">
														<input type="date" name="date" class="form-control" value="<?php echo $val->advocacy_schedule_date; ?>" required>
													</div>

												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-info ml-1" name="update-advocacy">
														<i class="bx bx-check d-block d-sm-none"></i>
														<span class="d-none d-sm-block">Update</span>
													</button>
													<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
														<i class="bx bx-x d-block d-sm-none"></i>
														<span class="d-none d-sm-block">Close</span>
													</button>
											</form>
										</div>
									</div>
								</div>
							</div>
					</div>
					<!-- DELETE -->
					<div class="modal fade text-left" id="delete<?php echo $val->advocacy_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
							<div class="modal-content">
								<div class="modal-header bg-warning">
									<h5 class="modal-title white" id="myModalLabel130">Delete Advocacy</h5>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<i data-feather="x"></i>
									</button>
								</div>
								<div class="modal-body">
									<form action="#" enctype="multipart/form-data" method="POST">
										<div class="modal-body">
											<div class="form-group">
												<input type="hidden" name="id" class="form-control" value="<?php echo $val->advocacy_id; ?>">
												<input type="hidden" name="advocacy_title" class="form-control" value="<?php echo $val->advocacy_title; ?>">
											</div>
											ARE YOU SURE TO DELETE THIS DATA ?
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-warning ml-1" name="delete-advocacy">
												<i class="bx bx-check d-block d-sm-none"></i>
												<span class="d-none d-sm-block">Delete</span>
											</button>
											<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
												<i class="bx bx-x d-block d-sm-none"></i>
												<span class="d-none d-sm-block">Close</span>
											</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- STEP 1 -->
				<div class="modal fade text-left" id="step1<?php echo $val->advocacy_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info">
								<h5 class="modal-title white" id="myModalLabel130"><?php echo $val->advocacy_title; ?> Received Resources</h5>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<i data-feather="x"></i>
								</button>
							</div>
							<div class="modal-body">
								<form action="#" enctype="multipart/form-data" method="POST">
									<div class="modal-body">
										<?php
										$advocacys = $val->advocacy_title;
										$received  = $mysqli->query("SELECT * from sponsor where sponsor_advocacy='$advocacys'");
										$row       = $received->fetch_assoc();
										?>
										<label>Receive Via: <br>
											<?php echo $row['recieve_via']; ?></label><br><br>

										<label>Date : <br>
											<?php echo $row['date_received']; ?></label><br><br>

										<label>Proof of Transaction :
											<br> <a href="assets/documents/<?php echo $row['sponsor_pot']; ?>" target="_blank"> View File </a></label><br><br>

										<label>Resources Received: <br><?php echo $row['sponsor_supplies']; ?></label><br><br>

										<label>Quantity: <br> <?php echo $row['sponsor_qty']; ?></label><br><br>

										<label>Advocate Involved: <?php echo $row['sponsor_added_by']; ?></label><br><br>


									</div>
									<div class="modal-footer">

										<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
											<i class="bx bx-x d-block d-sm-none"></i>
											<span class="d-none d-sm-block">Close</span>
										</button>
								</form>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- STEP 2 -->
		<div class="modal fade text-left" id="step2<?php echo $val->advocacy_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title white" id="myModalLabel130"><?php echo $val->advocacy_title; ?> Program Committee</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
					</div>
					<div class="modal-body">
						<form action="#" enctype="multipart/form-data" method="POST">
							<div class="modal-body">
								<?php
								$advocacy_id = $val->advocacy_id;
								$program     = $mysqli->query("SELECT * from committee where advocacy_id='$advocacy_id'");
								$row1         = $program->fetch_assoc();
								?>

								<p>Project Committee: <br> <?php echo $row1['comm_proj_comm']; ?></p>
								<p>Registration Committee: <br><?php echo $row1['comm_reg_comm']; ?></p>
								<p>Committee on Logistics:<br> <?php echo $row1['comm_comm_log']; ?></p>
								<p>Committee on Facilitators: <br><?php echo $row1['comm_comm_fac']; ?></p>
								<p>Committee for Documentation: <br><?php echo $row1['comm_comm_doc']; ?></p>
								<p>Food/Kitchen Committee:<br> <?php echo $row1['comm_kitc_comm']; ?></p>
								<p>Crowd Control Committee: <br><?php echo $row1['comm_cro_con']; ?></p>

							</div>
							<div class="modal-footer">

								<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
									<i class="bx bx-x d-block d-sm-none"></i>
									<span class="d-none d-sm-block">Close</span>
								</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- STEP 3 -->
	<div class="modal fade text-left" id="step3<?php echo $val->advocacy_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130"><?php echo $val->advocacy_title; ?> Advocacy Activity</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">


							<p>Project Committee: <br> <?php echo $val->activities; ?></p>


						</div>
						<div class="modal-footer">

							<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
								<i class="bx bx-x d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Close</span>
							</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- STEP 4 -->
	<div class="modal fade text-left" id="step4<?php echo $val->advocacy_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130"><?php echo $val->advocacy_title; ?> Committee Report</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<?php
							$advocacy_id = $val->advocacy_title;
							$program     = $mysqli->query("SELECT * from committee_report where advocacy='$advocacy_id' and rep_status='Approved'");
							while ($val = $program->fetch_object()) {
							?>
								<p> <strong> <?php echo $val->report; ?></strong></p>
								<p>Report By: <br> <?php echo $val->report_by; ?></p>
								<p>Report Date: <br> <?php echo $val->report_date; ?></p>
								<hr>
							<?php } ?>

						</div>
						<div class="modal-footer">

							<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
								<i class="bx bx-x d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Close</span>
							</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php } ?>
	</div>

	</div>

	</section>
	</div>
	<div class="modal fade text-left" id="advocacy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130">New Advocacy</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Title : </label>
							<div class="form-group">
								<input type="text" name="title" class="form-control" required>
							</div>
							<label>Chapter: </label>
							<div class="form-group">
								<select name="chapter" id="sponsor" class="form-control" required>
									<option value="" selected> - Select Chapter - </option>
									<?php
									$q_e2 =  $mysqli->query("SELECT * from chapter");
									while ($val1 = $q_e2->fetch_object()) {
									?>
										<option value="<?php echo $val1->chapter_name; ?>"> <?php echo $val1->chapter_name; ?></option>
									<?php } ?>
								</select>
							</div>
							<label>Description : </label>
							<div class="form-group">
								<textarea type="text" name="description" class="form-control" required></textarea>
							</div>
							<label>Date: </label>
							<div class="form-group">
								<input type="date" name="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-advocacy">
								<i class="bx bx-check d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Add New Advocacy</span>
							</button>

							<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
								<i class="bx bx-x d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Close</span>
							</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php

	include('includes/footer.php');

	?>