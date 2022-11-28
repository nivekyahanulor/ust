	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/admin-tickets.php');

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

					echo '('. $_SESSION['memberrole'] .')';
				}
				?>
			</strong>

		</div>
		<div class="page-heading">
			<h3><?php echo $_GET['status'];?> User Ticket </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<?php
										$id      = $_GET['id'];
										$tickets = $mysqli->query("SELECT a.* ,b.* from tickets a  left join users b on b.user_id = a.user_id where a.ticket_id  = '$id'");
										$row       = $tickets->fetch_assoc();
										$date=date_create($row['date_added']);
										echo date_format($date,"D , d F Y , H:m A");
									?>
									<hr>
								</div>
								<div class="card-body">
									<form method="post">
										<b> Ticket Number: <?php echo $row['transcode'];?> </b> <br>
										<b><?php echo $row['title'];?></b>
										<hr>
										<?php
										$id         = $_GET['id'];
										$ticketsres = $mysqli->query("SELECT * from tickets_response where ticket_id  = '$id'");
										while ($val = $ticketsres->fetch_object()) {
											echo "<p>" . $val->content . "<br>";
											echo " Response By: <i>" . $val->response_by . "</i><br>";
											echo " Date: <i>" . $val->date_added . "</i></p>";
										}
									
										?>
										<br><br>
										Response : <br>
										<textarea class="form-control" name="content"> </textarea>
										<input type="hidden" value="<?php echo $id;?>" name="id">
										
										<input type="hidden" value="<?php echo $_SESSION['name'];?>" name="responseby">
										<br>
										<?php if($row['status'] == 2){ echo "<button class='btn btn-success btn-sm'>Solved Ticket</button>"; } else { ?>
										<button class="btn btn-sm btn-success" type="submit" name="publish-comment"> Publish </button>
										<?php if($_SESSION['role']  == 1){ ?>
										<button class="btn btn-sm btn-info" type="button" data-bs-toggle="modal" data-bs-target="#approved<?php echo $row['ticket_id']; ?>"> Mark as Solve </button>
										<?php } } ?>
									</form>
								</div>
						</div>
				</div>
		</div>

	</div>

	</section>
	</div>
												<div class="modal fade text-left" id="approved<?php echo $row['ticket_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-info">
																<h5 class="modal-title white" id="myModalLabel130">Solved Ticket</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																		    <input type="hidden" value="<?php echo $row['fname'] . ' '. $row['lname'];?>" name="user">
																		    <input type="hidden" value="<?php echo $row['user_id'];?>" name="user_id">
																		    <input type="hidden" value="<?php echo $row['email'];?>" name="email">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $row['ticket_id']; ?>">
																		</div>
																		ARE YOU SURE TO MARK AS SOLVED THIS TICKET?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-info ml-1" name="solved-ticket">
																			<i class="bx bx-check d-block d-sm-none"></i>
																			<span class="d-none d-sm-block">Solved</span>
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