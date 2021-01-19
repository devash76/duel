<?php
session_start();
include('server.php');
/*header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
*/
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$amt="";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
		$db = mysqli_connect('shareddb1d.hosting.stackcp.net', 'duel@2020-363580f4', 'devashish1', 'duel@2020-363580f4');
		$amt=number_format($_POST["TXNAMOUNT"]);
		$name=$_SESSION['username'];
		$myq="UPDATE users SET balance= balance + '$amt' WHERE username= '$name' LIMIT 1";
		$values=mysqli_query($db,$myq);
		
	

	}
	
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

<head>
</head>
<body>

<br>
<br>
<br>
<a href="../welcome.php" class="btn btn-warning">Go To Homepage </a>
</body>
</html>