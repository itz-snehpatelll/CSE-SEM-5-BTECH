<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         echo '<script type="text/javascript">';
echo ' alert("Registration Succesful!")';  //not showing an alert box.
echo '</script>';
         // header('location:login_form.php');
      }
   }

}


?>

<!DOCTYPE html>
<html lang="en">
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

    <title>PHP Register system!</title>
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
<!-- <div class="form-container"> -->

   <form action="" method="post">
      <!-- <h3>register now</h3> -->
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <!-- 
      <input type="email" name="email" required placeholder="enter your email">
      
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p> -->
      <div class="container" style="background-color:azure; border: 5px solid cornflowerblue; margin-top: 100px">
<h2>Register Here:</h2>
<hr style="background-color:blue">
<div class="form-group" style="margin-left: 20px">
      <label for="inputEmail4"><h3>Name</h3></label><br>
      <input type="text" name="name" required placeholder="Name" style="font-size: 20px;">
    </div>
    <div class="form-group" style="margin-left: 20px">
      <label for="inputEmail4"><h3>Email</h3></label><br>
      <input type="email" name="email" required placeholder="enter your email" style="font-size: 20px;">
    </div>
    <div class="form-group" style="margin-left: 20px">
      <label for="inputPassword4"><h3>Password</h3></label><br>
      <input type="password" name="password" required placeholder="Password" style="font-size: 20px;">
    </div>

    <div class="form-group" style="margin-left: 20px">
      <label for="inputPassword4"><h3>Confirm Password</h3></label><br>
      <input type="password" name="cpassword" required placeholder="Password" style="font-size: 20px;">
    </div>
  
    <!-- <div class="form-group" style="margin-left: 20px">
      <label for="inputPassword4"><h3>Confirm Password<h3></label><br>
      <input type="password" name="cpassword" required placeholder="Confirm Password" style="font-size: 202020px;">
    </div> -->
  
    <div class="form-group" style="margin-left: 20px">
    <lable><h3>Role: </h3></lable>
    <select name="user_type" style="font-size: 20px;">
         <option value="Director">Director</option>
         <option value="Manager">Manager</option>
         <option value="Senior">Senior</option>
         <option value="Analyst">Analyst</option>
      </select>
    </div>
    
    
  <br>
  <div class="form-group" style="margin-left: 20px">
  <input type="submit" name="submit" value="register now" class="form-btn" style="font-size: 20px;">
      <p style="font-size: 20px;">Already have an account? <a href="login_form.php">login now</a></p>
      </div>

   </form>


</body>
</html>