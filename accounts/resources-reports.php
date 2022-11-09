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
			<h3>Reports</h3>
		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-9">

					<div class="row">
						<?php while ($val = $resource->fetch_object()) { ?>
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4><?php echo $val->sponsor_advocacy; ?> </h4>
										<h4><?php echo $val->sponsor_name; ?> <small> <b> On-Going <?php echo $val->sponsor_status; ?>%</b> </small></h4>
										<h4><?php echo $val->sponsor_chapter; ?> Chapter</h4>
										<?php if ($_SESSION['role'] == 1) { ?>
											<a class="btn btn-sm btn-warning " data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->sponsor_id; ?>" style="float:right;"><i class="bi bi-trash"></i></a>
										<?php } ?>
									</div>
									<div class="card-body">
										<div class="container my-5 text-center">
											<ul class="qualitybar text-center">
												<?php
												if ($val->sponsor_status == 33) {
													$step1 = 'status_verified';
													$step2 = '';
													$step3 = '';
												} else if ($val->sponsor_status == 66) {
													$step1 = 'status_verified';
													$step2 = 'status_verified';
													$step3 = '';
												} else if ($val->sponsor_status == 67) {
													$step1 = 'status_verified';
													$step2 = 'status_verified';
													$step3 = 'status_pending';
												} else if ($val->sponsor_status == 100) {
													$step1 = 'status_verified';
													$step2 = 'status_verified';
													$step3 = 'status_verified';
												} else {
													$step1 = '';
													$step2 = '';
													$step3 = '';
												}

												?>
												<?php if ($_SESSION['role'] == 2) { ?>
													<?php if ($val->sponsor_status == 33) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#resourcestep2<?php echo $val->sponsor_id; ?>"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal">APPROVED</a></strong></li>
													<?php } else if ($val->sponsor_status == 66) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#resourcestep2<?php echo $val->sponsor_id; ?>"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal">APPROVED</a></strong></li>
													<?php } else if ($val->sponsor_status == 67) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#resourcestep2<?php echo $val->sponsor_id; ?>"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step3<?php echo $val->sponsor_id; ?>">APPROVED</a></strong></li>
													<?php } else if ($val->sponsor_status == 100) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#resourcestep2<?php echo $val->sponsor_id; ?>"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step3<?php echo $val->sponsor_id; ?>">APPROVED</a></strong></li>
													<?php } else { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal">APPROVED</a></strong></li>
													<?php } ?>
												<?php } else { ?>
													<?php if ($val->sponsor_status == 33) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal">APPROVED</a></strong></li>
													<?php } else if ($val->sponsor_status == 66) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#resourcestep2<?php echo $val->sponsor_id; ?>"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step3<?php echo $val->sponsor_id; ?>">APPROVED</a></strong></li>
													<?php } else if ($val->sponsor_status == 67) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#resourcestep2<?php echo $val->sponsor_id; ?>"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step3<?php echo $val->sponsor_id; ?>">APPROVED</a></strong></li>
													<?php } else if ($val->sponsor_status == 100) { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step1<?php echo $val->sponsor_id; ?>">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#resourcestep2<?php echo $val->sponsor_id; ?>"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal" data-bs-target="#step3<?php echo $val->sponsor_id; ?>">APPROVED</a></strong></li>
													<?php } else { ?>
														<li class="<?php echo $step1; ?> step1"><strong><a href="#">IDENTIFICATION</a></strong></li>
														<li class="<?php echo $step2; ?> step2"><strong><a href="#"> RECEIVED RESOURCES</a></strong></li>
														<li class="<?php echo $step3; ?> step3"><strong><a href="#" data-bs-toggle="modal">APPROVED</a></strong></li>
													<?php } ?>
												<?php } ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="modal fade text-left" id="delete<?php echo $val->sponsor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header bg-warning">
											<h5 class="modal-title white" id="myModalLabel130">Delete Data</h5>
											<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
												<i data-feather="x"></i>
											</button>
										</div>
										<div class="modal-body">
											<form action="#" enctype="multipart/form-data" method="POST">
												<div class="modal-body">
													<div class="form-group">
														<input type="hidden" name="id" class="form-control" value="<?php echo $val->sponsor_id; ?>">
													</div>
													ARE YOU SURE TO DELETE THIS DATA ?
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-warning ml-1" name="delete-reports">
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

					<div class="modal fade text-left" id="step3<?php echo $val->sponsor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
							<div class="modal-content">
								<div class="modal-header bg-info">
									<h5 class="modal-title white" id="myModalLabel130">Verdict For <?php echo $val->sponsor_name; ?> </h5>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<i data-feather="x"></i>
									</button>
								</div>
								<div class="modal-body">
									<form action="#" enctype="multipart/form-data" method="POST">
										<div class="modal-body">


											<input type="hidden" name="id" class="form-control" value="<?php echo $val->sponsor_id; ?>" required>
											<input type="hidden" name="sponsor_advocacy" class="form-control" value="<?php echo $val->sponsor_advocacy; ?>" required>


											<label>Verdict From: </label>
											<div class="form-group">
												<input type="text" name="personel3" class="form-control" value="<?php if ($val->status == 'Approved' || $val->status == 'Pending') {
																													echo $val->verdict_from;
																												} else {
																													echo $_SESSION['name'];
																												} ?>" readonly>
											</div>

											<label>Notes: </label>
											<div class="form-group">
												<textarea type="text" name="notes" class="form-control" required><?php echo $val->notes; ?></textarea>
											</div>

											<label>Status: </label>
											<div class="form-group">
												<select type="text" name="status" class="form-control" required>

													<option value=""> - SELECT STATUS - </option>
													<?php if ($val->status == 'Pending') { ?>
														<option selected> Pending </option>
														<option> Disapprove</option>
														<option> Approved</option>
													<?php } else if ($val->status == 'Disapprove') { ?>
														<option> Pending </option>
														<option selected> Disapprove</option>
														<option> Approved</option>
													<?php } else if ($val->status == 'Approved') { ?>
														<option> Pending </option>
														<option> Disapprove</option>
														<option selected> Approved</option>
													<?php } else { ?>
														<option> Pending </option>
														<option> Disapprove</option>
														<option> Approved</option>
													<?php } ?>
												</select>
											</div>

										</div>

										<div class="modal-footer">
											<?php if ($_SESSION['role'] != 2) { ?>
												<button type="submit" class="btn btn-info ml-1" name="update-step3">
													<i class="bx bx-check d-block d-sm-none"></i>
													<span class="d-none d-sm-block">Update </span>
												</button>
											<?php } ?>
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

				<div class="modal fade text-left" id="resourcestep2<?php echo $val->sponsor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header bg-info">
								<h5 class="modal-title white" id="myModalLabel130"><?php echo $val->sponsor_name; ?> Received Resources</h5>
							</div>
							<div class="modal-body">
								<form action="#" enctype="multipart/form-data" method="POST">
									<div class="modal-body">

										<label>Resources Received: </label>
										<div class="form-group">
											<input type="text" name="resources" class="form-control" value="<?php echo $val->sponsor_supplies; ?>" required>
										</div>
										<label>Receive Via: </label>
										<div class="form-group">
											<input type="text" name="recieve_via" class="form-control" value="<?php echo $val->recieve_via; ?>" required>
											<input type="hidden" name="id" class="form-control" value="<?php echo $val->sponsor_id; ?>" required>
										</div>

										<label>Date : </label>
										<div class="form-group">
											<input type="date" name="date_received" class="form-control" value="<?php echo $val->date_received; ?>" required>
										</div>

										<label>Proof of Transaction: <?php if ($val->sponsor_pot != '') { ?> (<a href="assets/documents/<?php echo $val->sponsor_pot; ?>" target="_blank"> View File </a> ) <?php } ?></label>
										<div class="form-group">
											<?php if ($val->sponsor_pot != '') { ?>
												<input type="file" name="image" class="form-control">
											<?php } else { ?>
												<input type="file" name="image" class="form-control" required>
											<?php } ?>
											<input type="hidden" name="pot" class="form-control" value="<?php echo $val->sponsor_pot; ?>">
										</div>

										<label>Resources Received: </label>
										<div class="form-group">
											<input type="text" name="resources" class="form-control" value="<?php echo $val->sponsor_supplies; ?>" required>
										</div>

										<label>Quantity: </label>
										<div class="form-group">
											<input type="text" name="qty" class="form-control" value="<?php echo $val->sponsor_qty; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
										</div>

										<label>Advocate Involved: </label>
										<div class="form-group">
											<input type="text" name="personel2" class="form-control" value="<?php echo $val->sponsor_added_by; ?>" readonly>
										</div>
										<div id="resourcestep2" style="display:none">
											<table style="color:#6c757d; text-align: left">
												<tr>
													<th>Advocacy: </th>
													<td><?php echo $val->sponsor_advocacy; ?> - <?php echo $val->sponsor_chapter; ?> Chapter</td>
												</tr>
												<tr>
													<th>Sponsor: </th>
													<td><?php echo $val->sponsor_name; ?></td>
												</tr>
												<tr>
													<th>Status: </th>
													<td><?php if ($val->status == '') {
															echo "For checking";
														} else {
															echo $val->status;
														} ?></td>
												</tr>
												<tr>
													<th>Received via: </th>
													<td><?php echo $val->recieve_via; ?></td>
												</tr>
												<tr>
													<th>Date: </th>
													<td><?php echo $val->date_received; ?></td>
												</tr>
												<tr>
													<th>Resources received: </th>
													<td> <?php echo $val->sponsor_supplies; ?></td>
												</tr>
												<tr>
													<th>Quantity: </th>
													<td> <?php echo $val->sponsor_qty; ?></td>
												</tr>
												<tr>
													<th>Advocate Involved: </th>
													<td> <?php echo $val->sponsor_added_by; ?></td>
												</tr>
												<tr>

													<?php if ($val->status == '') {
														echo "";
													} else { ?>
														<th>Verdict from: </th>
														<td><?php echo $val->verdict_from; ?></td>
													<?php } ?>
												</tr>
											</table>
										</div>
									</div>
									<div class="modal-footer">
										<?php if ($_SESSION['role'] == 2) { ?>
											<button type="submit" class="btn btn-info ml-1" name="update-step2">
												<i class="bx bx-check d-block d-sm-none"></i>
												<span class="d-none d-sm-block">Update Receive Resouces</span>
											</button>
										<?php } else { ?>
											<button type="button" class="btn btn-light-secondary" value="click" style="background-color:#6c757d;" onclick="printDiv()">
												<i class="bx bx-x d-block d-sm-none"></i>
												<span class="d-none d-sm-block" style="color:white">Print</span>
											</button>
										<?php } ?>
										<button type="button" class="btn btn-light-secondary" target="_blank" data-bs-dismiss="modal">
											<i class="bx bx-x d-block d-sm-none"></i>
											<span class="d-none d-sm-block">Close</span>
										</button>
								</form>
							</div>
						</div>
					</div>
				</div>
		</div>
		<div class="modal fade text-left" id="step1<?php echo $val->sponsor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header bg-info">
						<h5 class="modal-title white" id="myModalLabel130">Identification for <?php echo $val->sponsor_name; ?></h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<i data-feather="x"></i>
						</button>
					</div>
					<div class="modal-body">
						<form action="#" enctype="multipart/form-data" method="POST">
							<div class="modal-body">

								<label>Resources: </label>
								<div class="form-group">
									<input type="text" name="resources" class="form-control" value="<?php echo $val->sponsor_supplies; ?>" required>
									<input type="hidden" name="id" class="form-control" value="<?php echo $val->sponsor_id; ?>" required>
								</div>

								<label>Quantity: </label>
								<div class="form-group">
									<input type="text" name="qty" class="form-control" value="<?php echo $val->sponsor_qty; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
								</div>

								<label>Mode of Transmission: </label>
								<div class="form-group">
									<input type="text" name="mot" class="form-control" value="<?php echo $val->mot; ?>" required>
								</div>

								<label>Proof of Transaction: <?php if ($val->sponsor_pot != '') { ?> (<a href="assets/documents/<?php echo $val->sponsor_pot; ?>" target="_blank"> View File </a> ) <?php } ?></label>
								<div class="form-group">
									<?php if ($val->sponsor_pot != '') { ?>
										<input type="file" name="image" class="form-control">
									<?php } else { ?>
										<input type="file" name="image" class="form-control" required>
									<?php } ?>
									<input type="hidden" name="pot" class="form-control" value="<?php echo $val->sponsor_pot; ?>">
								</div>

								<label>Date of Transaction: </label>
								<div class="form-group">
									<input type="date" name="dot" class="form-control" value="<?php echo $val->transaction_date; ?>" required>
								</div>

								<label>Advocate Involved: </label>
								<div class="form-group">
									<input type="text" name="personel" class="form-control" value="<?php
																									echo $val->sponsor_added_by;
																									?>" readonly>
								</div>

							</div>
							<div class="modal-footer">
								<?php if ($_SESSION['role'] == 2) { ?>
									<button type="submit" class="btn btn-info ml-1" name="update-step1">
										<i class="bx bx-check d-block d-sm-none"></i>
										<span class="d-none d-sm-block">Update</span>
									</button>
								<?php } ?>
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

	<?php

	include('includes/footer.php');

	?>