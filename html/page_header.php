<link href="https://fonts.cdnfonts.com/css/akira-expanded" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



<!-- Start Header Area -->
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box" style="
				/* <!-- glass morph--> */
				background: rgba(39, 42, 78, 0.57);
				border-radius: 0px 0px 15px 15px;
				box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
				backdrop-filter: blur(5.7px);
				-webkit-backdrop-filter: blur(5.7px);
			">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="index.html">
					<h4 style="
						font-family: 'Akira Expanded', sans-serif;
						padding-top: 10px;
					">
						STKR HUB
					</h4>
					<!-- <img src="img/logo.png" alt=""> -->
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: none; border: none;">
					<span class="icon-bar" style="background-color: white;"></span>
					<span class="icon-bar" style="background-color: white;"></span>
					<span class="icon-bar" style="background-color: white;"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto" style="display: flex;
							
							align-items: center;
						">


						<li class="nav-item <?php echo $header_home ?> ">
							<a class="nav-link" href="index.php">Home</a>
						</li>

						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
								<li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a>
								</li>
								<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
								<li class="nav-item active"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
								<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
							</ul>
						</li>

						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
								<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
							</ul>
						</li>

						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
								<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
								<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
							</ul>
						</li>

						<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>

						<li class="nav-item"></li>

					</ul>

					<ul class="nav navbar-nav menu_nav ml-auto" style="display: flex; align-items: center">

						<?php
						if (isset($_SESSION['user_id'])) {
							$user_id = $_SESSION['user_id'];

							echo '
								<li class="nav-item">
								<a class="nav-link" href="contact.html">
									<span class="cart-icon">
										<i class="fas fa-shopping-cart" style="font-size: 20px;"></i>';

							$sqlCart = "SELECT * FROM cart WHERE user_id = $user_id";
							$resultCart = $conn->query($sqlCart);

							$count = 0;

							while ($fetchedCart = $resultCart->fetch_assoc()) {
								$cart_id = $fetchedCart['cart_id'];
								$count++; //
							}


							echo '<span class="cart-count">(' . $count . ')</span>
									</span>
								</a>
							</li>
								';
						} else {
							echo '
								
								';
						}
						?>




						<li class="nav-item" style="display: flex; align-items: center;">

							<?php
							if (isset($_SESSION['user_id'])) {
								$user_id = $_SESSION['user_id'];

								$avatar = "SELECT * FROM users WHERE user_id = $user_id";
								$result = $conn->query($avatar);
								while ($fetchedAvatar = $result->fetch_assoc()) {
									$avatar = $fetchedAvatar['avatar'];
									$username = $fetchedAvatar['username'];

									$firstLetter = substr($username, 0, 1);
								}

								if (!is_null($avatar)) {
									echo '
									<a class="nav-link" href="user_profile_testing.php">
										<div style="position: relative; display: inline-block; width: 37px; height: 37px; border-radius: 50%; background-color: #333;">
											<img src="' . $avatar . '" alt="" style="
													position: absolute;
													top: 0;
													left: 0;

													height: 100%;
													width: 100%;
													object-fit: cover;
													border-radius: 50%;
											">

										</div>
									</a>
									';
								} else {
									echo '
									<a class="nav-link" href="user_profile.php">
										<div style="position: relative; display: flex; justify-content: center; align-items: center; width: 37px; height: 37px; border-radius: 50%;
										background: rgb(38,211,224);
										background: linear-gradient(90deg, rgba(38,211,224,1) 0%, rgba(182,96,232,1) 100%);">
											<p style="font-family: sans-serif; font-weight: bold; font-size:17px; padding-top: 18px;">'.$firstLetter.'</p>

										</div>
									</a>
									';
								}
							} else {
								echo '
								<a class="primary-btn keychainify-checked" href="#" style="left: 0px; line-height: 20px; width:auto; font-size: 14px;">Login / Sign Up</a>
								';
							}
							?>


						</li>

					</ul>



				</div>
			</div>
		</nav>
	</div>
	<!-- <div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div> -->
</header>
<!-- End Header Area -->