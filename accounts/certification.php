	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/certification.php');

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
			<h3>Certification </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<?php if ($_SESSION['role'] == 1) { ?>
										<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> Add Certification </button></h4>
									<?php } ?>
								</div>
								<div class="card-body">
									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th class="text-center">Advocacy</th>
												<th class="text-center">Chapter</th>
												<th class="text-center"> File</th>
												<th class="text-center">Date</th>
												<th class="text-center"> AddedBy</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $certificate->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->certificate_advo; ?></td>
													<td class="text-center"><?php echo $val->certificate_chapter; ?></td>
													<td class="text-center"><a href="certificate-file.php?certificate_id=<?php echo $val->certificate_id; ?>&cert=<?php echo $val->certificate_advo; ?>"><button class="btn btn-info btn-sm"> <i class="bi bi-card-image"></i> </button></a></td>
													<td class="text-center"><?php echo $val->certificate_date; ?></td>
													<td class="text-center"><?php echo $val->certificate_by; ?></td>
													<td class="text-center">
														<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->certificate_id; ?>"> <i class="bi bi-trash"></i> </button>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->certificate_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title white" id="myModalLabel130">Delete Certificate</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->certificate_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS DATA ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-certificate">
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
								<div class="modal fade text-left" id="edit<?php echo $val->certificate_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Update Certificate</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<label>Certificate : </label>
														<div class="form-group">
															<input type="file" name="image" class="form-control">
															<input type="hidden" name="letter" value="<?php echo $val->certificate_cert; ?>" class="form-control" required>
															<input type="hidden" name="id" value="<?php echo $val->certificate_id; ?>" class="form-control" required>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-certificate">
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
					<h5 class="modal-title white" id="myModalLabel130">Certification Details</h5>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">

							<input type="hidden" name="name" class="form-control" value="<?php echo $_SESSION["name"]; ?>" readonly required>

							<label>Advocacy : </label>
							<div class="form-group">
								<select name="advocacy" id="advocacy" class="form-control" required>
									<option value="" selected> - Select Advocacy - </option>
									<?php
									$q_e2 =  $mysqli->query("SELECT * from advocacy where advocacy_status='100'");
									while ($val1 = $q_e2->fetch_object()) {
									?>
										<option value="<?php echo $val1->advocacy_title; ?>"> <?php echo $val1->advocacy_title; ?></option>
									<?php
									}
									?>
								</select>
							</div>

							<label>Chapter: </label>
							<div class="form-group">
								<input type="text" name="chapter" class="form-control" id="chapter" readonly>
							</div>


							<input type="hidden" value="1" name="role" class="form-control" required>

							<label>Date : </label>
							<div class="form-group">
								<input type="date" name="date" class="form-control" required>
							</div>

							<label>Certificate : </label>
							<div class="form-group">
								<input type="file" name="image" class="form-control" required>
							</div>
							<label>Certificate : </label>
							<div class="form-group">
								<input type="file" name="image1" class="form-control" required>
							</div>
							<label>Certificate : </label>
							<div class="form-group">
								<input type="file" name="image2" class="form-control" required>
							</div>
							<label>Certificate : </label>
							<div class="form-group">
								<input type="file" name="image3" class="form-control" required>
							</div>
							<label>Certificate : </label>
							<div class="form-group">
								<input type="file" name="image4" class="form-control" required>
							</div>
							<label>Certificate : </label>
							<div class="form-group">
								<input type="file" name="image5" class="form-control" required>
							</div>
							<label>Certificate : </label>
							<div class="form-group">
								<input type="file" name="image6" class="form-control" required>
							</div>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-certificate">
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