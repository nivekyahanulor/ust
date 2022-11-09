	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/chapter.php');

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
			<h3>Chapter </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> Add Chapter </button></h4>
								</div>
								<div class="card-body">
									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th class="text-center">Chapter Name</th>
												<th class="text-center">Date Added </th>
												<th class="text-center">Members</th>
												<th class="text-center">Added By </th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $chapter->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->chapter_name; ?></td>
													<td class="text-center"><?php echo $val->chapter_date_by; ?></td>
													<td class="text-center"><a href="member-list.php?chapter=<?php echo $val->chapter_name; ?>&id=<?php echo $val->chapter_id; ?>"><button class="btn btn-info btn-sm"> Members</button> </a></td>
													<td class="text-center"><?php echo $val->chapter_added_by; ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->chapter_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
														<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->chapter_id; ?>"> <i class="bi bi-trash"></i> </button>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->chapter_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
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
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->chapter_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS CHAPTER ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-chapter">
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
								<div class="modal fade text-left" id="update<?php echo $val->chapter_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Update Partnership</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<input type="hidden" name="id" class="form-control" value="<?php echo $val->chapter_id; ?>">
														<label>Chapter Name: </label>
														<div class="form-group">
															<input type="text" name="chapter" class="form-control" value="<?php echo $val->chapter_name; ?>" required>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-chapter">
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
					<h5 class="modal-title white" id="myModalLabel130">New Chapter</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Chapter Name: </label>
							<div class="form-group">
								<input type="text" name="chapter" class="form-control" required>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="submit-chapter">
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