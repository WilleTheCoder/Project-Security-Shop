<nav class="navbar navbar-expand-md">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php"> <img src="resource/img/swamp-icon.svg" class="swamp-icon" alt="swamp-icon"></i> Swamp Shop</a>
		<div>
			<div>
			
				<ul class="navbar-nav ml-4">
					<?php
					if (isset($_SESSION['name'])) {
						echo " <li class='nav-item'> <a class='nav-link'>" . $_SESSION['name'] . "</a> </li>";
						echo " <li class='nav-item'> <a class='nav-link' href = 'logout.php' > <i class='bi bi-box-arrow-in-right'></i> Logout</a>";
					} else {
						echo "<li class='nav-item'> <a class='nav-link' href='login.php'> <i class='bi bi-box-arrow-in-right'></i> Login</a> </li>";
					} ?>

					</li>
					<?php
					if (!isset($_SESSION['name'])) { ?>
						<li class="nav-item">
							<a class="nav-link" href='register.php'> <i class="bi bi-person-plus"></i> Register</a>
							<p>unsafe</p>
						</li>
					<?php } ?>

					<li class="nav-item">
						<a class="nav-link" href="shop.php"> <i class="bi bi-cart2"></i></i> Cart</a>
					</li>

					<form action="index_unsafe.php" method="get">

						<div class="input-group">
							<input class="form-control" type="text" name="search">
							<input class="btn btn-primary input-group-addon" type="submit" name="search_form_submit" value="Search">

						</div>
					</form>

				</ul>
			</div>
		</div>
	</div>
</nav>