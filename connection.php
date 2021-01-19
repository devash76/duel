<?php

$db= mysqli_connect("localhost","root","root","project");

if(isset($_POST['customer']))
{
    $name=mysqli_real_escape_string($db,$_POST['name']);
    $phone=mysqli_real_escape_string($db,$_POST['phone']);
    
    $sql="INSERT INTO customer(Name,Phone) VALUES('$name', '$phone')";
    $result=mysqli_query($db,$sql);

    $sql2="SELECT * FROM customer WHERE Name='$name' AND Phone='$phone' LIMIT 1";
    $result2=mysqli_query($db,$sql2);
    $value = mysqli_fetch_assoc($result2);
    $id=$value['CustID'];
    echo "Your Customer id is '$id' ";

}

if(isset($_POST['vehicle']))
{
    $id=$_POST['id'];
    $desc=$_POST['desc'];
    $year=$_POST['year'];
    $type=$_POST['type'];
    $category=$_POST['category'];
    $sql="INSERT INTO vehicle(`VehicleID`,`Description`,`Year`,`Type`,`Category`) VALUES ('$id','$desc','$year','$type',$category)";
    $result=mysqli_query($db,$sql);
    
}

if(isset($_POST['rent']))
{
    date_default_timezone_set('Asia/Kolkata');
    $date = date('yy-m-d');
    $type=$_POST['type'];
    $category=$_POST['category'];
    $plan=$_POST['plan'];
    $quantity=$_POST['quantity'];
    $start=$_POST['start'];
    $return=$_POST['return'];
    $pt=$_POST['pt'];
    $cid= $_POST['cid'];
    $chk_user="SELECT * FROM customer WHERE CustID='$cid'";
    $customer=mysqli_query($db,$chk_user);
    $num=mysqli_num_rows($customer);
    if($num==0)
    {
          echo "customer does not exists create account.";
    }
else{


    $sql="SELECT * FROM rate WHERE `type`='$type' AND `category`='$category' LIMIT 1";
    $result=mysqli_query($db,$sql);
    $values=mysqli_fetch_assoc($result);
    $daily_rate=$values['daily'];
    $weekly_rate=$values['weekly'];
    $vehicle_id=null;
    $sql2="SELECT * FROM vehicle WHERE `type`='$type' AND `category`='$category' Limit 1";
    $results=mysqli_query($db,$sql2);
    
    foreach ($results as $row) {
        $value=mysqli_fetch_assoc($row);
        $vid = $value['VehicleID'];
        $sql3="SELECT * FROM rental WHERE VehicleID='$vid' LIMIT 1 ";
        $results2=mysqli_query($db,$sql3);
        $num=mysqli_num_rows($results2);

        if($num==0){
            $vehicle_id=$vid;
            break;
        }
        else
        {
            $values1=mysqli_fetch_assoc($results2);
            $ret=$values1['returned'];
            if($returned==1)
            {
                $vehicle_id=$vid;
                break;
            }
        }
      }
    if($vehicle_id==null)
    {
        echo "Required Vehicle is not available currently";
    }
    else
    {
           if($plan==1)
           {
               $price = $daily_rate * $quantity;
               if($pt==0)
               {
                 $query="INSERT INTO rental(`CustID`,`VehicleID`,`StartDate`,`OrderDate`,`RentalType`,`Qty`,`ReturnDate`,`TotalAmount`,`PaymentDate`,`returned`) VALUES($cid,'$vehicle_id','$start','$date','$plan','$quantity','$return','$price',NULL,0)";
                 $run=mysqli_query($db,$query);
               }
               elseif($pt==1)
               {
                $query="INSERT INTO rental(`CustID`,`VehicleID`,`StartDate`,`OrderDate`,`RentalType`,`Qty`,`ReturnDate`,`TotalAmount`,`PaymentDate`,`returned`) VALUES($cid,'$vehicle_id','$start','$date','$plan','$quantity','$return','$price','$date',0)";
                $run=mysqli_query($db,$query);
               }
           }
           elseif($plan==7)
           {
            $price = $weekly_rate * $quantity;
            if($pt==0)
            {
              $query="INSERT INTO rental(`CustID`,`VehicleID`,`StartDate`,`OrderDate`,`RentalType`,`Qty`,`ReturnDate`,`TotalAmount`,`PaymentDate`,`returned`) VALUES($cid,'$vehicle_id','$start','$date','$plan','$quantity','$return','$price',NULL,0)";
              $run=mysqli_query($db,$query);
            }
            elseif($pt==1)
            {
             $query="INSERT INTO rental(`CustID`,`VehicleID`,`StartDate`,`OrderDate`,`RentalType`,`Qty`,`ReturnDate`,`TotalAmount`,`PaymentDate`,`returned`) VALUES($cid,'$vehicle_id','$start','$date','$plan','$quantity','$return','$price','$date',0)";
             $run=mysqli_query($db,$query);
            }
           }
    }
}
}


if(isset($_POST['return_search'])) {

  $name = $_POST['name'];
  $vid = $_POST['vid'];
  $return = $_POST['return'];
  $sql="SELECT * FROM customer WHERE Name='$name' LIMIT 1";
  $result=mysqli_query($db,$sql);
  $value=mysqli_fetch_assoc($result);
  $cid=$value['CustID'];
  $sql2 ="SELECT * FROM rental WHERE CustID='$cid' AND VehicleID='$vid' AND ReturnDate='$return' LIMIT 1";
  $result2=mysqli_query($db,$sql2);
  $value2=mysqli_fetch_assoc($result2);
  if($value2['PaymentDate']==null)
  {
       $due = 0;
  }
  else{
    $due=$value2['TotalAmount'];
  }
  
   
echo "<div>";
echo "<table>";
echo "<tr>";
echo "<th>Customer Id</th>";
echo "<th>Vehicle ID</th>";
echo "<th>Dues</th>";
echo "<th>Return Date</th>";
echo "<th>Return</th>";
echo "</tr>";
echo "<tr>";
echo "<td>$cid</td>";
echo "<td>$vid</td>";
echo "<td>$due</td>";
echo "<td>$return</td>";
echo "<td><a href=http://localhost/index.php?cid=$cid&return=$return&vid=$vid>Return</a></td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}

if(isset($_POST['search']))
{
    $cname=$_POST['name'];
    $cid =$_POST['id'];
    if($cid == null && $cname == null)
    {
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Customer Id</th>";
        echo "<th>Name</th>";
        echo "<th>Dues</th>";
        echo "</tr>";
        $query="SELECT * FROM customer";
        $detail = mysqli_query($db,$query);
        $total =mysqli_num_rows($detail);
    
    
        while($user = $detail->fetch_assoc())
        {
               
           
            $name=$user['Name'];
            $customer_id=$user['CustID'];
            $sum = 0;
            $query2 = "SELECT * FROM rental WHERE CustID='$customer_id' and PaymentDate IS NULL ";
            $details2 = mysqli_query($db,$query2);
            $num=mysqli_num_rows($details2);
            if($num==0)
              {
    
                echo "<tr>";
                echo "<td>$customer_id</td>";
                echo "<td>$name</td>";
                echo "<td> $0 </td>";
                echo "</tr>";
            }
            elseif($num == 1)
            {
            $result= mysqli_fetch_assoc($details2);
            $pd=$result['PaymentDate'];
            $net =  $result['TotalAmount'];
            if ($pd==null)
            {
            $net = 0;
            }
            echo "<tr>";
            echo "<td>$customer_id</td>";
            echo "<td>$name</td>";
            echo "<td>$ $net</td>";
            echo "</tr>";    
            }
            else
            {
                while($u = $details2->fetch_assoc())
                {
                    $sum = $sum + $u['TotalAmount'];
                }
                echo "<tr>";
            echo "<td>$customer_id</td>";
            echo "<td>$name</td>";
            echo "<td>$ $sum</td>";
            echo "</tr>";
            }
        
        }
    
        echo "</table>";
        echo "</div>";
        
    }
    elseif($cid!=null)
    {
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Customer Id</th>";
        echo "<th>Name</th>";
        echo "<th>Dues</th>";
        echo "</tr>";
            $q = "SELECT * from customer WHERE CustID='$cid' LIMIT 1";
            $d=mysqli_query($db,$q);
            $user = mysqli_fetch_assoc($d);
            $name=$user['Name'];
            $customer_id=$cid;
            $sum = 0;
            $query2 = "SELECT * FROM rental WHERE CustID='$customer_id' and PaymentDate IS NULL ";
            $details2 = mysqli_query($db,$query2);
            $num=mysqli_num_rows($details2);
            if($num==0)
              {
    
                echo "<tr>";
                echo "<td>$customer_id</td>";
                echo "<td>$name</td>";
                echo "<td> $0 </td>";
                echo "</tr>";
            }
            elseif($num == 1)
            {
            $result= mysqli_fetch_assoc($details2);
            $pd=$result['PaymentDate'];
            $net =  $result['TotalAmount'];
            if ($pd==null)
            {
            $net = 0;
            }
            echo "<tr>";
            echo "<td>$customer_id</td>";
            echo "<td>$name</td>";
            echo "<td>$ $net</td>";
            echo "</tr>";    
            }
            else
            {
                while($u = $details2->fetch_assoc())
                {
                    $sum = $sum + $u['TotalAmount'];
                }
                echo "<tr>";
            echo "<td>$customer_id</td>";
            echo "<td>$name</td>";
            echo "<td>$ $sum</td>";
            echo "</tr>";
            }
        
        
    
        echo "</table>";
        echo "</div>";
    }

    elseif($cid==null && $cname!=null)
    {
        echo "<div>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Customer Id</th>";
        echo "<th>Name</th>";
        echo "<th>Dues</th>";
        echo "</tr>";
            $q = "SELECT * from customer WHERE Name='$cname' OR Name LIKE '%$cname'  OR Name LIKE '%$cname%'  OR Name LIKE '$cname%'  LIMIT 1";
            $d=mysqli_query($db,$q);
            $user = mysqli_fetch_assoc($d);
            $name=$user['Name'];
            $customer_id=$user['CustID'];
            $sum = 0;
            $query2 = "SELECT * FROM rental WHERE CustID='$customer_id' and PaymentDate IS NULL ";
            $details2 = mysqli_query($db,$query2);
            $num=mysqli_num_rows($details2);
            if($num==0)
              {
    
                echo "<tr>";
                echo "<td>$customer_id</td>";
                echo "<td>$name</td>";
                echo "<td> $0 </td>";
                echo "</tr>";
            }
            elseif($num == 1)
            {
            $result= mysqli_fetch_assoc($details2);
            $pd=$result['PaymentDate'];
            $net =  $result['TotalAmount'];
            if ($pd==null)
            {
            $net = 0;
            }
            echo "<tr>";
            echo "<td>$customer_id</td>";
            echo "<td>$name</td>";
            echo "<td>$ $net</td>";
            echo "</tr>";    
            }
            else
            {
                while($u = $details2->fetch_assoc())
                {
                    $sum = $sum + $u['TotalAmount'];
                }
                echo "<tr>";
            echo "<td>$customer_id</td>";
            echo "<td>$name</td>";
            echo "<td>$ $sum</td>";
            echo "</tr>";
            }
        
        
    
        echo "</table>";
        echo "</div>";
    }
}
?>