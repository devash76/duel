
<?php include('server.php') //include server connection file ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration </title>
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

				<form class="login100-form validate-form" method="post" action="register.php">
					<?php include('errors.php'); ?>
					<span class="login100-form-title">
						Member Register
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" value="<?php echo $username; ?>" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" value="<?php echo $email; ?>" placeholder="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="mobile" placeholder="Paytm No.">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-mobile" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password_1" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password_2" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="reg_user">
							Register
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Already Registered?
						</span>
						<a class="txt2" href="login.php">
							Sign In
						</a>
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