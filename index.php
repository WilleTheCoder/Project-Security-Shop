<?php
// Starting session
session_start();
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$_POST["confirm_password"] = "";
$searched = "";

// Prepare a select statement
//if user has searched for anything
if (isset($_GET['search_form_submit'])) {
	$searched = $_GET['search'];

	//A) susceptible to sql-injection BUT WORKS:

	//$sql = "SELECT * FROM products WHERE product_name LIKE '%$searched%'";
	//$stmt = mysqli_query($link, $sql);

	//B) Protects against sql-injection:
	$sql = "SELECT * FROM products WHERE product_name LIKE CONCAT( '%',?,'%')";
	if ($stmt = mysqli_prepare($link, $sql)) {
		mysqli_stmt_bind_param($stmt, "s", $param_searched);
		$param_searched = trim($_GET["search"]);
	}
} else {
	$sql = "SELECT * FROM products";
	$stmt = mysqli_prepare($link, $sql);
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$products[] = $row;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link href="./css/master.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>Home</title>
</head>

<body>

	<?php
	include 'navbar.php';
	?>

	<div class="container">
		<h4>Shop</h4>

		<h4><?php
			if ($searched != "") {
				echo htmlspecialchars("Results for '$searched'");
			}
			?></h4>


		<div class="row py-2">

			<?php if (!(empty($products))) {
				foreach ($products as $product) : ?>
					<div class=" col-12 col-md-6 col-lg-5 col-xl-3 ">
						<form action="" method="post">
							<div class="card-group mt-4">
								<div class="card" style="width: 18rem;">
									<div>
										<?php
										echo "<img src='resource/img/" . $product['img'] . '.jpg' . " ' alt='error' class='card-img-top'>";
										?>

									</div>
									<div class="card-body">

										<ul class="list-group list-group-flush">
											<li class="list-group-item">
												<h4><?php echo $product['product_name'] ?></h4>
											</li>
											<li class="list-group-item">
												<p id="description" class="card-text"><?php echo $product['description'] ?></p>
											</li>
											<li class="list-group-item">
												<p><span class="price">Price: <?php echo $product['price'] . ' kr' ?></span></p>
											</li>
										</ul>

									</div>

									<div class="card-footer">
										<input class="btn btn-primary align-self-end" type="submit" value="Add to cart">
									</div>
								</div>
							</div>
						</form>

					</div>

			<?php endforeach;
			} ?>
		</div>
	</div>

	<footer class="page-footer">
		<p>Security Shop</p>
	</footer>


</body>

</html>
<script src="./js/scripts.js"></script>