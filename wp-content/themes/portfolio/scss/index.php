<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

	<head>
		<meta name="viewport" content="width=device-width">
		<meta charset="<?php bloginfo('charset'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>
			<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>
		</title>

		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//www.google-analytics.com" rel="dns-prefetch">


	   <!-- Pour créer le favicon et touchicon (remplacer les images) -->
		<link href="<?php bloginfo('template_url'); ?>/img/favicons/favicon.ico" rel="shortcut icon">
		<link href="<?php bloginfo('template_url'); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">




		<!--FAVICON -->

        <?php wp_head(); ?>
		<!-- Pour récupérer les feuilles de styles et scripts injectés par function.php -->
		<script type="text/javascript">

			var map;
			function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
					center: {lat: 45.501738, lng: -73.556747},
					zoom: 15,
					styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"color":"#8c1c1a"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#faba2c"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#5a4517"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#3c7476"}]}]
				});

				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(45.501738, -73.556747),
					map: map,
					title: 'Snazzy!'
				});
			}

		</script>
		<script async defer
				src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPpumbY4ieQKX3ao1Y1JLLP_X5Pm8_ux4&callback=initMap">
		</script>
	</head>
    
<body class="overHide">
	
	<section class="content" id="fullpage">

		<section class="hero section">
			<div class="videoWrapper">
				<!-- Copy & Pasted from YouTube -->
				<iframe width="1920" height="1080" src="https://www.youtube.com/embed/mDkB5Fel9FE?rel=0&autoplay=1&loop=1&controls=0&playlist=mDkB5Fel9FE" frameborder="0" allowfullscreen></iframe>
			</div>
		</section>
	
		<!-- ______ PAGE FEATURED START _____ -->
		<section class="page-1 bgBlanc section page-featured">
				<!-- ______ MENU START _____ -->
			<div class="headerContainer">
					<header class="header">
						<div class="bgRouge"></div>
						<div class="flex-wrapper">
							<div class='bgRouge'><a href='<?php echo home_url();?>'> <img src='<?php bloginfo("template_url"); ?>/img/logoHead.png' alt='logo' id='logoMenu'/></a></div>
							<nav id='menuNav'>
								<ul>
									<li><a class='menuA' href='<?php echo home_url(); ?>/menu'>Food</a></li>
									<li><a class='menuA' href='<?php echo home_url(); ?>/drinks'>Drinks</a></li>
									<li><a class='menuA' href='<?php echo home_url(); ?>/events'>Events</a></li>
									<li><a class='menuA' href='<?php echo home_url(); ?>/gallery'>Gallery</a></li>
									<li><a class='menuA' href='<?php echo home_url(); ?>/#footer'>Contact</a></li>	
								</ul>
							</nav>
						</div>
						<div class="bgGris"></div>
					</header>
			</div><!-- ______ MENU END _____ -->
				
			<div class="vFlex">
				<!-- ______ SECTION DU HAUT START _____ -->
				<div class="bgBlanc upperDiv">
					<div class="flex-wrapper">
						<h1>FEATURED DRINKS</h1>
						<div class="featSec">

							<div class="flex-row">
								<div class="flex-col">
									<div style="background: url('<?php  bloginfo("template_url"); ?>/img/feat-img1.png') center center no-repeat;background-size: cover;"></div>
								</div>
								<div class="flex-col">
									<div style="background: url('<?php  bloginfo("template_url"); ?>/img/feat-img2.png') center center no-repeat;background-size: cover;"></div>
								</div>
								<div class="flex-col">
									<div style="background: url('<?php  bloginfo("template_url"); ?>/img/feat-img3.png') center center no-repeat;background-size: cover;"></div>
								</div>
							</div>
							<div class="flex-row">
								<div class="flex-col">
									<p><span>CAMPFIRE MARGARITA : </span>Sauza 100% bleu agave, cointreau thé fumé hickory, jus de lime frais, guimauves.</p>
								</div>
								<div class="flex-col">
									<p><span>FLYJIN TONIC : </span>Bombay Sapphire East, campari, sirop tonic maison, soda, amers.</p>
								</div>
								<div class="flex-col">
									<p><span>SOUS-VITE : </span>Belvedere pamplemousse, St-Germain, poire asiatique, citron, bulles.</p>
								</div>
							</div>

						</div>
					</div>
				</div><!-- ______ SECTION DU HAUT END _____ -->
				
				<!-- ______ SECTION DU BAS START _____ -->
				<div class="bgGris bottomDiv">
					<section class="wrapper">
						<div id='BreathTest' class="widget">
							<h1>BREATHALIZER</h1>
							<form id='form1'>
								<div>
									<input type="radio" name="sex" value="male" id='male' checked>Male
									<input type="radio" name="sex" value="female" id='female'>Female
								</div>
								<input placeholder="Weight(kg)" min="0" step="1" type="number" name="weight" class='txtBox' id='weight'>
								<br>
								<input placeholder="Number of Drinks" min="0" step="1" type="number" name="drinks"  class='txtBox' id='drinks'>
								<br>
							</form>
							<article style='margin-left:30px'>
								<h2>Percent of Alcohol in your blood:</h2>
								<h2 id='ready'>Results</h2>
								<h2 id='bouton'>Submit</h2>
							</article>
						</div>
						<div id='menuProposition'>
							<ul>
								<li><a href='menu'>SEE THE FOOD MENU</a></li><br>
								<li><a href='drinks'>SEE THE DRINKS MENU</a></li>
							</ul>
						</div>
					</section>
				</div><!-- ______ SECTION DU BAS END _____ -->
			</div>
		</section><!-- ______fin de la page featured _____ -->

		<section class="page-2 section">
		
			
            <div class='slider parallax'>
                <div class="slide" id="slide-1">
                    <div class="content-window" >
                                <div data-type="background" data-speed="2" style="background: url('<?php  bloginfo("template_url"); ?>/img/fille.jpg') center center no-repeat;background-size: cover;height: 100%; width: 100%;"></div>
                    </div>
                    <h1>Things are not what they seem...</h1>
                    <h2><span>Be in the know</span> by consulting our events</h2>	
				</div>
			</div>

		</section>

		<section class="page-3 section">
			<div class="flex-row full-width-flex">
				<div class="bgBlanc"></div>
				<section class="flex-wrapper flex-row">
					<div class='bgBlanc leftContent'>
						<h1>EVENTS TO COME</h1>
						<div>
							<a href='events'><img src='<?php  bloginfo("template_url"); ?>/img/banniere1.jpg' alt='Events2Come'/></a>
						</div>
					</div>
					<div class='bgGris rightContent'>
						<div id='reservation' class="widget">
							<h1>Reservation</h1>
							<form id='form2'>
								<div>
									<img class='icoReservation' src='<?php  bloginfo("template_url"); ?>/img/icon-calendar.svg' alt='date'/>
									<input placeholder="12/12/2012" type="text" name="date" class='txtBox' id='date'>
								</div>
								<div>
									<img class='icoReservation' src='<?php  bloginfo("template_url"); ?>/img/icon-clock.svg' alt='time'/>
									<input placeholder="12:12" type="text" name="time" class='txtBox' id='time'>
								</div>
								<div>
									<img class='icoReservation' src='<?php  bloginfo("template_url"); ?>/img/icon-person.svg' alt='people'/>
									<input placeholder="2 Persons" type="text" name="people" class='txtBox' id='people'>
								</div>
							</form>
							<a class="call-to-action" href="mstonge.dectim.ca/production1">Find a table</a>
						</div>
						<div id='Eventbystyle' class="widget">
							<h1>Event by Style</h1>
							<form id='form3'>
								<div>
									<select name="styleMusic">
										<option value="Music">Music Style</option>
										<option value="rnb">RNB</option>
										<option value="rock">Rock</option>
										<option value="techno">Techno</option>
										<option value="hardcore">Hardcore</option>
										<option value="techno">Metal</option>
										<option value="techno">Classic</option>
										<option value="wubwub">Dubstep</option>
										<option value="classic">Classic</option>
										<option value="reggae">Reggae</option>
									</select>
								</div>
									<span>OR</span>
								<div>
									<select name="favDJ">
										<option value="Music">Favorite DJ</option>
										<option value="dj1">DJ1</option>
										<option value="dj2">DJ2</option>
										<option value="dj3">DJ3</option>
										<option value="dj4">DJ4</option>
									</select>
								</div>

							</form>
							<a class="call-to-action" href="mstonge.dectim.ca/production1">Find a table</a>
						</div>
					</div>
				</section>
				<div class="bgGris"></div>
			</div>
		</section>
		
		<footer class="section">
			<div class="content-window" >
				<div data-type="background" data-speed="2">
					
					<div class="flex-col">
						<section class="map" id="map">
							<h3>MAP GOOGLE</h3>
						</section>

						<section class="mid ">

							<div class="wrapper">
								<div class="flex-row">
									<div class="contactFooter">
										<h1>CONTACT</h1>
										<p>417 rue St-Pierre,</p>
										<p>Vieux-Montréal</p>
										<p>+1 514 564 8881</p>
										<p>rsvp@flyjin.ca</p>
									</div>
															
									<div style='margin:5% 10%;'>
					<?php wd_form_maker(1); ?></div>
								</div>
							</div>
							
						</section>
						
						
						<section class="bottom">
						
							<ul>
								<li><a href='https://facebook.com/flyjinMTL?fref=ts'><img src='<?php bloginfo("template_url"); ?>/img/icon-fb.svg' alt='F'></a></li>
								<li><a href='https://instagram.com/flyjinmontreal/?hl=en'><img src='<?php bloginfo("template_url"); ?>/img/icon-instagram.svg' alt='I'></a></li>
								<li><a href='https://soundcloud.com/flyjinmontreal'><img src='<?php bloginfo("template_url"); ?>/img/icon-soundcloud.svg' alt='S'></a></li>
								<li><a href='https://twitter.com/flyjinmontreal'><img src='<?php bloginfo("template_url"); ?>/img/icon-twiter.svg' alt='T'></a></li>
								<li><a href='https://vimeo.com/flyjinmontreal'><img src='<?php bloginfo("template_url"); ?>/img/icon-vemeo.svg' alt='V'></a></li>
							</ul>
						
							<div id = "copyrights">
								<?php do_action('wpml_add_language_selector'); ?>
								<p id="copyrightFooter">Copyright <a href='http://mstonge.dectim.ca/production1/copyright'>©</a> 2015 Flyjin All rights reserved</p>
							</div>
						</section>
						
					</div>
				</div>
			</div>
		</footer>
	</section>
	<!-- ______ #FULLPAGE END _____ -->
	</body>
</html>