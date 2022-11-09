	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/resouces.php');

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
						echo '(Program Proponent)';
					} else {
						echo '(Program Implementer)';
					}
				} else {

					echo '(Member)';
				}
				?>
			</strong>
			</li>
		</div>
		<div class="page-heading">
			<h3>Committee Report </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<?php if ($_SESSION['role'] == 2 && $_SESSION['program_committee'] == 1) { ?>
										<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> Add Report </button></h4>
									<?php } ?>
								</div>
								<div class="card-body">
									<?php if ($_SESSION['role'] == 1) { ?>
										<table class="table table-striped" id="table-committee-report">
										<?php } else { ?>
											<table class="table table-striped" id="table1">
											<?php } ?>
											<thead>
												<tr>
													<th class="text-center">Advocacy</th>
													<th class="text-center"> Name</th>
													<th class="text-center">Chapter</th>
													<th class="text-center"> Date</th>
													<th class="text-center">Report</th>
													<th class="text-center">Status</th>
													<?php if ($_SESSION['role'] == 1 || $_SESSION['role'] != 1 && $_SESSION['program_committee'] == 1) { ?>
														<th class="text-center"> Action
														</th>
													<?php } ?>
												</tr>
											</thead>
											<tbody>
												<?php if ($_SESSION['role'] == 1) {
													while ($val = $comm->fetch_object()) { ?>
														<tr>
															<td class="text-center"><?php echo $val->advocacy; ?></td>
															<td class="text-center"><?php echo $val->report_by; ?></td>
															<td class="text-center"><?php echo $val->chapter; ?></td>
															<td class="text-center"><?php echo $val->report_date; ?></td>
															<td class="text-center"><?php echo $val->report; ?></td>
															<th class="text-center"><?php echo $val->rep_status; ?></th>
															<td class="text-center">
																<?php if ($_SESSION['role'] == 1 && $val->rep_status != 'Approved') { ?>
																	<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-verif<?php echo $val->report_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
																	<?php if ($val->rep_status == 'Disapproved') { ?>
																		<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->report_id; ?>"> <i class="bi bi-trash"></i> </button>
																	<?php } ?>
																<?php } elseif ($_SESSION['role'] == 1 && $val->rep_status == 'Approved') { ?>
																	<a href="certification.php"><button class="btn btn-secondary btn-sm"> <i class="bi bi-file-earmark-text"></i> </button></a>
																<?php } ?>
															</td>
															<div class="modal fade text-left" id="edit-verif<?php echo $val->report_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																	<div class="modal-content">
																		<div class="modal-header bg-info">
																			<h5 class="modal-title white" id="myModalLabel130">Edit Committee Report</h5>
																			<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																				<i data-feather="x"></i>
																			</button>
																		</div>
																		<div class="modal-body">
																			<form action="#" enctype="multipart/form-data" method="POST">
																				<div class="modal-body">
																					<input type="hidden" name="new_new_name" class="form-control" value="<?php echo $_SESSION["name"]; ?>">
																					<label>Report : </label>
																					<div class="form-group">
																						<textarea type="text" name="new_report" class="form-control" required><?php echo $val->report; ?></textarea>
																					</div>

																					<label>Date : </label>
																					<div class="form-group">
																						<input type="date" name="new_date" class="form-control" value="<?php echo $val->report_date; ?>" required>
																						<input type="hidden" name="new_id" class="form-control" value="<?php echo $val->report_id; ?>" required>
																						<input type="hidden" name="ad" class="form-control" value="<?php echo $val->advocacy; ?>" required>
																					</div>

																					<label>Note : </label>
																					<div class="form-group">
																						<textarea type="text" name="note" class="form-control" required><?php echo $val->rep_note; ?></textarea>
																					</div>
																					<?php if ($_SESSION['role'] == 1) { ?>
																						<label>Status : </label>
																						<div class="form-group">
																							<select name="status" id="advocacy" class="form-control" required>
																								<option value=""> - Select Status - </option>
																								<?php if ($val->resource_status == 'Approved') { ?>
																									<option value="Approved" selected> Approved</option>
																									<option value="Disapproved"> Disapproved</option>
																									<option value="Pending"> Pending</option>
																								<?php } else if ($val->resource_status == 'Disapproved') { ?>
																									<option value="Approved"> Approved</option>
																									<option value="Disapproved" selected> Disapproved</option>
																									<option value="Pending"> Pending</option>
																								<?php } else if ($val->resource_status == 'For Checking') { ?>
																									<option value="Approved"> Approved</option>
																									<option value="Disapproved"> Disapproved</option>
																									<option value="Pending" selected> Pending</option>
																								<?php } else { ?>
																									<option value="Approved"> Approved</option>
																									<option value="Disapproved"> Disapproved</option>
																									<option value="Pending"> Pending</option>
																								<?php } ?>
																							</select>
																						</div>
																						<label>Verdict From: </label>
																						<div class="form-group">
																							<input type="text" name="name" class="form-control" value="<?php echo $_SESSION['name']; ?>" readonly required>
																						</div>
																					<?php } else { ?>
																						<input type="hidden" name="status" value="<?php echo $val->rep_status; ?>" class="form-control" required>
																					<?php } ?>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info ml-1" name="verif-committee-report">
																						<i class="bx bx-check d-block d-sm-none"></i>
																						<span class="d-none d-sm-block">Submit </span>
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
														</tr>
														<div class="modal fade text-left" id="delete<?php echo $val->report_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																<div class="modal-content">
																	<div class="modal-header bg-warning">
																		<h5 class="modal-title white" id="myModalLabel130">Delete Committee Report</h5>
																		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																			<i data-feather="x"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<form action="#" enctype="multipart/form-data" method="POST">
																			<div class="modal-body">
																				<div class="form-group">
																					<input type="hidden" name="id" class="form-control" value="<?php echo $val->report_id; ?>">
																					<input type="hidden" name="advo_name" class="form-control" value="<?php echo $val->advocacy; ?>">
																				</div>
																				ARE YOU SURE TO DELETE THIS DATA ?
																			</div>
																			<div class="modal-footer">
																				<button type="submit" class="btn btn-warning ml-1" name="delete-committee-report">
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
													<?php }
												} else {
													while ($val = $creport->fetch_object()) { ?>
														<tr>
															<td class="text-center"><?php echo $val->advocacy; ?></td>
															<td class="text-center"><?php echo $val->report_by; ?></td>
															<td class="text-center"><?php echo $val->chapter; ?></td>
															<td class="text-center"><?php echo $val->report_date; ?></td>
															<td class="text-center"><?php echo $val->report; ?></td>
															<th class="text-center"><?php echo $val->rep_status; ?></th>
															<td class="text-center">
																<?php if ($_SESSION['role'] == 2 && $_SESSION['program_committee'] == 1 && $val->rep_status != 'Approved') { ?>
																	<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $val->report_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
																	<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->report_id; ?>"> <i class="bi bi-trash"></i> </button>
																<?php } elseif ($_SESSION['role'] == 2 && $_SESSION['program_committee'] == 1 && $val->rep_status == 'Approved') { ?>
																	<a href="certification.php"><button class="btn btn-secondary btn-sm"> <i class="bi bi-file-earmark-text"></i> </button></a>
																<?php } ?>
															</td>
														</tr>
														<div class="modal fade text-left" id="delete<?php echo $val->report_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																<div class="modal-content">
																	<div class="modal-header bg-warning">
																		<h5 class="modal-title white" id="myModalLabel130">Delete Committee Report</h5>
																		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																			<i data-feather="x"></i>
																		</button>
																	</div>
																	<div class="modal-body">
																		<form action="#" enctype="multipart/form-data" method="POST">
																			<div class="modal-body">
																				<div class="form-group">
																					<input type="hidden" name="id" class="form-control" value="<?php echo $val->report_id; ?>">
																					<input type="hidden" name="advo_name" class="form-control" value="<?php echo $val->advocacy; ?>">
																				</div>
																				ARE YOU SURE TO DELETE THIS DATA ?
																			</div>
																			<div class="modal-footer">
																				<button type="submit" class="btn btn-warning ml-1" name="delete-committee-report">
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
								<div class="modal fade text-left" id="edit<?php echo $val->report_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Edit Committee Report</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<input type="hidden" name="new_name" class="form-control" value="<?php echo $_SESSION["name"]; ?>">
														<label>Report : </label>
														<div class="form-group">
															<textarea type="text" name="report" class="form-control" required><?php echo $val->report; ?></textarea>
														</div>

														<label>Date : </label>
														<div class="form-group">
															<input type="date" name="date" class="form-control" value="<?php echo $val->report_date; ?>" required>
															<input type="hidden" name="id" class="form-control" value="<?php echo $val->report_id; ?>" required>
														</div>
														<?php if ($val->rep_status == "Pending" || $val->rep_status == "Approved" || $val->rep_status == "Disapproved") { ?>
															<label>Note: </label>
															<div class="form-group">
																<textarea type="text" name="" class="form-control" required><?php echo $val->rep_note; ?></textarea>
															</div>
															<label>Status: </label>
															<div class="form-group">
																<input type="text" name="name" class="form-control" value="<?php echo $val->rep_status ?>" readonly required>
															</div>
															<label>Verdict From: </label>
															<div class="form-group">
																<input type="text" name="name" class="form-control" value="<?php echo $val->report_verified_by ?>" readonly required>
															</div>
														<?php } ?>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-committee-report">
															<i class="bx bx-check d-block d-sm-none"></i>
															<span class="d-none d-sm-block">Submit </span>
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
					<?php }
												} ?>
					</tbody>
					</table>
						</div>
					</div>
				</div>
		</div>

	</div>

	</section>
	</div>

	</div>

	<div class="modal fade text-left" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130">Report Details</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Name: </label>
							<div class="form-group">
								<input type="text" name="name" class="form-control" value="<?php echo $_SESSION["name"]; ?>" readonly required>
							</div>
							<label>Chapter: </label>
							<div class="form-group">
								<input type="text" name="chapter" class="form-control" value="<?php echo $_SESSION["chapter"]; ?>" readonly required>
							</div>
							<label>Advocacy : </label>
							<div class="form-group">
								<select name="advocacy" id="advocacy" class="form-control" required>
									<option value="" selected> - Select Advocacy - </option>
									<?php
									$q_e2 =  $mysqli->query("SELECT * from advocacy where advocacy_status='75'");
									while ($val = $q_e2->fetch_object()) {
									?>
										<option value="<?php echo $val->advocacy_title; ?>"> <?php echo $val->advocacy_title; ?></option>
									<?php
									}
									?>
								</select>
							</div>

							<label>Report : </label>
							<div class="form-group">
								<textarea type="text" name="report" class="form-control" required></textarea>
							</div>

							<label>Date : </label>
							<div class="form-group">
								<input type="date" name="date" class="form-control" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-committee-report">
								<i class="bx bx-check d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Submit </span>
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