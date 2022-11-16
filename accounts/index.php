	<?php

    include('includes/header.php');
    include('includes/nav.php');
    include('controller/dashboard.php');

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
			<h2>DASHBOARD</h2> 
			<hr>
	        <h3><?php echo date('F d, Y');?></h3>
	    </div>
	    <div class="page-content">
	        <section class="row">
	            <div class="col-12 col-lg-12">
	                <div class="row">
	                    <div class="col-6 col-lg-4 col-md-6">
	                        <div class="card">
	                            <div class="card-body px-3 py-4-5">
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="stats-icon blue">
	                                            <i class="bi bi-folder2-open"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <h6 class="text-muted font-semibold">New Tickets</h6>
	                                        <h2 class="font-extrabold mb-0"><?php echo $tickets0->num_rows;?></h2>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-6 col-lg-4 col-md-6">
	                        <div class="card">
	                            <div class="card-body px-3 py-4-5">
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="stats-icon orange">
	                                            <i class="bi bi-folder-symlink"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <h6 class="text-muted font-semibold">Pending Tickets</h6>
	                                        <h2 class="font-extrabold mb-0"><?php echo $tickets1->num_rows;?></h2>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-6 col-lg-4 col-md-6">
	                        <div class="card">
	                            <div class="card-body px-3 py-4-5">
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="stats-icon green">
	                                            <i class="bi bi-folder-check"></i>
	                                        </div>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <h6 class="text-muted font-semibold">Solved Tickets</h6>
	                                        <h2 class="font-extrabold mb-0"><?php echo $tickets2->num_rows;?></h2>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                   
	                </div>
	                <div class="row">
	                    <div class="col-12">
	                        <div class="card">
	                            <div class="card-header">
	                                <h4>Legend</h4>
	                            </div>
	                            <div class="card-body">
	                               <table class="table">
									<tr>
										<td> Latest ticket submitted by the user </td>
										<td> <button class="btn btn-sm btn-blue" > &nbsp; &nbsp; </button> New Tickets</td>
									</td>
									<tr>
										<td> Locking of Documents </td>
										<td> <button class="btn btn-sm btn-orange" > &nbsp; &nbsp; </button> Pending Tickets</td>
									</td>
									<tr>
										<td> Completed </td>
										<td> <button class="btn btn-sm btn-green" > &nbsp; &nbsp; </button> Completed Tickets</td>
									</td>
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