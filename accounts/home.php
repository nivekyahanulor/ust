	<?php

    include('includes/header.php');
    include('includes/nav.php');

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
			<h2>HOME</h2> 
			<hr>
	        <h3><?php echo date('F ,d Y');?></h3>
	    </div>
	    <div class="page-content">
	        <section class="row">
	            <div class="col-12 col-lg-12">
	                <div class="row">
	                    <div class="col-10 col-lg-10 col-md-10">
	                        <div class="card">
	                            <div class="card-body px-3 py-4-5">
	                                <div class="row">
									
	                                    <div class="col-md-4 mb-4">
	                                      FIRST NAME 
										  <br>
										  <b> <?php echo $_SESSION['fname'];?> </b>
	                                    </div>
	                                    <div class="col-md-4">
	                                     LAST NAME
										 <br>
										  <b> <?php echo $_SESSION['lname'];?> </b>
	                                    </div>
										
	                                   
	                                </div>  
									<div class="row">
									
										<div class="col-md-4 mb-4">
	                                     EMAIL ADDRESS
										 <b> <?php echo $_SESSION['email'];?> </b>
	                                    </div>
	                                   
	                                </div>
									<div class="row">
									
										<div class="col-md-4">
	                                    TYPE OF USER
										<b> <?php echo $_SESSION['memberrole'];?> </b>
	                                    </div>
	                                   
	                                </div>
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