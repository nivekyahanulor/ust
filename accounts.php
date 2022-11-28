	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/accounts.php');

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
			<h3>Admin & Help Desk Account </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> ADD ACCOUNT </button></h4>
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
													<th class="text-center">User Name</th>
													<th class="text-center">Status</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php while ($val = $user_account->fetch_object()) { ?>
												<tr>
													<td class="text-center"><img src="<?php echo 'assets/profile/' . $val->profile; ?>" width="150px;"></td>
													<td class="text-center"><?php echo $val->fname . ' ' . $val->lname; ?></td>
													<td class="text-center">
														<?php if ($val->position == 1) {
															echo 'Admin';
														} else if ($val->position == 2) {
															echo 'Super Admin';
														} else if ($val->position == 3) {
															echo 'Help Desk';
														}
														?>
													</td>
													<td class="text-center"><?php echo $val->number; ?></td>
													<td class="text-center"><?php echo $val->email; ?></td>
													<td class="text-center"><?php echo $val->username; ?></td>
													<td class="text-center"><?php if($val->status == 0) { echo 'Active'; } else { echo 'In-Active';} ?></td>
													<td class="text-center">
														<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->u_id; ?>"> <i class="bi bi-pencil-square"></i> </button> <br><br>
														<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->u_id; ?>"> <i class="bi bi-trash"></i> </button>
													</td>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->u_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-warning">
																<h5 class="modal-title white" id="myModalLabel130">Delete Account</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->u_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS ACCOUNT ?
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
								<div class="modal fade text-left" id="update<?php echo $val->u_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Update User</h5>
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
																<?php if ($val->position == 1) { ?>
																	<option value="1" selected> Admin </option>
																	<option value="2"> Super Admin</option>
																	<option value="3"> Help Desk</option>
																<?php  } else if ($val->position == 2) { ?>
																	<option value="1" > Admin </option>
																	<option value="2" selected> Super Admin</option>
																	<option value="3"> Help Desk</option>
																<?php  } else if ($val->position == 3) { ?>
																	<option value="1" > Admin </option>
																	<option value="2" > Super Admin</option>
																	<option value="3" selected> Help Desk</option>
																<?php } ?>


															</select>
														</div>

														<label>First Name: </label>
														<div class="form-group">
															<input type="text" name="fname" class="form-control" value="<?php echo $val->fname; ?>" required>
															<input type="hidden" name="id" class="form-control" value="<?php echo $val->u_id; ?>" required>
														</div>

														<label>Middle Name: </label>
														<div class="form-group">
															<input type="text" name="mname" class="form-control" value="<?php echo $val->mname; ?>" required>
														</div>

														<label>Last Name: </label>
														<div class="form-group">
															<input type="text" name="lname" class="form-control" value="<?php echo $val->lname; ?>" required>
														</div>


														<label>Contact Number: </label>
														<div class="form-group">
															<input type="text" name="contactnumber" class="form-control" value="<?php echo $val->number; ?>" required>
														</div>

														<label>Address: </label>
														<div class="form-group">
															<textarea type="text" name="address" class="form-control" required><?php echo $val->address; ?></textarea>
														</div>

														<label>Avatar: </label>
														<div class="form-group">
															<input type="file" name="image" class="form-control">
															<input type="hidden" name="logo" class="form-control" value="<?php echo $val->profile; ?>">
														</div>

														<label>Email Address: </label>
														<div class="form-group">
															<input type="email" name="email" class="form-control" value="<?php echo $val->email; ?>" required>
														</div>
														
														<label>User: </label>
														<div class="form-group">
															<input type="text" name="username" class="form-control" value="<?php echo $val->username; ?>" required>
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
					<h5 class="modal-title white" id="myModalLabel130">New User</h5>
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
									<option value="1"> Admin </option>
									<option value="2"> Super Admin</option>
									<option value="3"> Help Desk</option>
								</select>
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


							<label>Contact Number: </label>
							<div class="form-group">
								<input type="text" name="contactnumber" class="form-control" required>
							</div>

							<label>Address: </label>
							<div class="form-group">
								<textarea type="text" name="address" class="form-control" required></textarea>
							</div>

							<label>Avatar: </label>
							<div class="form-group">
								<input type="file" name="image" class="form-control" required>
							</div>

							<label>Email Address: </label>
							<div class="form-group">
								<input type="email" name="email" class="form-control" required>
							</div>
							
							<label>User Name: </label>
							<div class="form-group">
								<input type="text" name="username" class="form-control" required>
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