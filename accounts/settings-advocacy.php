	<?php

    include('includes/header.php');
    include('includes/nav.php');
    include('controller/advocacy.php');

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
	        <h3>The Organization</h3>

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
	                                            <th class="text-center">Title</th>
	                                            <th class="text-center">Chapter</th>
	                                            <th class="text-center">Date</th>
	                                            <th class="text-center">Action</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                        <?php while ($val = $advocacy->fetch_object()) { ?>
	                                            <tr>
	                                                <td class="text-center"><?php echo $val->advocacy_title; ?></td>
	                                                <td class="text-center"><?php echo $val->advocacy_chapter; ?></td>
	                                                <td class="text-center"><?php echo $val->advocacy_schedule_date; ?></td>
	                                                <td class="text-center">
	                                                    <a href="advocacy-photo.php?advocacy=<?php echo $val->advocacy_id; ?>&title=<?php echo $val->advocacy_title; ?>"><button class="btn btn-info btn-sm"> <i class="bi bi-card-image"></i> </button></a>
	                                                </td>
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

	    <?php

        include('includes/footer.php');

        ?>