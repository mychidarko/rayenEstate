<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Rayen Real Estate</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Rayen Real Estate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link rel="stylesheet" type="text/css" href="styles/about.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">
</head>
<body>

<div class="super_container">
	<div class="super_overlay"></div>
	<!-- Header -->

	<header class="header">
		<div class="header_bar d-flex flex-row align-items-center justify-content-start">
			<div class="header_list">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<!-- Phone -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/phone-call.svg" alt=""></div>
						<span>0207984983</span>
					</li>
					<!-- Address -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/placeholder.svg" alt=""></div>
						<span>address</span>
					</li>
					<!-- Email -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/envelope.svg" alt=""></div>
						<span>rayenrealestate@gmail.com</span>
					</li>
				</ul>
			</div>
			<div class="ml-auto d-flex flex-row align-items-center justify-content-start">
				<div class="social">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#"><img src="images/logo.png" style="width: 120px; height: 50px;"></a></div>
			<div style="flex: 1;"></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="about.php">About us</a></li>
					<li><a href="listings.php">Listings</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
			<?php 
				if (isset($_SESSION['id'])) {
					echo '<div class="ml-auto">
						<a href="profile.php" style="margin: 0px 40px; display: flex; justify-content: flex-start; align-items: center;" class="nav-profile-link-text">
							<img src="images/realtor_2.jpg" class="nav-profile-image">
							'.$_SESSION["username"].'
						</a>
					</div>';
				}  else {
					echo '
						<div class="ml-auto">
							<a href="auth/register.php" style="margin: 0px 40px;">SIGN UP</a>
						</div>
						<div class="submit ml-auto"><a href="auth/login.php">LOGIN</a></div>
					';
				}
			?>
			<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</div>

	</header>

	<!-- Menu -->

	<div class="menu text-right">
		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="menu_log_reg">
			<nav class="menu_nav">
                <ul>
					<?php 
					echo isset($_SESSION['id']) ? '
					<li>
                        <a href="profile.php" style="margin-bottom: 50px; display: flex; justify-content: flex-end; align-items: center;">
                            <img src="images/realtor_2.jpg" class="nav-profile-image">
                            <span>'.$_SESSION["username"].'</span>
                        </a>
					</li>' : '';
					?>
                </ul>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About us</a></li>
					<li><a href="listings.php">Listings</a></li>
					<li><a href="contact.php">Contact</a></li>
                </ul>
                <br>
                <br>
                <ul>
                    <li><a href="php/logout.php">Logout</a></li>
                </ul>
			</nav>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/about.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">About us</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Intro -->

	<div class="intro">
		<div class="container">
			<div class="row row-eq-height">
				
				<!-- Intro Content -->
				<div class="col-lg-6">
					<div class="intro_content">
						<div class="section_title_container">
							<div class="section_title"><h1>Who we are</h1></div>
						</div>
						<div class="intro_text">
							<p>Rayen Real Estate is a real estate company that deals with purchase, sales and renting of lands, houses, offices and other property. We bring to your doorstep the best and most affordable property from all over Ghana. Join Rayen today.</p>
						</div>
						<div class="button intro_button"><a href="#">read more</a></div>
					</div>
				</div>

				<!-- Intro Image -->
				<div class="col-lg-6 intro_col">
					<div class="intro_image">
						<div class="background_image" style="background-image:url(images/intro.jpg)"></div>
						<img src="images/intro.jpg" alt="">
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_title"><h1>Services</h1></div>
					</div>
				</div>
			</div>
			<div class="row services_row">
				
				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_1.png" alt="">
							</div>
							<div class="service_title"><h3>Consulting</h3></div>
						</div>
						<div class="service_text">
							<p>Nulla aliquet bibendum sem, non placer risus venenatis at. Prae sent vulputate bibendum dictum.</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_2.png" alt="">
							</div>
							<div class="service_title"><h3>Real estate sales</h3></div>
						</div>
						<div class="service_text">
							<p>Aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula.</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_3.png" alt="">
							</div>
							<div class="service_title"><h3>Renting</h3></div>
						</div>
						<div class="service_text">
							<p>Nulla aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum.</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_4.png" alt="">
							</div>
							<div class="service_title"><h3>Refurbishing</h3></div>
						</div>
						<div class="service_text">
							<p>Aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula.</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_5.png" alt="">
							</div>
							<div class="service_title"><h3>Evaluation</h3></div>
						</div>
						<div class="service_text">
							<p>Bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula.</p>
						</div>
					</div>
				</div>

				<!-- Service -->
				<div class="col-xl-4 col-md-6">
					<div class="service">
						<div class="service_title_container d-flex flex-row align-items-center justify-content-start">
							<div class="service_icon d-flex flex-column align-items-start justify-content-center">
								<img src="images/service_6.png" alt="">
							</div>
							<div class="service_title"><h3>Price Consulting</h3></div>
						</div>
						<div class="service_text">
							<p>Aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	

	<!-- Agents -->

	<div class="agents">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">the best deals</div>
						<div class="section_title"><h1>Our Realtors</h1></div>
					</div>
				</div>
			</div>
			<div class="row agents_row">
				
				<!-- Agent -->
				<div class="col-lg-4 agent_col">
					<div class="agent">
						<div class="agent_image"><img src="images/realtor_1.jpg" alt=""></div>
						<div class="agent_content">
							<div class="agent_name"><a href="#">Michael Smith</a></div>
							<div class="agent_title">Buying Agent</div>
							<div class="agent_list">
								<ul>
									<li>email</li>
									<li>number</li>
								</ul>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Agent -->
				<div class="col-lg-4 agent_col">
					<div class="agent">
						<div class="agent_image"><img src="images/realtor_2.jpg" alt=""></div>
						<div class="agent_content">
							<div class="agent_name"><a href="#">Jane Williams</a></div>
							<div class="agent_title">Buying Agent</div>
							<div class="agent_list">
								<ul>
									<li>email</li>
									<li>number</li>
								</ul>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Agent -->
				<div class="col-lg-4 agent_col">
					<div class="agent">
						<div class="agent_image"><img src="images/realtor_3.jpg" alt=""></div>
						<div class="agent_content">
							<div class="agent_name"><a href="#">Carla Brown</a></div>
							<div class="agent_title">Buying Agent</div>
							<div class="agent_list">
								<ul>
									<li>email</li>
									<li>number</li>
								</ul>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row contact_row">
				<div class="col">
					<div class="button ml-auto mr-auto"><a href="#">contact us</a></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">
	
					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_about">
							<div class="footer_logo"><a href="#"><span>Rayen Estates</span></a></div>
							<div class="footer_text">
								<p>Nulla aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum
									dictum. Cras at vehicula urna. Suspendisse fringilla lobortis justo, ut tempor leo
									cursus in.</p>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							<div class="footer_submit"><a href="#">submit listing</a></div>
						</div>
					</div>
	
					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_column">
							<div class="footer_title">Information</div>
							<div class="footer_info">
								<ul>
									<!-- Phone -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/phone-call.svg" alt=""></div>
										<span>0207984983</span>
									</li>
									<!-- Address -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/placeholder.svg" alt=""></div>
										<span>address</span>
									</li>
									<!-- Email -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/envelope.svg" alt=""></div>
										<span>rayenrealestate@gmail.com</span>
									</li>
								</ul>
							</div>
							<div class="footer_links usefull_links">
								<div class="footer_title">Useful Links</div>
								<ul>
									<li><a href="#">Listings</a></li>
									<li><a href="#">Featured Properties</a></li>
									<li><a href="#">Contact Agents</a></li>
									<li><a href="#">About us</a></li>
								</ul>
							</div>
						</div>
					</div>
	
					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_links">
							<div class="footer_title">Properties Types</div>
							<ul>
								<li><a href="#">Properties for rent</a></li>
								<li><a href="#">Properties for sale</a></li>
								<li><a href="#">Commercial</a></li>
								<li><a href="#">Homes</a></li>
								<li><a href="#">Villas</a></li>
								<li><a href="#">Office</a></li>
								<li><a href="#">Residential</a></li>
								<li><a href="#">Appartments</a></li>
								<li><a href="#">Off plan</a></li>
							</ul>
						</div>
					</div>
	
					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_title">Featured Property</div>
						<div class="listing_small">
							<div class="listing_small_image">
								<div>
									<img src="images/listing_1.jpg" alt="">
								</div>
								<div
									class="listing_small_tags d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="listing_small_tag tag_house"><a href="listings.php">house</a></div>
									<div class="listing_small_tag tag_sale"><a href="listings.php">for sale</a></div>
								</div>
								<div class="listing_small_price">GH¢ 562 346</div>
							</div>
							<div class="listing_small_content">
								<div class="listing_small_location d-flex flex-row align-items-start justify-content-start">
									<img src="images/icon_1.png" alt="">
									<a href="single.php">280 Doe Meadow Drive Landover, MD 20785</a>
								</div>
								<div class="listing_small_info">
									<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="images/icon_3.png" alt="">
											<span>2</span>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="images/icon_4.png" alt="">
											<span>5</span>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="images/icon_5.png" alt="">
											<span>2</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
	
				</div>
			</div>
		</div>
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div
							class="footer_bar_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="copyright order-md-1 order-2">
								<!-- Link back to Michael Darko-Duodu can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;
								<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
									href="https://Michael Darko-Duodu.com" target="_blank">Michael Darko-Duodu</a>
								<!-- Link back to Michael Darko-Duodu can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
							<nav class="footer_nav order-md-2 order-1 ml-md-auto">
								<ul
									class="d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
									<li><a href="index.php">Home</a></li>
									<li><a href="about.php">About us</a></li>
									<li><a href="listings.php">Listings</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/about.js"></script>
</body>
</html>