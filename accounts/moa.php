	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/partnership.php');

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
			<h3>MOA </h3>
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
												<th class="text-center">File </th>
												<th class="text-center">Date Given</th>
												<th class="text-center">Added By</th>
												<th class="text-center">Updated </th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $moa->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->partnership_name; ?></td>
													<td class="text-center">
														<?php if ($val->moa_file != '') { ?>
															<a href="assets/documents/<?php echo $val->moa_file; ?>" target="_blank"><button class="btn btn-info btn-sm"><i class="bi bi-file-earmark-text"></i> View </button></a>
														<?php } else {
															echo 'Pending';
														} ?>
													</td>
													<td class="text-center"><?php echo $val->moa_date_given; ?></td>
													<td class="text-center"><?php echo $val->moa_added_by; ?></td>
													<td class="text-center"><?php echo $val->date_updated; ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->partnership_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
														<?php if ($val->moa_file == '') { ?>
															<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->partnership_id; ?>"> <i class="bi bi-trash"></i> </button>
														<?php } ?>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->partnership_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title white" id="myModalLabel130">Delete MOA</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->partnership_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS DATA ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-moa">
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
								<div class="modal fade text-left" id="update<?php echo $val->partnership_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Add MOA</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<center>
															<h3><?php echo $val->partnership_name; ?></h3>
														</center>
														<input type="hidden" name="id" class="form-control" value="<?php echo $val->partnership_id; ?>">
														<label>MOA: <?php if ($val->moa_file != '') { ?><a href="assets/documents/<?php echo $val->moa_file; ?>" target="_blank"> (View MOA)</a> <?php } ?></label>
														<div class="form-group">
															<input type="file" name="image" class="form-control">
															<input type="hidden" name="letter" value="<?php echo $val->moa_file; ?>" class="form-control">
														</div>
														<label>Date Given: </label>
														<div class="form-group">
															<input type="date" name="dategiven" class="form-control" value="<?php echo $val->moa_date_given; ?>">
														</div>

													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-moa">
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
					<h5 class="modal-title white" id="myModalLabel130">New Invitation</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Invited Name: </label>
							<div class="form-group">
								<input type="text" name="invited" class="form-control">
							</div>
							<label>Letter: </label>
							<div class="form-group">
								<input type="file" name="image" placeholder="Password" class="form-control">
							</div>
							<label>Date: </label>
							<div class="form-group">
								<input type="date" name="dateinvite" class="form-control">
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-invitation">
								<i class="bx bx-check d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Add Invitation</span>
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