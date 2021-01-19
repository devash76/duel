<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$mobile   ="";
$amount   ="";
$amount1  ="";
$errors = array(); 

//Including mail--configuration libraries
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



// connect to the database
$db = mysqli_connect('shareddb1d.hosting.stackcp.net', 'duel@2020-363580f4', 'devashish1', 'duel@2020-363580f4');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $mobile = mysqli_real_escape_string($db, $_POST['mobile']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($mobile)) { array_push($errors, "mobile is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR mobile='$mobile' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {//if email already exists
      array_push($errors, "email already exists");
    }
    if ($user['mobile'] === $mobile) {//is number already exists
        array_push($errors, "Number already exists");
      }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO `users` (`username`, `email`, `password`, `mobile`,`balance`) 
  			  VALUES('$username', '$email', '$password','$mobile','0')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: welcome.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);//md5 hashing of password
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;//storing the username as session variable
          $_SESSION['success'] = "You are now logged in";
          header('location: welcome.php');//after login move to welcome page
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  /*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset_password'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT email FROM users WHERE email='$email'";
  $results = mysqli_query($db, $query);

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($results) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    header('location: pending.php?email=' . $email);
    // store token in the password-reset database table against the user's email
    $sql = "INSERT INTO password_reset(email, token) VALUES ('$email', '$token')";
    $results = mysqli_query($db, $sql);
   
    // Load Composer's autoloader
    require 'vendor/autoload.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp1.example.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'user@example.com';                     // SMTP username
        $mail->Password   = 'secret';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($email);               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
    
      
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset Duel password';
        $mail->Body    = 'Hi there, click on this <a href=\"new_pass.php?token=" . $token . "\">link</a> to reset your password on our site';
        $mail->AltBody = 'Thank You for using Duel.';
    
        $mail->send();
        echo 'Message has been sent';
    
   
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($db, $_POST['new_pass_c']);

  // Grab to token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
    // select email address of user from the password_reset table 
    $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $new_pass = md5($new_pass);
      $sql = "UPDATE users SET password='$new_pass' WHERE email='$email'";
      $results = mysqli_query($db, $sql);
      header('location: login.php');
    }
  }
}

//if a user chooses to take out his/her money to bank
if (isset($_POST['redeem-request'])) {
  $user=$_SESSION['username'];
  $sql = "SELECT id,balance FROM users WHERE username='$user'";
  $result1 = mysqli_query($db,$sql);
  $amount1= mysqli_fetch_assoc($result1)['balance'];
  $balance= $amount1;
  $amount = $_POST['amount'];
  if (empty($amount)) { array_push($errors, "Amount is required"); }

  if ($balance >= $amount) { //checking wether the user has sufficient amount 
        
    $query="INSERT INTO redeem (username,amount)VALUES ('$user',$amount)";
    $results= mysqli_query($db,$query);
    $query2="UPDATE users SET balance = balance - '$amount' WHERE username = '$user' LIMIT 1";
    $results2= mysqli_query($db,$query2);
    echo "Your request will be processed within 6 hrs";

   }
  else{ array_push($errors, "Not enough balance"); }



}

//if the user chooses to give us a feedback
if(isset($_POST["feedback"])){
  $name1 = mysqli_real_escape_string($db, $_POST['name']);
  $email1 = mysqli_real_escape_string($db, $_POST['email']);
  $subject1 = mysqli_real_escape_string($db, $_POST['subject']);
  $message1 = mysqli_real_escape_string($db, $_POST['message']);
  $sq="INSERT INTO feedback (name,email,subject,message) values ($name1,$email1,$subject1,$message1)";
  $value3=mysqli_query($db,$sq);
}
  ?>
  	