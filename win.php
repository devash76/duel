<?php 
session_start();
include('server.php');

	 $name1=$_SESSION['username'];
     $myq1="UPDATE users SET balance= balance + 40 WHERE username='$name1' ";
     $v2=mysqli_query($db,$myq1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>You Won!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="limages/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lvendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lfonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lvendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="lvendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lvendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="lcss/util.css">
	<link rel="stylesheet" type="text/css" href="lcss/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="limages/i1.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" >
					<?php include('errors.php'); ?>
					<span class="login100-form-title">
						YOU WON!
					</span>

					<div class="wrap-input100 validate-input" >
					<p>Congratulations!</p>
						
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" >
						<a href="welcome.php">
							Homepage
							</a>
						</button>
					</div>
				
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="lvendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/bootstrap/js/popper.js"></script>
	<script src="lvendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="lvendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="ljs/main.js"></script>

</body>
</html>