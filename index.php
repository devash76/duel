<?php  
include('connection.php');
date_default_timezone_set('Asia/Kolkata');
$date = date('yy-m-d');
$vid=$_GET['vid'];
$cid=$_GET['cid'];
$return=$_GET['return'];
$sql="UPDATE TABLE rental SET returned=1,PaymentDate='$date' WHERE CustID='$cid' AND VehicleID='$vid' AND ReturnDate='$return'";
  ?>
<html>
<head>
<title>
       Car Rental project
</title>
</head>
<body>
<center> <h1> Add Customer</h1>    </center>
<div style="text-align:center;">
<form method="post" action="index.php">
<label for="name">
Enter name: </label>
<input type="text" id="name" name="name">
<br>
<label for="phone">
Enter phone: </label>
<input type="text" id="phone" name="phone">
<br>
<input type="submit" name="customer">
</form>
<br>
<center> <h1> Add Vehicle</h1>    </center>

<form method="post" action="index.php">

<label for="id">
Enter Vehicle id: </label>
<input type="text" id="id" name="id">
<br>
<label for="desc">
Enter description: </label>
<input type="text" id="desc" name="desc">
<br>
<label for="year">
Enter year: </label>
<input type="number" id="year" name="year">
<br>
<label for="type">
Enter type: </label>
<input type="number" id="type" name="type">
<br>
<label for="category">
Enter category: </label>
<input type="number" id="category" name="category">
<br>

<br>
<input type="submit" name="vehicle">
</form>

<br><br><br><br>
<h1>Rent A Car</h1>
<form action="index.php" method="post">

<label for="cid">
Enter Customer id: </label>
<input type="number" id="cid" name="cid">
<br>
<br>
       <label for="type"> Select Type of Vehicle:-</label>
              <select id="type" name="type">
                     <option value="1">Compact</option>
                     <option value="2">Medium</option>
                     <option value="3">Large</option>
                     <option value="4">SUV</option>
                     <option value="5">Truck</option>
                     <option value="6">Van</option>
              </select><br><br>


       <label for="category"> Select Category of Vehicle:-</label>
       <select id="category" name="category">
              <option value="0">Basic</option>
              <option value="1">Luxury</option>
       </select><br><br>


       <label for="plan" > Select plan of Vehicle:-</label>
       <select id="plan" name="plan" onchange="myFunction()">
              <option value="1">Daily</option>
              <option value="7">Weekly</option>
       </select><br><br>


       <label for="quantity">Number of <span id="week">Days</span></label>
       <input type="number" id="quantity" name="quantity">
       <br>
       <br>
       <label for="start">Start date</label>
       <input type="date" data-date="" data-date-format="YYYY MM DD" id="start" name="start">
       <br>
       <br>
       <label for="return">Return date</label>
       <input type="date" data-date="" data-date-format="YYYY MM DD" id="return" name="return">
       <br>
       <br>
       <label for="pt"> Select payment type:-</label>
       <select id="pt" name="pt">
              <option value="0">Pay Later</option>
              <option value="1">Pay Now</option>
       </select><br><br>
       <input type="submit" name="rent">

      

</form>
<br>
<br>
<br>
<br>
<h1>Return car</h1>
<form method="post" action="index.php">
<label for="name">
Enter customer name: </label>
<input type="text" id="name" name="name">
<br><br>
<label for="vid">
Enter Vehicle id: </label>
<input type="text" id="vid" name="vid">
<br><br>
<label for="return">Return date</label>
 <input type="date" data-date="" data-date-format="YYYY MM DD" id="return" name="return">
<br><br>
<input type="submit" name="return_search">
<br><br><br>
</form>
<br>
<a href="customers.php"><h1>Go to Customer Search(Q 5(a))</h1></a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("plan").value;
  if(x==7)
  document.getElementById("week").innerHTML ="Weeks";
  else if(x==1)
  document.getElementById("week").innerHTML ="Days";
}
</script>

</body>

</html>