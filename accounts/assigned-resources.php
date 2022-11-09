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

					echo '(Advocate)';
				}
				?>
			</strong>
			</li>
		</div>
		<div class="page-heading">
			<h3>Assigned Resources </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<?php if ($_SESSION['position'] == 1) { ?>
										<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> Add New Report </button></h4>
									<?php } ?>
								</div>
								<div class="card-body">
									<table class="table table-striped" id="table-assigned-resources">
										<thead>
											<tr>
												<th class="text-center">Advocacy</th>
												<th class="text-center"> Resources</th>
												<th class="text-center">Quantity</th>
												<th class="text-center"> Partner</th>
												<th class="text-center">Program Proponent</th>
												<th class="text-center">Status</th>
												<th class="text-center">Updated</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $resource1->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->resource_advo; ?></td>
													<td class="text-center"><?php echo $val->resource_needed; ?></td>
													<td class="text-center"><?php echo $val->resource_qty; ?></td>
													<td class="text-center"><?php echo $val->resource_partners; ?></td>
													<td class="text-center"><?php echo $val->resource_user; ?></td>
													<td class="text-center"><?php echo $val->resource_status; ?></td>
													<td class="text-center"><?php echo $val->resource_date; ?></td>
													<td class="text-center">
														<?php if ($_SESSION['position'] == 1 && $val->resource_status == 'For Checking') { ?>
															<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $val->resource_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
															<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->resource_id ?>"> <i class="bi bi-trash"></i> </button>
														<?php } elseif ($_SESSION['position'] == 1 && $val->resource_status == 'Pending') { ?>
															<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $val->resource_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
															<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->resource_id ?>"> <i class="bi bi-trash"></i> </button>
														<?php } elseif ($_SESSION['position'] == 1 && $val->resource_status == 'Disapproved') { ?>
															<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $val->resource_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
															<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->resource_id ?>"> <i class="bi bi-trash"></i> </button>
														<?php } elseif ($_SESSION['position'] == 1 || $_SESSION['position'] == 2 && $val->resource_status == 'Approved') {
															echo "";
														} elseif ($_SESSION['position'] == 2 && $val->resource_status == 'For Checking' || $val->resource_status == 'Pending' || $val->resource_status == 'Disapproved') { ?>
															<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $val->resource_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
														<?php } ?>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->resource_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title white" id="myModalLabel130">Delete Invitation</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->resource_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS DATA ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-info ml-1" name="delete-assigned-resources">
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
								<div class="modal fade text-left" id="edit<?php echo $val->resource_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Edit Assign Resources</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<label>Advocacy : </label>
														<div class="form-group">
															<select name="advocacy" id="advocacy" class="form-control" required>
																<?php
																$q_e2 =  $mysqli->query("SELECT * from advocacy");
																while ($val1 = $q_e2->fetch_object()) {
																	if ($val->resource_advo == $val1->advocacy_title) {
																?>
																		<option value="<?php echo $val1->advocacy_title; ?>" selected> <?php echo $val1->advocacy_title; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->advocacy_title; ?>"> <?php echo $val1->advocacy_title; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>
														<label>Resources Needed : </label>
														<div class="form-group">
															<input type="text" name="resouces" class="form-control" value="<?php echo $val->resource_needed; ?>" required>
															<input type="hidden" name="id" class="form-control" value="<?php echo $val->resource_id; ?>" required>
														</div>
														<label>Quantity : </label>
														<div class="form-group">
															<input type="text" name="qty" class="form-control" value="<?php echo $val->resource_qty; ?>" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
														</div>
														<label>Possible Partner : </label>
														<div class="form-group">
															<input type="text" name="partner" value="<?php echo $val->resource_partners; ?>" class="form-control" required>
														</div>
														<label>Brief Description : </label>
														<div class="form-group">
															<textarea type="text" name="description" class="form-control" required><?php echo $val->resource_desc; ?></textarea>
														</div>
														<?php if ($_SESSION['position'] == 2) { ?>
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
																	<?php } else if ($val->resource_status == 'Pending') { ?>
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
															<label>Note : </label>
															<div class="form-group">
																<textarea type="text" name="note" class="form-control"><?php echo $val->resource_note; ?></textarea>
															</div>
															<?php if ($val->resource_status == 'For Checking') {
																echo "";
															} else { ?>
																<label>Verdict from : </label>
																<div class="form-group">
																	<input type="text" value="<?php echo $val->resource_verified_by; ?>" class="form-control" required readonly>
																</div>
															<?php } ?>
														<?php } else { ?>
															<label>Status : </label>
															<div class="form-group">
																<input type="text" name="status" value="<?php echo $val->resource_status; ?>" class="form-control" required readonly>
															</div>
															<?php if ($val->resource_status == 'For Checking') {
																echo "";
															} else { ?>
																<label>Note : </label>
																<div class="form-group">
																	<textarea type="text" name="" class="form-control"><?php echo $val->resource_note; ?></textarea>
																</div>
																<label>Verdict from : </label>
																<div class="form-group">
																	<input type="text" name="" value="<?php echo $val->resource_verified_by; ?>" class="form-control" required readonly>
																</div>
															<?php } ?>
														<?php } ?>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-assigned-resources">
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

	<div class="modal fade text-left" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130">Assign New Resources</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Advocacy : </label>
							<div class="form-group">
								<select name="advocacy" id="advocacy" class="form-control" required>
									<option value="" selected> - Select Advocacy - </option>
									<?php
									$q_e2 =  $mysqli->query("SELECT * from advocacy  where advocacy_status =0");
									while ($val = $q_e2->fetch_object()) {
									?>
										<option value="<?php echo $val->advocacy_title; ?>"> <?php echo $val->advocacy_title; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<label>Resources Needed : </label>
							<div class="form-group">
								<input type="text" name="resouces" class="form-control" required>
							</div>
							<label>Quantity : </label>
							<div class="form-group">
								<input type="text" name="qty" class="form-control" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
							</div>
							<label>Possible Partner : </label>
							<div class="form-group">
								<input type="text" name="partner" class="form-control" required>
							</div>
							<label>Brief Description : </label>
							<div class="form-group">
								<textarea type="text" name="description" class="form-control" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-assigned-resources">
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