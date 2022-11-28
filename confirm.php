<?php
include('controller/database.php');

$email = $_GET['email'];
$name  = $_GET['name'];

$mysqli->query("UPDATE users set is_confirm = 1 where email='$email'");
?>

<?php
	include("include/header.php");
?>

<body>

  <main>
    <div class="">

        <div class="">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4 justify-content-center">

              <div class="d-flex justify-content-center py-4">
                  <img src="assets/images/earth.png" width="250px" alt="">
              </div><!-- End Logo -->

              <div class="card">

                <div class="card-body">
					<br><br>
					Your Account is confirmed!
					<br>
					<br>
					Login using your account details!
					<br>
					<br>
					
					Thank You!
					
					<br>
					<br>
					<a href="login.php"> LOGIN </a>
					<br>

                </div>
              </div>

             

            </div>
          </div>
        </div>


    </div>
  </main><!-- End #main -->

</body>

</html>