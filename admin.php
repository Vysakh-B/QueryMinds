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
border-radius: 10px;
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
  background-color:rgb(13, 82, 135);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<body>
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Anything</a>
        <div class="box p-2" style="color:white;font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
            Admin
        </div>
    </div>
</nav>
    
    <div class="login-page">
        <div class="form">
          <!-- <form class="register-form" method="post">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
          </form> -->
          <form class="login-form" method="post">
            
            <input type="text" placeholder="username" name="user"/>
            <input type="password" placeholder="password" name="pass"/>
            <button type="submit" name="subb"> Login</button>
            
          </form>
          <?php
session_start();
// $_SESSION['logged_in']=false;
$_SESSION['user_name']="";
include("connection.php");
if (isset($_POST['subb'])) {
$user = $_POST['user'];
$password = $_POST['pass'];
$s="SELECT * FROM `admin` WHERE user='$user' && password = '$password'";

$result=mysqli_query($con,$s);
if($result){
  // $result_fetch=mysqli_fetch_assoc($result);
  // print_r($result);
  $name=mysqli_fetch_assoc($result);
  $num=mysqli_num_rows($result);
  if ( $num==1) 
  {
    $_SESSION['logged_in']=true;
    $_SESSION['username']=$name['user'];

  echo (
        "<script>
        alert('Admin signin successful');
        window.location.href='admin_home_usr.php';
        </script>");
   
}else {
   echo("<script>
   alert('signin false');
   window.location.href='admin.php';
   </script>");
}
}}
  
?>
        </div>
      </div>
</body>
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
     });
</script>
</html>