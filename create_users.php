<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
*{
  overflow: hidden;
}
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background-color:rgb(8, 27, 55);
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 8px 32px 0 rgb(8, 27, 55);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<body style="background-color:rgb(13, 82, 135);">
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin_home_usr.php" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">CoNVo</a>
        <!-- <div class="box">
            <button class="btn btn-outline-success me-2 " type="button" ><a style="text-decoration:none" href="signup.php">Sign up</a></button>
            <button class="btn btn-outline-success me-2" type="button"><a style="text-decoration:none" href="signin.php">Sign in</a></button>
        </div> -->
    </div>
</nav>
    <div class="login-page ">
        <div class="form">
          <!-- <form class="register-form" method="post">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
          </form> -->
          <form class="login-form" method="post">
          <input type="text" placeholder="batch" name="batch" required/>
            <input type="text" placeholder="username" name="user" required/>
            <input type="email" placeholder="email" name="email" required/>
            <input type="password" placeholder="password" name="pass" required/>
            <button type="submit" name="register">Register</button>
            <!-- <p class="message">Registered? <a href="signin.php">Login</a></p> -->
          </form>
        </div>
      </div>
      <?php

if (isset($_POST['register'])) {
 $btch=$_POST['batch'];    
$user = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['pass'];

$chk="SELECT * FROM `reg_user` where user_name like '%$user%'";
$results1=mysqli_query($con,$chk);
if ($results1) {
  $alls = mysqli_fetch_assoc($results1);
  if(mysqli_num_rows($results1)>=0){
    if($user!=$alls['user_name'])
    {
      
      $reg="INSERT INTO `reg_user`(`batch`, `user_name`, `email`, `password`) VALUES ('$btch','$user','$email','$password')";
      $result=mysqli_query($con,$reg);
      if ($result) {
         echo (
        "<script>
        alert('Registration Succesful');
        window.location.href='admin_home_usr.php';
        </script>");
       
      } else {
         echo (
        "<script>
        alert('error');
        </script>");
      }
      }
      else {
        echo (
          "<script>
          alert('That username already exist try another one');
          window.location.href='signup.php';
          </script>");
      }
  }
}
}

   



?>
</body>
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
     });
</script>
</html>
