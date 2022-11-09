<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="assets/img/favicon.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="accounts/assets/css/bootstrap.css">
    <link rel="stylesheet" href="accounts/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="accounts/assets/css/app.css">
    <link rel="stylesheet" href="accounts/assets/css/pages/auth.css">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div id="auth" class="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                  
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-warning alert-dismissable">
                            <center><strong>Login Error!</strong> Please Try Again!</center>
                        </div>
                    <?php } ?>
                    <h1 class="auth-title">Register.</h1>
                    <p class="auth-subtitle mb-5">Register your account.</p>
                    <form method="post" action="controller/auth-register.php">
                        <div class="form-group  mb-2">
                            <input type="text" class="form-control form-control-md" name="firstname" placeholder="First Name" autocomplete="off" required>
                        </div>
						<div class="form-group  mb-2">
                            <input type="text" class="form-control form-control-md" name="lastname" placeholder="Last Name" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-2">
                            <select class="form-control form-control-md" name="role" required>
								<option value=""> - Select User Type - </option>
								<option> Thomasian Community </option>
								<option> Executive Associates </option>
								<option> Students </option>
								<option> Members </option>
								<option> Academic Staff </option>
								<option> Non-Academic Staff </option>
							</select>
					    </div>
						<div class="form-group mb-2">
                            <input type="email" class="form-control form-control-md" name="email" placeholder="Email Address" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-2">
                            <input type="text" class="form-control form-control-md" name="username" placeholder="User Name" autocomplete="off" required>
                        </div>
                       <div class="form-group mb-2">
                            <input type="password" class="form-control form-control-md" name="password" placeholder="Password" autocomplete="off" required>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">REGISTER</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="" style="background-color:#7eae1e; height: 100%">
                    <center>
                            <img src="assets/images/earth.png">
                    </center>
                </div>
            </div>
        </div>

    </div>
</body>

</html>