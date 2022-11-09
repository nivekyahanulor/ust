	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/committee.php');



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

		<div class="page-heading">
			<h3><?php echo $_GET['id']; ?> </h3>
		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-121">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<?php
								$id = $_GET['id'];
								if ($_SESSION['role'] == 1) {
									$memberlist = $mysqli->query("SELECT * from user_account where  CONCAT( fname,  ' ', mname , ' ', lname ) = '$id'");
								} else {
									$memberlist = $mysqli->query("SELECT * from users where  CONCAT( fname,  ' ', lname ) = '$id'");
								}
								while ($val = $memberlist->fetch_object()) {
								?>

									<div class="card-body">
										<div class="col-xl-44 col-md-6 col-sm-12">
											<div class="card">
												<div class="card-content">
													<div class="card-body" style="display: flex">
														<?php if ($_SESSION['role'] == 1) { ?>
															<div class="join">
																<img src="assets/profile/<?php echo $val->profile; ?>" class="profilepic"><br><br>
																<center>
																	<button class="btn btn-info btn-md" name="update" style="width:50%;" data-bs-toggle="modal" data-bs-target="#updateofficer<?php echo $val->u_id; ?>"> Edit Profile </button>
																</center>
															</div>
															<div class="new-join"><br>
																<p class="card-text">
																	Position : <?php if ($_SESSION['position'] == 1) {
																					echo 'Program Proponent ';
																				} else {
																					echo '  Program Implementer';
																				} ?>
																</p>
																<p class="card-text">
																	Contact : <?php echo $val->number; ?>
																</p>
																<p class="card-text">
																	Address : <?php echo $val->address; ?>
																</p>
																<p class="card-text">
																	Email : <?php echo $val->username; ?>
																</p>
																<p class="card-text">
																	Advocacy :
																	<center>
																		<p class="card-text" style="color: #cca934; font-family: 'Square Peg', cursive; font-size: 32px"><?php echo $val->advocacy; ?></p>
																	</center>
																</p>
															</div>
															<div class="modal fade text-left" id="updateofficer<?php echo $val->u_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																	<div class="modal-content">
																		<div class="modal-header bg-info">
																			<h5 class="modal-title white" id="myModalLabel130">Update User</h5>
																		</div>
																		<div class="modal-body">
																			<form action="#" enctype="multipart/form-data" method="POST">
																				<div class="modal-body">
																					<label>Avatar: </label>
																					<div class="form-group">
																						<input type="file" name="image" class="form-control">
																						<input type="hidden" name="logo" class="form-control" value="<?php echo $val->profile; ?>">
																					</div>
																					<label>Advocacy: </label>
																					<div class="form-group">
																						<textarea type="text" name="aadvocacy" class="form-control" required><?php echo $val->advocacy; ?></textarea>
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

																					<label>Email Address: </label>
																					<div class="form-group">
																						<input type="email" name="email" class="form-control" value="<?php echo $val->username; ?>" required>
																					</div>

																					<label>Password: </label>
																					<div class="form-group">
																						<input type="password" name="password" class="form-control" value="<?php echo $val->password; ?>" required>
																					</div>

																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-info ml-1" name="update-officer">
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
														<?php } else { ?>
															<div class="join">
																<img src="assets/profile/<?php echo $val->profile_picture; ?>" class="profilepic"><br><br>
																<center>
																	<button class="btn btn-info btn-md" name="update" style="width:50%; float:center" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->user_id; ?>"> Edit Profile </button>
																</center>
															</div>
															<div class="new-join"><br>
																<p class="card-text">
																	Chapter : <?php echo $val->chapter; ?>
																</p>
															<?php } ?>
															<p class="card-text">
																Address : <?php echo $val->address; ?>
															</p>
															<p class="card-text">
																Contact : <?php echo $val->contact; ?>
															</p>

															<?php if ($_SESSION['role'] == 2) { ?>
																<p class="card-text">
																	Email : <?php echo $val->email; ?>
																</p>
																<p class="card-text">
																	Advocacy :
																	<center>
																		<p class="card-text" style="color: #cca934; font-family: 'Square Peg', cursive; font-size: 32px"><?php echo $val->advocacy; ?></p>
																	</center>
																</p>
															</div>
															<div class="modal fade text-left" id="update<?php echo $val->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
																<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
																	<div class="modal-content">
																		<div class="modal-header bg-info">
																			<h5 class="modal-title white" id="myModalLabel130">Update User</h5>
																		</div>
																		<div class="modal-body">
																			<form action="#" enctype="multipart/form-data" method="POST">
																				<div class="modal-body">
																					<label>Avatar: </label>
																					<div class="form-group">
																						<input type="file" name="image" class="form-control">
																						<input type="hidden" name="llogo" class="form-control" value="<?php echo $val->profile_picture; ?>">
																					</div>

																					<label>Advocacy: </label>
																					<div class="form-group">
																						<textarea type="text" name="advocacy" class="form-control" required><?php echo $val->advocacy; ?></textarea>
																					</div>

																					<label>First Name: </label>
																					<div class="form-group">
																						<input type="text" name="ffname" class="form-control" value="<?php echo $val->fname; ?>" required>
																						<input type="hidden" name="iid" class="form-control" value="<?php echo $val->user_id; ?>" required>
																					</div>

																					<label>Middle Name: </label>
																					<div class="form-group">
																						<input type="text" name="mmname" class="form-control" value="<?php echo $val->mname; ?>" required>
																					</div>

																					<label>Last Name: </label>
																					<div class="form-group">
																						<input type="text" name="llname" class="form-control" value="<?php echo $val->lname; ?>" required>
																					</div>

																					<label>Age: </label>
																					<div class="form-group">
																						<input type="text" name="age" class="form-control" value="<?php echo $val->age; ?>" required>
																					</div>

																					<label>Contact Number: </label>
																					<div class="form-group">
																						<input type="text" name="ccontactnumber" class="form-control" value="<?php echo $val->contact; ?>" required>
																					</div>

																					<label>Address: </label>
																					<div class="form-group">
																						<textarea type="text" name="aaddress" class="form-control" required><?php echo $val->address; ?></textarea>
																					</div>

																					<label>Email Address: </label>
																					<div class="form-group">
																						<input type="email" name="eemail" class="form-control" value="<?php echo $val->email; ?>" required>
																					</div>

																					<label>Password: </label>
																					<div class="form-group">
																						<input type="password" name="ppassword" class="form-control" value="<?php echo $val->password; ?>" required>
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
														<?php } ?>
													</div>
												</div>
											</div>

										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

				</div>

			</section>
		</div>
	</div>


	<?php

	include('includes/footer.php');

	?>