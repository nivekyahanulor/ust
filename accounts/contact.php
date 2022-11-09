	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/contact.php');

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
			<h3>CONTACT</h3>

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
												<th class="text-center">Location</th>
												<th class="text-center">Email</th>
												<th class="text-center">Contact</th>
												<th class="text-center">Messenger</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $contacts->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->location; ?></td>
													<td class="text-center"><?php echo $val->email; ?></td>
													<td class="text-center"><?php echo $val->contact; ?></td>
													<td class="text-center"><?php echo $val->Messenger; ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->id; ?>"> <i class="bi bi-pencil-square"></i> </button>
													</td>
												</tr>
												<div class="modal fade text-left" id="update<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-info">
																<h5 class="modal-title white" id="myModalLabel130">Update Invitation</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">

																		<label>Location : </label>
																		<div class="form-group">
																			<textarea name="location" class="form-control" required><?php echo $val->location; ?></textarea>
																		</div>

																		<label>Email : </label>
																		<div class="form-group">
																			<textarea name="email" class="form-control" required><?php echo $val->email; ?></textarea>
																		</div>

																		<label>Contact Number : </label>
																		<div class="form-group">
																			<textarea name="contact" class="form-control" required><?php echo $val->contact; ?></textarea>
																		</div>

																		<label>Messenger : </label>
																		<div class="form-group">
																			<textarea name="messenger" class="form-control" required><?php echo $val->Messenger; ?></textarea>
																		</div>

																		<label>Map : </label>
																		<div class="form-group">
																			<textarea name="map" class="form-control" required><?php echo $val->map; ?></textarea>
																		</div>

																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-info ml-1" name="update-contact">
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

	<?php

	include('includes/footer.php');

	?>