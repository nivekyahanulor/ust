	<?php

	include('includes/header.php');
	include('includes/nav.php');
	include('controller/tickets.php');

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
			<h3>Tickets </h3>

		</div>
		<div class="page-content">
			<section class="row">
				<div class="col-12 col-lg-12">

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addnew"> Add Ticket </button></h4>
								</div>
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
											<?php while ($val = $tickets->fetch_object()) { ?>
												<tr>
													<td class="text-center"><?php echo $val->transcode; ?></td>
													<td class="text-center"><?php echo $val->title; ?></td>
													<td class="text-center"><?php if($val->status == 0){ echo 'New'; } else if($val->status==1){ echo "Approved"; } else if($val->status == 2) { echo "Solved";} ?></td>
													<td class="text-center"><a href="ticket-view.php?id=<?php echo $val->ticket_id; ?>"><button class="btn btn-md btn-info"> View </button></a></td>
												</tr>
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
					<h5 class="modal-title white" id="myModalLabel130">New Ticket</h5>
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

							
						</div>
						<div class="modal-footer">

							<button type="submit" class="btn btn-info ml-1" name="add-ticket">
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