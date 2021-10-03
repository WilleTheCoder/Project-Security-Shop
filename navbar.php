<nav class="navbar navbar-expand-md">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"> <i class="bi bi-file-earmark-lock-fill"></i> Security Shop</a>
			<div>
				<ul class="navbar-nav justify-content-end">

					<form action="index.php" method="get">
					Search <input type="text" name="search"><input type ="submit" name="search_form_submit" value="Send">
					</form>

					<?php
					if (isset($_SESSION['name'])) {
						echo " <li class='nav-item'> <a class='nav-link'>" . $_SESSION['name'] . "</a> </li>";
						echo " <li class='nav-item'> <a class='nav-link' href = 'logout.php' > <i class='bi bi-box-arrow-in-right'></i> Logout</a>";
					} else {
						echo "<a class='nav-link' href='login.php'> <i class='bi bi-box-arrow-in-right'></i> Login</a>";
					} ?>

					</li>
					<?php
					if (!isset($_SESSION['name'])) { ?>
						<li class="nav-item">
							<a class="nav-link" href='register.php'> <i class="bi bi-person-plus"></i> Register</a>
						</li>
					<?php } ?>

					<li class="nav-item">
						<a class="nav-link" href="shop.php"> <i class="bi bi-cart2"></i></i> Cart</a>
					</li>

				</ul>
			</div>

		</div>
	</nav>