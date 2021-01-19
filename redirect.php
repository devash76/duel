<?php
session_start();
include('server.php');

$name2=$_SESSION['username'];
$myq2="SELECT id,balance from users WHERE username='$name2'";
$result=mysqli_query($db,$myq2);
$bal=mysqli_fetch_assoc($result)['balance'];

if ($bal >=20){
   $myq3="UPDATE users SET balance =balance-20 WHERE username='$name2'";
   $res=mysqli_query($db,$myq3);
   header("location: http://localhost:8000"); 
}
else{
   header("location: http://localhost:80/welcome.php"); 
   echo "Not Enough Balance";
}


?>
