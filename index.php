<?php
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/master.css">
	<title>Webshop</title>
</head>
<body>
	<nav>
		<h1>The Security Shop</h1>
	</nav>
	<div class="form_wrapper">
	<form action="/login.php" method="get" class="login">
		<h3>Login</h3>
		<input type="text" name="username" placeholder="username">
		<input type="password" name="password" placeholder="password" id="">
		<input type="submit" value="Login">
	</form>
	<form action="/register.php" method="post" class="register">
		<h3>Register</h3>
		<input type="text" name="username" placeholder="username">
		<input type="password" name="password" placeholder="password" id="">
		<input type="password" name="password2" placeholder="Confirm password" id="">
		<input type="submit" value="Register">
	</form>
	</div>
</body>
</html>
<script src="./js/scripts.js"></script>