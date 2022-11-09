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
			<h3>Program Committee </h3>
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
												<th class="text-center">Advocacy</th>
												<th class="text-center">Chapter</th>
												<th class="text-center">Committee</th>
												<?php if ($_SESSION['role'] == 1) { ?>
													<th class="text-center">Action</th>
												<?php } ?>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $committee->fetch_object()) {
												$chapter = $val->comm_chap;
											?>
												<tr>
													<td class="text-center"><?php echo $val->comm_ad; ?></td>
													<td class="text-center"><?php echo $val->comm_chap; ?></td>
													<td class="text-left">
														Project Committee: <a href="profile.php?id=<?php echo $val->comm_proj_comm; ?>" target="_blank"><?php echo $val->comm_proj_comm; ?></a><br>
														Registration Committee: <a href="profile.php?id=<?php echo $val->comm_reg_comm; ?>" target="_blank"><?php echo $val->comm_reg_comm; ?></a><br>
														Committee on Logistics: <a href="profile.php?id=<?php echo $val->comm_comm_log; ?>" target="_blank"><?php echo $val->comm_comm_log; ?></a><br>
														Committee on Facilitators: <a href="profile.php?id=<?php echo $val->comm_comm_fac; ?>" target="_blank"><?php echo $val->comm_comm_fac; ?></a><br>
														Committee for Documentation: <a href="profile.php?id=<?php echo $val->comm_comm_doc; ?>" target="_blank"><?php echo $val->comm_comm_doc; ?></a><br>
														Food/Kitchen Committee: <a href="profile.php?id=<?php echo $val->comm_kitc_comm; ?>" target="_blank"><?php echo $val->comm_kitc_comm; ?></a><br>
														Crowd Control Committee: <a href="profile.php?id=<?php echo $val->comm_cro_con; ?>" target="_blank"><?php echo $val->comm_cro_con; ?></a><br>
													</td>
													<?php if ($_SESSION['role'] == 1) { ?>
														<td class="text-center">
															<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#update<?php echo $val->committee_id; ?>"> <i class="bi bi-pencil-square"></i> </button>
															<!-- <button class="btn btn-warning btn-sm"  data-bs-toggle="modal" data-bs-target="#delete<?php echo $val->committee_id; ?>"> <i class="bi bi-trash"></i> </button>-->
														</td>
													<?php } ?>
												</tr>
												<div class="modal fade text-left" id="delete<?php echo $val->partnership_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
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
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->partnership_id; ?>">
																		</div>
																		ARE YOU SURE TO DELETE THIS INVITATION ?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-warning ml-1" name="delete-invitation">
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
								<div class="modal fade text-left" id="update<?php echo $val->committee_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
										<div class="modal-content">
											<div class="modal-header bg-info">
												<h5 class="modal-title white" id="myModalLabel130">Program Comittee</h5>
												<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
													<i data-feather="x"></i>
												</button>
											</div>
											<div class="modal-body">
												<form action="#" enctype="multipart/form-data" method="POST">
													<div class="modal-body">
														<label>Advocacy: </label>
														<div class="form-group">
															<input type="text" name="comm_ad" class="form-control" value="<?php echo $val->comm_ad; ?>" readonly>
															<input type="hidden" name="committee_id" class="form-control" value="<?php echo $val->committee_id; ?>" readonly>
															<input type="hidden" name="advocacy_id" class="form-control" value="<?php echo $val->advocacy_id; ?>" readonly>
														</div>

														<label>Chapter: </label>
														<div class="form-group">
															<input type="text" name="chapter" class="form-control" value="<?php echo $val->comm_chap; ?>" readonly>
														</div>

														<label>Project Committee : </label>
														<div class="form-group">
															<select name="pc" id="" class="form-control" required>
																<option value="" selected> - Select Project Committee - </option>
																<?php
																$s1 =  $mysqli->query("SELECT * from users where chapter='$chapter' and role=3");
																while ($val1 = $s1->fetch_object()) {
																	if ($val->comm_proj_comm == $val1->fname . ' ' . $val1->lname) {
																?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>" selected> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>"> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>

														<label>Registration Committee : </label>
														<div class="form-group">
															<select name="rc" id="" class="form-control" required>
																<option value="" selected> - Select Registration Committee - </option>
																<?php
																$s1 =  $mysqli->query("SELECT * from users where chapter='$chapter' and role=3");
																while ($val1 = $s1->fetch_object()) {
																	if ($val->comm_reg_comm == $val1->fname . ' ' . $val1->lname) {
																?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>" selected> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>"> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>

														<label>Committee on Logistics : </label>
														<div class="form-group">
															<select name="cl" id="" class="form-control" required>
																<option value="" selected> - Select Committee on Logistics - </option>
																<?php
																$s1 =  $mysqli->query("SELECT * from users where chapter='$chapter' and role=3");
																while ($val1 = $s1->fetch_object()) {
																	if ($val->comm_comm_log == $val1->fname . ' ' . $val1->lname) {
																?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>" selected> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>"> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>

														<label>Committee on Facilitators : </label>
														<div class="form-group">
															<select name="con" id="" class="form-control" required>
																<option value="" selected> - Select Committee on Facilitators - </option>
																<?php
																$s1 =  $mysqli->query("SELECT * from users where chapter='$chapter' and role=3");
																while ($val1 = $s1->fetch_object()) {
																	if ($val->comm_comm_fac == $val1->fname . ' ' . $val1->lname) {
																?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>" selected> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>"> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>

														<label>Committee for Documentation : </label>
														<div class="form-group">
															<select name="cfd" id="" class="form-control" required>
																<option value="" selected> - Select Committee for Documentation - </option>
																<?php
																$s1 =  $mysqli->query("SELECT * from users where chapter='$chapter' and role=3");
																while ($val1 = $s1->fetch_object()) {
																	if ($val->comm_comm_doc == $val1->fname . ' ' . $val1->lname) {
																?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>" selected> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>"> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>

														<label>Food/Kitchen Committe : </label>
														<div class="form-group">
															<select name="kc" id="" class="form-control" required>
																<option value="" selected> - Select Food/Kitchen Committe - </option>
																<?php
																$s1 =  $mysqli->query("SELECT * from users where chapter='$chapter' and role=3");
																while ($val1 = $s1->fetch_object()) {
																	if ($val->comm_kitc_comm == $val1->fname . ' ' . $val1->lname) {
																?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>" selected> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>"> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>

														<label>Crowd Control Committee : </label>
														<div class="form-group">
															<select name="ccc" id="" class="form-control" required>
																<option value="" selected> - Select Crowd Control Committee - </option>
																<?php
																$s1 =  $mysqli->query("SELECT * from users where chapter='$chapter' and role=3");
																while ($val1 = $s1->fetch_object()) {
																	if ($val->comm_cro_con == $val1->fname . ' ' . $val1->lname) {
																?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>" selected> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																	<?php } else { ?>
																		<option value="<?php echo $val1->fname . ' ' . $val1->lname; ?>"> <?php echo $val1->fname . ' ' . $val1->lname; ?></option>
																<?php
																	}
																}
																?>
															</select>
														</div>

														<label>Note : </label>
														<div class="form-group">
															<textarea type="text" name="notes" class="form-control" required><?php echo $val->comm_decrip; ?></textarea>
														</div>

													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info ml-1" name="update-committee">
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


	<?php

	include('includes/footer.php');

	?>