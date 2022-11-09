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
			<h3>Resources</h3>
		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#invitation">Add New Donation</button></h4>
								</div>
								<div class="card-body">
									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th class="text-center">Advocacy</th>
												<th class="text-center">Chapter</th>
												<th class="text-center">Sponsor</th>
												<th class="text-center">Resources</th>
												<th class="text-center">Quantity</th>
												<th class="text-center">Updated</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $resource->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->sponsor_advocacy; ?></td>
													<td class="text-center"><?php echo $val->sponsor_chapter; ?></td>
													<td class="text-center"><?php echo $val->sponsor_name; ?></td>
													<td class="text-center"><?php echo $val->sponsor_supplies; ?></td>
													<td class="text-center"><?php echo $val->sponsor_qty; ?></td>
													<td class="text-center"><?php echo $val->sponsor_date; ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->sponsor_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
														<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->sponsor_id; ?>"> <i class="bi bi-trash"></i> </button>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->sponsor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title white" id="myModalLabel130">Delete Resources</h5>
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
																		<button type="submit" class="btn btn-warning ml-1" name="delete-resources">
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
								<div class="modal fade text-left" id="update<?php echo $val->sponsor_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Update Advocacy Resources</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<center>
													<h3><?php echo $val->sponsor_advocacy; ?></h3>
												</center>
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<label>Sponsor: </label>
														<div class="form-group">
															<select name="sponsor" id="sponsor" class="form-control" required>
																<option value="" selected> - Select Sponsor - </option>
																<?php
																$q_e2 =  $mysqli->query("SELECT * from partnership where is_partners=1");
																while ($val1 = $q_e2->fetch_object()) {
																	if ($val->sponsor_name ==  $val1->partnership_name) {
																?>
																		<option value="<?php echo $val1->partnership_name; ?>" selected> <?php echo $val1->partnership_name; ?></option>
																	<?php
																	} else {
																	?>
																		<option value="<?php echo $val1->partnership_name; ?>"> <?php echo $val1->partnership_name; ?></option>
																<?php }
																} ?>
															</select>
														</div>
														<label>Resources: </label>
														<div class="form-group">
															<input type="text" name="resources" class="form-control" value="<?php echo $val->sponsor_supplies; ?>" required>
															<input type="hidden" name="id" class="form-control" value="<?php echo $val->sponsor_id; ?>" required>
														</div>
														<label>Quantity: </label>
														<div class="form-group">
															<input type="text" name="qty" class="form-control" value="<?php echo $val->sponsor_qty; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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

	<div class="modal fade text-left" id="invitation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130">New Donations</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Advocacy: </label>
							<div class="form-group">
								<select name="advocacy" id="advocacy" class="form-control" required>
									<option value="" selected> - Select Advocacy - </option>
									<?php
									$q_e2 =  $mysqli->query("SELECT * from advocacy where advocacy_status NOT IN ('75','100')");
									while ($val = $q_e2->fetch_object()) {
									?>
										<option value="<?php echo $val->advocacy_title; ?>"> <?php echo $val->advocacy_title; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<label>Chapter: </label>
							<div class="form-group">
								<input type="text" name="chapter" class="form-control" id="chapter" readonly>
							</div>
							<label>Sponsor: </label>
							<div class="form-group">
								<select name="sponsor" id="sponsor" class="form-control" required>
									<option value="" selected> - Select Sponsor - </option>
									<?php
									$q_e2 =  $mysqli->query("SELECT * from partnership where is_partners=1");
									while ($val = $q_e2->fetch_object()) {
									?>
										<option value="<?php echo $val->partnership_name; ?>"> <?php echo $val->partnership_name; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<label>Resources: </label>
							<div class="form-group">
								<input type="text" name="resources" class="form-control" required>
							</div>
							<label>Quantity: </label>
							<div class="form-group">
								<input type="text" name="qty" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
							</div>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-resources">
								<i class="bx bx-check d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Add Resources</span>
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