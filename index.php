<?php
// Starting session
session_start();
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$_POST["confirm_password"] = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/master.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>Home</title>
</head>

<body>

	<nav class="navbar navbar-expand-md">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"> <i class="bi bi-file-earmark-lock-fill"></i> Security Shop</a>
			<div>
				<ul class="navbar-nav justify-content-end">
					<li class="nav-item">
						<a class="nav-link" href='login.php'> <i class="bi bi-box-arrow-in-right"></i> Login</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href='register.php'> <i class="bi bi-person-plus"></i> Register</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="shop.php"> <i class="bi bi-cart2"></i></i> Cart</a>
					</li>


				</ul>
			</div>

		</div>
	</nav>

	<div class="container">

		<div class="row">
			<h4>Shop</h4>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>
			<div class="col-xs-12 col-sm-6 col-lg-3 d-flex justify-content-center text-center">
				<div class="item-container"></div>
			</div>



		</div>

	</div>

	<footer class="page-footer">
		<p>Security Shop</p>
	</footer>


</body>

</html>
<script src="./js/scripts.js"></script>