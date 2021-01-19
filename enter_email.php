<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
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

				<form class="login100-form validate-form" method="post" action="enter_email.php">
					<?php include('errors.php'); ?>
					<span class="login100-form-title">
						Reset Password
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" placeholder="Enter Your Registered Email:">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="reset_password">
							Reset
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