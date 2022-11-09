	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/organization.php');

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
			<h3>The Organization</h3>

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
												<th class="text-center">Image</th>
												<th class="text-center">About</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $theorganization->fetch_object()) { ?>
												<tr>
													<td class="text-center"><img src="assets/about/<?php echo $val->image; ?>" width="300px"></td>
													<td class="text-center"><?php echo $val->about; ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?php echo $val->id; ?>"> <i class="bi bi-pencil-square"></i> </button>

													</td>
												</tr>

												<div class="modal fade text-left" id="edit<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
														<div class="modal-content ">
															<div class="modal-header bg-info">
																<h5 class="modal-title white" id="myModalLabel130">Update Organization</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">



																		<label>Photo : </label>
																		<div class="form-group">
																			<input type="file" name="image" class="form-control">
																			<input type="hidden" name="letter" value="<?php echo $val->image; ?>" class="form-control" required>
																			<input type="hidden" name="id" value="<?php echo $val->id; ?>" class="form-control" required>
																		</div>

																		<label>About : </label>
																		<div class="form-group">
																			<textarea name="description" id="summernote" class="form-control" required><?php echo $val->about; ?></textarea>
																		</div>

																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-info ml-1" name="update-organization">
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

	<?php

	include('includes/footer.php');

	?>