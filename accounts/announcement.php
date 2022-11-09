	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/announcement.php');

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
			<h3>ANNOUNCEMENT </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4><button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#addnew"> ADD ANNOUNCEMENT </button></h4>
								</div>
								<div class="card-body">
										<table class="table table-striped" id="table1">
											<thead>
												<tr>
													<th class="text-center">Image</th>
													<th class="text-center">Title</th>
													<th class="text-center">Content</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php while ($val = $announcement->fetch_object()) { ?>
												<tr>
													<td class="text-center"><img src="<?php echo 'assets/announcement/' . $val->image; ?>" width="150px;"></td>
													<td class="text-center"><?php echo $val->title; ?></td>
													<td class="text-center"><?php echo $val->description; ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->announcement_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
														<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->announcement_id; ?>"> <i class="bi bi-trash"></i> </button>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->announcement_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title white" id="myModalLabel130">Delete Announcement</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->announcement_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS ANNOUNCEMENT ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-announcement">
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
												<h5 class="modal-title white" id="myModalLabel130">Update Event</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<label>Title: </label>
													<div class="form-group">
														<input type="text" name="title" class="form-control" value="<?php echo $val->title;?>" required>
													</div>

													<label>Content: </label>
													<div class="form-group">
														<textarea type="text" name="content" class="form-control" required><?php echo $val->description;?></textarea>
													</div>
													
													<label>Photo: </label>
													<div class="form-group">
														<input type="file" name="image" class="form-control" >
														<input type="hidden" name="image1" class="form-control" value="<?php echo $val->image;?>" >
														<input type="hidden" name="id" class="form-control" value="<?php echo $val->announcement_id;?>" >
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-announcement">
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
					<h5 class="modal-title white" id="myModalLabel130">New Event</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
						
							<label>Title: </label>
							<div class="form-group">
								<input type="text" name="title" class="form-control" required>
							</div>

							<label>Content: </label>
							<div class="form-group">
								<textarea type="text" name="content" class="form-control" required></textarea>
							</div>
							
							<label>Photo: </label>
							<div class="form-group">
								<input type="file" name="image" class="form-control" required>
							</div>

						</div>
						<div class="modal-footer">

							<button type="submit" class="btn btn-info ml-1" name="add-announcement">
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