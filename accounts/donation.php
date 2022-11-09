	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/donation.php');

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
						echo '(Admin)';
					} else if ($_SESSION['position'] == 2) {
						echo '(Super Admin)';
					} else if ($_SESSION['position'] == 3) {
						echo '(Help Desk)';
					}
				} else {

					echo '(Member)';
				}
				?>
			</strong>

		</div>
		<div class="page-heading">
			<h3>DONATION </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4><button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#addnew"> ADD DETAILS </button></h4>
								</div>
								<div class="card-body">
										<table class="table table-striped" id="table1">
											<thead>
												<tr>
													<th class="text-center">Image</th>
													<th class="text-center">Name</th>
													<th class="text-center">Link</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php while ($val = $announcement->fetch_object()) { ?>
												<tr>
													<td class="text-center"><img src="<?php echo 'assets/donation/' . $val->image; ?>" width="150px;"></td>
													<td class="text-center"><?php echo $val->title; ?></td>
													<td class="text-center"><?php echo $val->link_url; ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->announcement_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
														<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->announcement_id; ?>"> <i class="bi bi-trash"></i> </button>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->announcement_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
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
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->donation_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS DATA ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-donation">
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
								<div class="modal fade text-left" id="update<?php echo $val->announcement_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Update Data</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<label>Name: </label>
													<div class="form-group">
														<input type="text" name="title" class="form-control" value="<?php echo $val->title;?>" required>
													</div>

													<label>Link: </label>
													<div class="form-group">
														<input type="text" name="content" class="form-control" value="<?php echo $val->link_url;?>" required>

													</div>
													
													<label>Logo: </label>
													<div class="form-group">
														<input type="file" name="image" class="form-control" >
														<input type="hidden" name="image1" class="form-control" value="<?php echo $val->image;?>" >
														<input type="hidden" name="id" class="form-control" value="<?php echo $val->donation_id;?>" >
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-donation">
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


	<div class="modal fade text-left" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-info">
					<h5 class="modal-title white" id="myModalLabel130">New Details</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
						
							<label>Name : </label>
							<div class="form-group">
								<input type="text" name="title" class="form-control" required>
							</div>

							<label>Link: </label>
							<div class="form-group">
								<textarea type="text" name="content" class="form-control" required></textarea>
							</div>
							
							<label>Logo: </label>
							<div class="form-group">
								<input type="file" name="image" class="form-control" required>
							</div>

						</div>
						<div class="modal-footer">

							<button type="submit" class="btn btn-info ml-1" name="add-donation">
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