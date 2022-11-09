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
			<h3><?php echo $_GET['status'];?> Tickets </h3>

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
												<th class="text-center">Ticket Number</th>
												<th class="text-center">Title</th>
												<th class="text-center">Status</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($val = $atickets->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->transcode; ?></td>
													<td class="text-center"><?php echo $val->title; ?></td>
													<td class="text-center"><?php if($val->status == 0){ echo 'New'; } else if($val->status==1){ echo "Approved"; } else if($val->status == 2) { echo "Solved";} ?></td>
													<?php if($_GET['status'] == 'New'){?>
														<td class="text-center"><button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#approved<?php echo $val->ticket_id; ?>"> Approve </button></td>
													<?php } else {?>
														<td class="text-center"><a href="ticket-view.php?id=<?php echo $val->ticket_id; ?>"><button class="btn btn-md btn-info"> View </button></a></td>
													<?php } ?>
												</tr>
												<div class="modal fade text-left" id="approved<?php echo $val->ticket_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
														<div class="modal-content">
															<div class="modal-header bg-info">
																<h5 class="modal-title white" id="myModalLabel130">Approve Ticket</h5>
																<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
																	<i data-feather="x"></i>
																</button>
															</div>
															<div class="modal-body">
																<form action="#" enctype="multipart/form-data" method="POST">
																	<div class="modal-body">
																		<div class="form-group">
																			<input type="hidden" name="id" class="form-control" value="<?php echo $val->ticket_id; ?>">
																			<input type="hidden" name="status" class="form-control" value="<?php echo $_GET['status']; ?>">
																		</div>
																		ARE YOU SURE TO APPROVE THIS TICKET?
																	</div>
																	<div class="modal-footer">
																		<button type="submit" class="btn btn-info ml-1" name="approve-ticket">
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