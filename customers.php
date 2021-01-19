<?php
    include('connection.php');
?>
<html>
    <head>
        <title>
            List of Customers
        </title>
        
    </head>
    <body>
        <form action="customers.php" method="post">
            <label for="id">Customer id</label>
            <input type="number" name="id" id="id">
            &nbsp;
            <label for="name">Customer name</label>
            <input type="text" name="name" id="name">
            &nbsp;
            <input type="submit" name="search" value="search">
        </form>
    
    </body>
</html>