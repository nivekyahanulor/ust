	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/presentation.php');

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
			<h3>Presentations </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<?php if ($_SESSION['position'] == 2 || $_SESSION['role'] != 1) { ?>
										<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> Create a Presentation </button></h4>
									<?php } ?>
								</div>
								<div class="card-body">
									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th class="text-center">Title </th>
												<th class="text-center">Chapter </th>
												<th class="text-center">Description</th>
												<th class="text-center">Status</th>
												<th class="text-center">Updated By </th>
												<th class="text-center">Date Updated </th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $presentations->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->presentations_title; ?></td>
													<td class="text-center"><?php echo $val->presentations_chapter; ?></td>
													<td class="text-center"><?php echo $val->presentations_desc; ?></td>
													<td class="text-center"><?php if ($val->status == 1) {
																				echo 'Approved';
																			} else {
																				echo 'Suggested';
																			} ?></td>
													<td class="text-center"><?php echo $val->presentations_updated_by; ?></td>
													<td class="text-center"><?php echo $val->presentations_date; ?></td>
													<td class="text-center">
														<?php if ($val->status != 1) { ?>
															<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->presentations_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
															<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->presentations_id; ?>"> <i class="bi bi-trash"></i> </button>
														<?php } ?>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->presentations_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
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
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->presentations_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS PRESENTATION ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-presentation">
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
								<div class="modal fade text-left" id="update<?php echo $val->presentations_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Update Presentation</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<label>Presentation Title: </label>
														<div class="form-group">
															<input type="text" name="title" value="<?php echo $val->presentations_title; ?>" class="form-control" required>
															<input type="hidden" name="id" value="<?php echo $val->presentations_id; ?>" class="form-control" required>
														</div>
														<label>Chapter: </label>
														<div class="form-group">
															<?php if (isset($_SESSION['chapter'])) { ?>
																<input type="text" name="chapter" value="<?php echo $_SESSION['chapter']; ?>" class="form-control" readonly>
															<?php } else { ?>
																<select name="chapter" id="advocacy" class="form-control" required>
																	<option value="" selected> - Select Chapter - </option>
																	<?php
																	$q_e2 =  $mysqli->query("SELECT * from chapter");
																	while ($val1 = $q_e2->fetch_object()) {
																		if ($val->presentations_chapter == $val1->chapter_name) {
																	?>
																			<option value="<?php echo $val1->chapter_name; ?>" selected> <?php echo $val1->chapter_name; ?></option>
																		<?php } else { ?>
																			<option value="<?php echo $val1->chapter_name; ?>"> <?php echo $val1->chapter_name; ?></option>
																	<?php
																		}
																	}
																	?>
																</select>
															<?php } ?>
														</div>

														<label>Description : </label>
														<div class="form-group">
															<textarea type="text" name="description" class="form-control" required><?php echo $val->presentations_desc; ?></textarea>
														</div>
														<?php if ($_SESSION['position'] == 1) { ?>
															<label>Date : </label>
															<div class="form-group">
																<input type="date" name="date" class="form-control" required>
															</div>
														<?php } ?>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-presentation">
															<i class="bx bx-check d-block d-sm-none"></i>
															<span class="d-none d-sm-block">update</span>
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
					<h5 class="modal-title white" id="myModalLabel130">Create Presentation</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Presentation Title: </label>
							<div class="form-group">
								<input type="text" name="title" class="form-control" required>
								<input type="hidden" name="status" value="0" class="form-control" required>
							</div>
							<label>Chapter: </label>
							<div class="form-group">
								<?php if (isset($_SESSION['chapter'])) { ?>
									<input type="text" name="chapter" value="<?php echo $_SESSION['chapter']; ?>" class="form-control" readonly>
								<?php } else { ?>
									<select name="chapter" id="advocacy" class="form-control" required>
										<option value="" selected> - Select Chapter - </option>
										<?php
										$q_e2 =  $mysqli->query("SELECT * from chapter");
										while ($val = $q_e2->fetch_object()) {

										?>
											<option value="<?php echo $val->chapter_name; ?>"> <?php echo $val->chapter_name; ?></option>
										<?php
										}
										?>
									</select>
								<?php } ?>
							</div>

							<label>Description : </label>
							<div class="form-group">
								<textarea type="text" name="description" class="form-control" required></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info ml-1" name="add-presentation">
								<i class="bx bx-check d-block d-sm-none"></i>
								<span class="d-none d-sm-block">Add</span>
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