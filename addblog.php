<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body style="background-color:rgb(13, 82, 135);">
    <nav class="navbar navbar-expand-lg  bg-dark" >
        <div class="container-fluid" >
          <a class="navbar-brand" href="home.php" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: white;">CoNVo</a>
          <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="feeds.php"style="color: white;">Feeds</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="search.php"style="color: white;">Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="addblog.php" style="color: white;">Add</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                  Account
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="profile.php" >Profile</a></li>
                  <li><a class="dropdown-item" href="logout.php" >Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container mt-9">
        <div class="container-md w-75 col-6 mt-5"style="background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);border-radius:10px;">
            <form class="p-3" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label" style="color:cyan;" >Heading</label>
                  <input type="text" placeholder="Subject" name="head" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                  <div id="emailHelp" class="form-text" style="color:cyan;">A simple Heading.</div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="discus" placeholder="Doubt" id="floatingTextarea2" style="height: 100px" require></textarea>
                    <label for="floatingTextarea2"></label>
                </div>
                
                <button type="submit"name="sub" class="btn btn-primary">Add</button>
              </form>
              <?php

if (isset($_POST['sub'])) {
     
$head = $_POST['head'];
$dis = $_POST['discus'];



if(empty($head) || empty($dis) )
{
  echo (
  "<script>
  alert('please enter some content');
  window.location.href='addblog.php';
  </script>");
  
}
else{
$reg="INSERT INTO `posts`( `user`, `head`, `content`,`date`) VALUES ('$_SESSION[username]','$head','$dis',now())";
$result=mysqli_query($con,$reg);
if (!$result) {
  echo (
    "<script>
    alert('error');
    window.location.href='feeds.php';
    </script>");
 
}
else{
  echo (
    "<script>
    
    window.location.href='feeds.php';
    </script>");
} 
}}

?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>