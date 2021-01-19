<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Welcome</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="welcome.php">DUEL</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="welcome.php">Home</a></li>
					<li><a href="wallet.php">Wallet</a></li>
					<li><a href="feedback.php">Feedback</a></li>
					<li><a href="welcome.php?logout='1'" style="color: red;"  class="icon fa-sign-out"><span class="label">logout<span>Logout</a></li>
					<li><a href="https://api.whatsapp.com/send?phone=919120009271&text=I%20am%20a%20visitor%20of%20your%20website" class="icon fa-whatsapp"><span class="label">Contact</span>Contact Us</a> </li>

				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Duel</h1>
					<p>A place where you can endlessly play exciting games and fill your pockets at the same time.</p>
				</div>
				<video autoplay loop muted playsinline src="ah.mov"></video>
			</section>

		<!-- Highlights -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Play And Win!</h2>
						<p>Believe or Not! Playing and earning simulatneously is now possible . Welcome to Duel!</p>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-rocket"><span class="label">Tunnel Master</span></a>
									<h3>Tunnel Master</h3>
								</header>
								<p>peek through the tunnels , leaving behind all the obstacles and go on speeding.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-trello"><span class="label">Tic-Tac-Toe</span></a>
									<h3><a href="redirect.php" >TIC-TAC-TOE</a></h3>
								</header>
								<p>play this standard but amazing game endlessly,win and earn! </p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<a href="#" class="icon fa-btc"><span class="label">Quiz</span></a>
									<h3>Quiz</h3>
								</header>
								<p>Give answers of 7 simple questions as fast as you can. as your score depends upon how fast you give answers.</p>
							</div>
						</section>
					</div>
				</div>
			</section>

		<!-- CTA -->
			<section id="cta" class="wrapper">
				<div class="inner">
					<h2>“Reality is broken. Game designers can fix it.”</h2>
					<p>“real", how I detest that word, so devoid of imagination”</p>
				</div>
			</section>

		<!-- Testimonials -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Karl Kristian Flores, Can I Tell You Something?</h2>
						<p>Sometimes I'd like to leave my room and go see what's out there.Would you like to go with me?.</p>
					</header>
					<div class="testimonials">
						<section>
							<div class="content">
								<blockquote>
									<p>“I like video games, but they're really violent. I'd like to play a video game where you help the people who were shot in all the other games. It'd be called 'Really Busy Hospital.”</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="demetri.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Demetri Martin</strong> </p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>“Over the centuries, mankind has tried many ways of combating the forces of evil... prayer, fasting, good works and so on. Up until Doom, no one seemed to have thought about the double-barrel shotgun. Eat leaden death, demon...”</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="terry.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Terry Pratchett</strong> </p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>“The worst thing a kid can say about homework is that it is too hard. The worst thing a kid can say about a game is it's too easy.”</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="herry.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Henry Jenkins</strong></p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>Praise the sun!</h3>
							<p>The sun went down with practiced bravado. Twilight crawled across the sky, laden with foreboding. I didn’t like the way the show started. But they had given me the best seat in the house. Front row center</p>
						</section>
						<section>
							<h4>T & C :</h4>
							<ul class="alt">
								<li><a href="#">Refund will be initiated in 6 hrs.</a></li>
								<li><a href="#">If someone sends you any link ,inform us.</a></li>
								<li><a href="#">The informer will be rewarded.</a></li>
								<li><a href="#">support@duel.xyz</a></li>
							</ul>
						</section>
						<section>
							<h4>DUEL Group</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
							</ul>
						</section>
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>