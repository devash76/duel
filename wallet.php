<?php
session_start(); 
include('server.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit;
}
?>

<head>
	<title>Wallet </title>
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
<style>
#div1{
font-size:18px;
background-color:#00e500;
border-radius:10px;
text-align:center;
border: 4px #000000;
padding:4px;
}

#div2{
font-size:18px;
background-color:#00e500;
border-radius:10px;
text-align:center;
border: 4px #000000;
padding:4px;
}
</style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="limages/i1.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form">
			
					<span class="login100-form-title">
						<h1>Wallet</h1>
					</span>

					<div class="wrap-input100 validate-input" >
						<h3>
                        <?php

                        $user=$_SESSION['username'];
                        $sql = "SELECT id,balance FROM users WHERE username='$user'";
                        $result = $db->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo "Balance: " . $row["balance"]. "<br>";
                          }
                        } 

                        ?>
                        </h3>
					</div>
					
					<div class="container-login100-form-btn" id="div1">
						<a href="TxnTest.php">Add Money</a>
					</div>
                    <br>
                    <div class="container-login100-form-btn" id="div2">
						<a href="redeem.php" >
                        Redeem 
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