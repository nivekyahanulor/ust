	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/members.php');

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
		</div>
		<div class="page-heading">
			<?php if ($_SESSION['role'] == 1) { ?>
				<h3> <?php echo $_GET['chapter']; ?> Member List</h3>
			<?php } else { ?>
				<h3> <?php echo $_SESSION['chapter']; ?> Member List</h3>
			<?php } ?>
		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<?php if ($_SESSION['memberrole'] == 4 && $_SESSION['role'] == 1) {
									} else { ?>
										<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> Add New Advocate </button></h4>
									<?php } ?>
								</div>
								<div class="card-body">
									<table class="table table-striped" id="table1">
										<thead>
											<tr>
												<th class="text-center">Profile</th>
												<th class="text-center">Name</th>
												<th class="text-center">Role</th>
												<th class="text-center">Contact</th>
												<th class="text-center">Email</th>
												<?php if ($_SESSION['position'] == 1 || $_SESSION['position'] == 2) { ?>
													<th class="text-center">Action</th>
												<?php } ?>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $memberlist->fetch_object()) { ?>
												<tr>
													<td class="text-center"><img src="<?php echo 'assets/profile/' . $val->profile_picture; ?>" width="150px;"></td>
													<td class="text-center"><?php echo $val->fname . ' ' . $val->lname; ?></td>
													<td class="text-center">
														<?php if ($val->role == 3) {
															echo 'Member';
														} else {
															echo 'Volunteer';
														}
														?>
													</td>
													<td class="text-center"><?php echo $val->contact; ?></td>
													<td class="text-center"><?php echo $val->email; ?></td>
													<?php if ($_SESSION['position'] == 1 || $_SESSION['position'] == 2) { ?>
														<td class="text-center">
															<?php if ($val->status == 1) { ?>
																<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#approve<?php echo $val->user_id; ?>" style="background-color:#198754; border-color:#198754"> <i class="bi bi-check-square"></i> </button>
															<?php } ?>
															<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->user_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
															<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->user_id; ?>"> <i class="bi bi-trash"></i> </button>
														</td>
													<?php } ?>
												</tr>
												<div class="modal fade text-left" id="approve<?php echo $val->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-success">
																<h5 class="modal-title white" id="myModalLabel130">Approve Member</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->user_id; ?>">
																			<input type="hidden" name="chapter" class="form-control" value="<?php echo $_GET['chapter']; ?>">
																			<input type="hidden" name="chapterid" class="form-control" value="<?php echo $_GET['id']; ?>">
																			<input type="hidden" name="email" class="form-control" value="<?php echo $val->email; ?>">
																			<input type="hidden" name="name" class="form-control" value="<?php echo $val->fname . ' ' . $val->lname; ?>">
																			<input type="hidden" name="password" class="form-control" value="<?php echo $val->password; ?>">
																		</div>
																		ARE YOU SURE TO APPROVE THIS MEMBER ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-success ml-1" name="approve-member">
																			<i class="bx bx-check d-block d-sm-none"></i>
																			<span class="d-none d-sm-block">Approved</span>
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
								<div class="modal fade text-left" id="delete<?php echo $val->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-warning">
												<h5 class="modal-title white" id="myModalLabel130">Delete Member</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<div class="form-group">
															<input type="hidden" name="id" class="form-control" value="<?php echo $val->user_id; ?>">
															<input type="hidden" name="chapter" class="form-control" value="<?php echo $_GET['chapter']; ?>">
															<input type="hidden" name="chapterid" class="form-control" value="<?php echo $_GET['id']; ?>">
														</div>
														ARE YOU SURE TO DELETE THIS MEMBER ?
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-warning ml-1" name="delete-member">
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
							<div class="modal fade text-left" id="update<?php echo $val->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header bg-info">
											<h5 class="modal-title white" id="myModalLabel130">Update Details</h5>
											<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
												<i data-feather="x"></i>
											</button>
										</div>
										<div class="modal-body">
											<form action="#" enctype="multipart/form-data" method="POST">
												<div class="modal-body">
													<label>Role: </label>
													<div class="form-group">
														<select name="role" id="sponsor" class="form-control" required>
															<?php if ($val->role == 3) { ?>
																<option value="3" selected> Member </option>
																<option value="4"> Volunteer </option>
															<?php } else { ?>
																<option value="3"> Member </option>
																<option value="4" selected> Volunteer </option>
															<?php } ?>

														</select>
													</div>

													<label>Chapter: </label>
													<div class="form-group">
														<input type="text" name="chapter" value="<?php if (isset($_GET['chapter'])) {
																										echo $_GET['chapter'];
																									} else {
																										echo $_SESSION['chapter'];
																									} ?>" class="form-control" readonly required>
														<input type="hidden" name="chapterid" value="<?php echo $_GET['id']; ?>" class="form-control" readonly required>
														<input type="hidden" name="id" class="form-control" value="<?php echo $val->user_id; ?>" required>
													</div>

													<label>First Name: </label>
													<div class="form-group">
														<input type="text" name="fname" class="form-control" value="<?php echo $val->fname; ?>" required>
													</div>

													<label>Middle Name: </label>
													<div class="form-group">
														<input type="text" name="mname" class="form-control" value="<?php echo $val->mname; ?>" required>
													</div>

													<label>Last Name: </label>
													<div class="form-group">
														<input type="text" name="lname" class="form-control" value="<?php echo $val->lname; ?>" required>
													</div>

													<label>Age: </label>
													<div class="form-group">
														<input type="text" name="age" class="form-control" value="<?php echo $val->age; ?>" required>
													</div>

													<label>Contact Number: </label>
													<div class="form-group">
														<input type="text" name="contactnumber" class="form-control" value="<?php echo $val->contact; ?>" required>
													</div>

													<label>Address: </label>
													<div class="form-group">
														<textarea type="text" name="address" class="form-control" required><?php echo $val->address; ?></textarea>
													</div>

													<label>Advocacy: </label>
													<div class="form-group">
														<textarea type="text" name="advocacy" class="form-control" required><?php echo $val->advocacy; ?></textarea>
													</div>

													<label>Avatar: </label>
													<div class="form-group">
														<input type="file" name="image" class="form-control">
														<input type="hidden" name="logo" class="form-control" value="<?php echo $val->profile_picture; ?>">
													</div>

													<label>Email Address: </label>
													<div class="form-group">
														<input type="email" name="email" class="form-control" value="<?php echo $val->email; ?>" required>
													</div>

													<label>Password: </label>
													<div class="form-group">
														<input type="password" name="password" class="form-control" value="<?php echo $val->password; ?>" required>
													</div>

												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-info ml-1" name="update-member">
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
					<h5 class="modal-title white" id="myModalLabel130">New Advocate</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" enctype="multipart/form-data" method="POST">
						<div class="modal-body">
							<label>Role: </label>
							<div class="form-group">
								<select name="role" id="sponsor" class="form-control" required>
									<option value=""> - Select Role - </option>
									<?php if ($_SESSION['role'] == 1) { ?>
										<option value="3"> Member </option>
										<option value="4"> Volunteer </option>
									<?php } else { ?>
										<option value="4"> Volunteer </option>
									<?php } ?>
								</select>
							</div>

							<label>Chapter: </label>
							<div class="form-group">
								<?php if ($_SESSION['role'] == 1) { ?>
									<input type="text" name="chapter" value="<?php echo $_GET['chapter']; ?>" class="form-control" readonly required>
								<?php } else { ?>
									<input type="text" name="chapter" value="<?php echo $_SESSION['chapter']; ?>" class="form-control" readonly required>
								<?php } ?>
								<input type="hidden" name="chapterid" value="<?php echo $_GET['id']; ?>" class="form-control" readonly required>
							</div>

							<label>First Name: </label>
							<div class="form-group">
								<input type="text" name="fname" class="form-control" required>
							</div>

							<label>Middle Name: </label>
							<div class="form-group">
								<input type="text" name="mname" class="form-control" required>
							</div>

							<label>Last Name: </label>
							<div class="form-group">
								<input type="text" name="lname" class="form-control" required>
							</div>

							<label>Age: </label>
							<div class="form-group">
								<input type="text" name="age" class="form-control" required>
							</div>

							<label>Contact Number: </label>
							<div class="form-group">
								<input type="text" name="contactnumber" class="form-control" required>
							</div>

							<label>Address: </label>
							<div class="form-group">
								<textarea type="text" name="address" class="form-control" required></textarea>
							</div>

							<label>Advocacy: </label>
							<div class="form-group">
								<textarea type="text" name="advocacy" class="form-control" required></textarea>
							</div>

							<label>Avatar: </label>
							<div class="form-group">
								<input type="file" name="image" class="form-control" required>
							</div>

							<label>Email Address: </label>
							<div class="form-group">
								<input type="email" name="email" class="form-control" required>
							</div>

							<label>Password: </label>
							<div class="form-group">
								<input type="password" name="password" class="form-control" required>
							</div>

						</div>
						<div class="modal-footer">

							<button type="submit" class="btn btn-info ml-1" name="add-members">
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