	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/user.php');

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
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<?php
								$prn = $_SESSION['id'];
								$memberlist = $mysqli->query("SELECT * from users where  user_id = '$prn'");
								while ($val = $memberlist->fetch_object()) {
								?>
									<div class="card-body">
										<div class="col-xl-4 col-md-6 col-sm-12">
											<div class="card">
												<div class="card-content">
													<div class="card-body">
														<form method="post">
															<p>Avatar:
																<input type="file" name="image" class="form-control">
																<input type="hidden" name="logo" class="form-control" value="<?php echo $val->profile_picture; ?>">
															</p>
															<p class="card-text">
																First Name : <input type="text" class="form-control" name="fname" value="<?php echo $val->fname; ?>" required>
																<input type="hidden" class="form-control" name="id" value=" <?php echo $val->user_id; ?>">
															</p>
															<p class="card-text">
																Middle Name : <input type="text" class="form-control" name="mname" value="<?php echo $val->mname; ?>" required>
															</p>
															<p class="card-text">
																Last Name : <input type="text" class="form-control" name="lname" value="<?php echo $val->lname; ?>" required>
															</p>
															<p class="card-text">
																Advocacy : <input type="text" class="form-control" name="advocacy" value="<?php echo $val->advocacy; ?>" required>
															</p>
															<p class="card-text">
																Contact : <input type="text" class="form-control" name="contactnumber" value="<?php echo $val->contact; ?>" required>
															</p>
															<p class="card-text">
																Email : <input type="text" class="form-control" name="email" value="<?php echo $val->email; ?>" required>
															</p>

															<p class="card-text">
																Address : <input type="text" class="form-control" name="address" value="<?php echo $val->address; ?>" required>
															</p><br>
															<button class="btn btn-info btn-md" name="updateprofile" style="width: 100%;"> Update </button>
														</form>
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


		<?php

		include('includes/footer.php');

		?>