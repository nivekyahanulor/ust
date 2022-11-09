	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/certificate-file.php');

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
			<h3><?php echo $_GET['cert']; ?> Certificates</h3>

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
												<th class="text-center">File Name</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $certificate_file->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->certificate_cert; ?></td>
													<td class="text-center"><a href="assets/documents/<?php echo $val->certificate_cert; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a></td>
												</tr>
												<tr>
													<td class="text-center"><?php echo $val->certificate_cert1; ?></td>
													<td class="text-center"><a href="assets/documents/<?php echo $val->certificate_cert1; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a></td>
												</tr>
												<tr>
													<td class="text-center"><?php echo $val->certificate_cert2; ?></td>
													<td class="text-center"><a href="assets/documents/<?php echo $val->certificate_cert2; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a></td>
												</tr>
												<tr>
													<td class="text-center"><?php echo $val->certificate_cert3; ?></td>
													<td class="text-center"><a href="assets/documents/<?php echo $val->certificate_cert3; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a></td>
												</tr>
												<tr>
													<td class="text-center"><?php echo $val->certificate_cert4; ?></td>
													<td class="text-center"><a href="assets/documents/<?php echo $val->certificate_cert4; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a></td>
												</tr>
												<tr>
													<td class="text-center"><?php echo $val->certificate_cert5; ?></td>
													<td class="text-center"><a href="assets/documents/<?php echo $val->certificate_cert5; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a></td>
												</tr>
												<tr>
													<td class="text-center"><?php echo $val->certificate_cert6; ?></td>
													<td class="text-center"><a href="assets/documents/<?php echo $val->certificate_cert6; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a></td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title white" id="myModalLabel130">Delete Photo</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->id; ?>">
																			<input type="hidden" name="aid" value="<?php echo $_GET['advocacy']; ?>" class="form-control" required>
																			<input type="hidden" name="title" value="<?php echo $_GET['title']; ?>" class="form-control" required>
																		</div>
																		ARE YOU SURE TO DELETE THIS PHOTO ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-photo">
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
					<h5 class="modal-title white" id="myModalLabel130">Photo</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">



							<label>Photo : </label>
							<div class="form-group">
								<input type="file" name="image" class="form-control" required>
								<input type="hidden" name="id" value="<?php echo $_GET['advocacy']; ?>" class="form-control" required>
								<input type="hidden" name="title" value="<?php echo $_GET['title']; ?>" class="form-control" required>
							</div>


						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-photo">
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