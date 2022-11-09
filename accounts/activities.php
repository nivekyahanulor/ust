	<?php

    include('includes/header.php');
    include('includes/nav.php');
    include('controller/chapter.php');

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
                    echo '(Advocate)';
                }
                ?>
	        </strong>
	        </li>
	    </div>
	    <div class="page-heading">
	        <h3>Activities </h3>

	    </div>
	    <div class="page-content">
	        <section class="row">
	            <div class="col-12 col-lg-12">

	                <div class="row">
	                    <div class="col-12">
	                        <div class="card">

	                            <div class="card-body">
	                                <div id="calendar"></div>
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