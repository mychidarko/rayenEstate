<?php 
	require "php/connection.php";
	session_start();
	if (!isset($_GET['id'])) {
		header('location: listings.php');
	}
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
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/single.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
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
					<li><a href="about.php">About us</a></li>
					<li class="active"><a href="listings.php">Listings</a></li>
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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/listings.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">Listings</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->

	<div class="search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
						<div class="search_form_container">
							<form action="#" class="search_form" id="search_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
										<input type="text" class="search_input" placeholder="Property type" required="required">
										<input type="text" class="search_input" placeholder="No rooms" required="required">
										<input type="text" class="search_input" placeholder="Location" required="required">
									</div>
									<button class="search_button">Search</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Listing -->

	<div class="listing_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<?php 
						$id = $_GET['id'];
						$query = "SELECT * FROM listings WHERE id = '$id'";
						$listing = mysqli_query($connection, $query);
						$listing = mysqli_fetch_assoc($listing);
					
						echo '
							

								<!--
								<div class="listing_tabs d-flex flex-row align-items-start justify-content-between flex-wrap">

									
									<div class="tab">
										<input type="radio" id="tab_1" name="listing_tabs" checked>
										<label for="tab_1"></label>
										<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
											<div class="tab_icon"><img src="images/house.svg" class="svg" alt=""></div>
											<span>open house</span>
										</div>
									</div>

									
									<div class="tab">
										<input type="radio" id="tab_2" name="listing_tabs">
										<label for="tab_2"></label>
										<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
											<div class="tab_icon"><img src="images/houses.svg" class="svg" alt=""></div>
											<span>features</span>
										</div>
									</div>

									
									<div class="tab">
										<input type="radio" id="tab_3" name="listing_tabs">
										<label for="tab_3"></label>
										<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
											<div class="tab_icon"><img src="images/house2.svg" class="svg" alt=""></div>
											<span>photos</span>
										</div>
									</div>

									
									<div class="tab">
										<input type="radio" id="tab_4" name="listing_tabs">
										<label for="tab_4"></label>
										<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
											<div class="tab_icon"><img src="images/camera.svg" class="svg" alt=""></div>
											<span>video</span>
										</div>
									</div>

									
									<div class="tab">
										<input type="radio" id="tab_5" name="listing_tabs">
										<label for="tab_5"></label>
										<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
											<div class="tab_icon"><img src="images/directions.svg" class="svg" alt=""></div>
											<span>nearby amenities</span>
										</div>
									</div>

									
									<div class="tab">
										<input type="radio" id="tab_6" name="listing_tabs">
										<label for="tab_6"></label>
										<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
											<div class="tab_icon"><img src="images/location.svg" class="svg" alt=""></div>
											<span>location</span>
										</div>
									</div>

									
									<div class="tab">
										<input type="radio" id="tab_7" name="listing_tabs">
										<label for="tab_7"></label>
										<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
											<div class="tab_icon"><img src="images/contract.svg" class="svg" alt=""></div>
											<span>contact</span>
										</div>
									</div>

								</div>-->

								<!-- About -->
								<div class="about">
									<div class="row">
										<div class="col-lg-6">
											<div class="property_info">
												<div class="tag_price listing_price">GH¢ '.$listing['price'].'</div>
												<div class="listing_name"><h1>'.$listing["name"].'</h1></div>
												<div class="listing_location d-flex flex-row align-items-start justify-content-start">
													<img src="images/icon_1.png" alt="">
													<span>'.$listing["location"].'</span>
												</div>
												<div class="listing_list">
													<ul>
														<li>Property ID: 643682</li>
														<li>Posted on: '.$listing["created_at"].'</li>
														<li>Verified: '.$listing["verified"].'</li>
													</ul>
												</div>
												<div class="prop_agent d-flex flex-row align-items-center justify-content-start">
													<div class="prop_agent_image"><img src="images/agent_1.jpg" alt=""></div>
													<div class="prop_agent_name"><a href="#">'.$listing["email"].',</a> Agent</div>
												</div>
												<div class="prop_info">
													<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
														<li class="d-flex flex-row align-items-center justify-content-start">
															<img src="images/icon_2_large.png" alt="">
															<div>
																<div>'.$listing["property_dimensions"].'</div>
																<div>meters</div>
															</div>
														</li>
														<li class="d-flex flex-row align-items-center justify-content-start">
															<img src="images/icon_3_large.png" alt="">
															<div>
																<div>'.$listing["bathrooms"].'</div>
																<div>baths</div>
															</div>
														</li>
														<li class="d-flex flex-row align-items-center justify-content-start">
															<img src="images/icon_4_large.png" alt="">
															<div>
																<div>'.$listing["bedrooms"].'</div>
																<div>beds</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="listing_image"><img src="agent/uploads/'.$listing['img_name'].'" alt="Property Picture"></div>
											<div class="about_text">
												<p>'.$listing["description"].'</p>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="listing_features">
												<div class="listing_title"><h3>Features</h3></div>
												<div class="row">
													<div class="col-lg-6">
														<ul>
															<li>2 car garages</li>
															<li>3 bedrooms</li>
															<li>heated floors</li>
															<li>contemporary architecture</li>
															<li>swimming pool</li>
															<li>exercise room</li>
															<li>formal entry</li>
														</ul>
													</div>
													<div class="col-lg-6">
														<ul>
															<li>patio</li>
															<li>close to stores</li>
															<li>ocean view</li>
															<li>spa</li>
															<li>sprinklers</li>
															<li>garden</li>
															<li>alley</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="listing_video">
												<div class="listing_title"><h3>Video</h3></div>
												<div class="video_container d-flex flex-column align-items-center justify-content-center">
													<img src="images/video.jpg" alt="">
													<div class="video_button"><a class="youtube" href="https://www.youtube.com/embed/IV3ueyrp5M4?autoplay=1"><i class="fa fa-play" aria-hidden="true"></i></a></div>
												</div>
											</div>
										</div>
									</div>		
								</div>
						';
					
					?>
					<div class="google_map_container">
						<div class="map">
							<div id="google_map" class="google_map">
								<div class="map_container">
									<div id="map"></div>
								</div>
							</div>
						</div>
					</div>
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/single.js"></script>
</body>
</html>