<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'Director')
      {
         $_SESSION['Director_name'] = $row['name'];
         header('location:http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=user_db&table=user_form&pos=0');
      }
      elseif($row['user_type'] == 'Manager')
      {
         $_SESSION['Manager_name'] = $row['name'];
         if($row['email'] == 'kavyashah77990@gmail.com')
         {
            header('location:kavya.html');
         }
      }
      elseif($row['user_type'] == 'Senior')
      {
         $_SESSION['Senior_name'] = $row['name'];
         if($row['email'] == 'patelsnehofficial@gamil.com')
         {
         header('location:Sneh.html');
         }
      }
      elseif($row['user_type'] == 'Analyst')
      {
         $_SESSION['Analyst_name'] = $row['name'];
         header('location:analyst_page.php');
      }
     
   }
   else
   {
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body
        {
            background-image: url('http://localhost/HAKAM/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
  </head>
  
<html lang="en">
<!-- <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div style="background-color:#33475b">
  <nav class="navbar navbar-expand-lg navbar-dark bg-black" style="height:100px; background-color:cornflowerblue; border:5px solid white">
  <a class="navbar-brand" href="#" style="color:black"><h1>Daily Dairy</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="nav-link" href="homepage.html" style="color:white; font-size:20px"><i class="fa fa-home" style="font-size:46px;color:black"></i> Home&emsp;&emsp;&emsp;&emsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register_form.php" style="color:white; padding-top: 08%; font-size:20px"><i class="fa fa-address-card-o" style="font-size:36px;color:black"></i> Register&emsp;&emsp;&emsp;&emsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login_form.php" style="color:white; padding-top: 8.5%; font-size:20px"><i class='far fa-edit' style='font-size:36px;color:black'></i> Login&emsp;&emsp;&emsp;&emsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="homepage.html" style="color:white; padding-top: 8.5%; font-size:20px"><i class="fa fa-power-off" style="font-size:36px;color:black"></i> Logout&emsp;&emsp;&emsp;&emsp;</a>
      </li>

      
     
    </ul>
  </div>
</nav>
      </div>

   <form action="" method="post">
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

<div class="center" style="width: 1200px; height: 600px; background-color:azure; border: 5px solid cornflowerblue; margin-top: 200px">
<h2 style="margin-left: 20px">Login Here:</h2>
<hr style="background-color:blue"><br><br>
   <div class="form-group" style="margin-left: 20px">
    <label for="exampleInputEmail1"><h3>Username</h3></label><br>
    <input type="text" name="email" required placeholder="Mail ID" style="font-size: 25px;"><br><br>
  </div>
  <div class="form-group" style="margin-left: 20px">
    <label for="exampleInputPassword1"><h3>Password</h3></label><br>
    <input type="password" name="password" required placeholder="Password" style="font-size: 25px;">
  </div>
  <br><br>
  <!-- <button type="submit" class="button" value="login now">Log in </button> -->

  <div class="form-group" style="margin-left: 20px">
      <!-- <button> -->
      <input type="submit" name="submit" value="login now" class="form-btn" style="font-size: 25px;">
      <!-- </button> -->
      <p style="font-size: 20px;">Don't have an account? <a href="register_form.php">register now</a></p>
      </div>
   </form>


</body>
</html>