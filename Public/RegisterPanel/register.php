<?php
include '../db.php';
include '../functions.php';
session_start();
if (!empty($_SESSION['session'])) { 
    header("Location:../UserPanel/index.php");
}
?>

<title><?php title(); ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <main>
        <!-- Start Login Section -->
        <section class="login-form-section">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-7 col-12">
                        <!-- Login Form -->
                        <div style="margin-top:50%;" class="login-form">
                            <h2><?php title(); ?></h2>
                            <form action="process.php" method="POST"><br>
								<div class="form-group">
                                    <input type="text" class="form-control" name="Username" placeholder="Username" />
                                </div>
								<br>
								<div class="form-group">
                                    <input type="text" class="form-control" name="FirstName" placeholder="FirstName" />
                                </div>
								<br>
								<div class="form-group">
                                    <input type="text" class="form-control" name="LastName" placeholder="LastName" />
                                </div>
								<br>
								<div class="form-group">
                                    <input type="mail" class="form-control" name="EMail" placeholder="E-Mail" />
                                </div>
								<br>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="Password" placeholder="Password" />
                                </div>
                                <div class="login-btn"><br>
                                    <button name="register" type="submit" style="float:right;" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<hr>
		<center><button onclick="window.location.href = '../LoginPanel/login.php';" class="btn btn-primary">Go Login Page</button></center>
        <!-- End Login Section -->
    </main>