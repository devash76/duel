<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>
Add Money
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
        body{ font: 14px sans-serif;background-color:#e0bbe4; }
        .wrapper{ width: 350px; margin-left:auto ; margin-right: auto; margin-top:100px  ;  background-color:#ffffff ; text-align:center;
            padding-top:0px; }
        .top{font:72px monospace; margin-left:auto; margin-right:auto; margin-top:10px;text-align:center;padding-bottom:0px;height:50px;}
    </style>
</head>
<body>
<div class="top">Duel</div>
<div class="wrapper"><?php

$net_amount = $_POST['amount'];

echo $net_amount;

?>
</div>
</body>
</html>
