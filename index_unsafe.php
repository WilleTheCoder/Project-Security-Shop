<?php
// Starting session
session_start();
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$_POST["confirm_password"] = "";
$searched = "";
global $link;
// Prepare a select statement
//if user has searched for anything
if (isset($_GET['search_form_submit'])) {
	$searched = $_GET['search'];

	//A) susceptible to sql-injection BUT WORKS:

	$sql = "SELECT * FROM products WHERE product_name LIKE '%$searched%'";
	$stmt = mysqli_query($link, $sql);

	while ($row = mysqli_fetch_assoc($stmt)) {
		$products[] = $row;
	}
} else {
	$sql = "SELECT * FROM products";
	$stmt = mysqli_prepare($link, $sql);
}
$status = "<script>alert('Product has already added to cart');</script>";
$redirect = "<script> window.location = index.php; </script>";
if (isset($_POST['add_to_cart'])) {

	// Add products to cart
	if (isset($_SESSION['cart'])) { // Look if there is a session ongoing 

		$product_array_id = array_column($_SESSION['cart'], "product_id"); // assign all columns with product_id

		if (in_array($_POST['product_id'], $product_array_id)) { // check if product_id exists in cart
			echo $status; // Tell user product already added
			echo $redirect; // redirect to store.
		} else { // product_id not exist
			$count = count($_SESSION['cart']); // get number of product_ids in cart

			// create array with value of product_id into the key product_id
			$product_array = array(
				'product_id' => $_POST['product_id']
			);

			$_SESSION['cart'][$count] = $product_array; // assign product_array to cart at index $count
		}
		echo $redirect;
	} else { // if empty cart, add product to first index

		// create array with value of product_id into the key product_id
		$product_array = array(
			'product_id' => $_POST['product_id']
		);

		$_SESSION['cart'][0] = $product_array; // assign on first index product_id array
		echo $redirect;
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
		<h2 id="welcome">Check out our cool swamps?!</h2>


		<h4><?php
			if ($searched != "") {
				echo htmlspecialchars("Results for '$searched'");
			}
			?></h4>


		<div class="row py-2">

			<?php if (!(empty($products))) {
				foreach ($products as $product) : ?>
					<div class=" col-12 col-md-12 col-lg-6 col-xl-4 ">
						<form action="" method="post" name="shopping_cart">
							<?php
							echo "<input type='hidden' name='product_id' value=" . $product['id'] . ">"
							?>

							<input id="cart_add_token" type="hidden" value="<?php echo $token; ?>" />


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
												<h2> <?php echo $product['product_name'] ?> </h2>
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
										<input class="btn btn-primary align-self-end" name="add_to_cart" type="submit" value="Add to cart">
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