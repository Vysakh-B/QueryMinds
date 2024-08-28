<?php
include "connection.php";
session_start();
// $em="123";
// $ps="248";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Profile</title>
</head>

<body style="background-color:rgb(13, 82, 135);">

    <nav class="navbar bg-dark">
        <div class="container">
          <a class="navbar-brand" href="home.php" style="color:white">
          
          <h3>CoNVo</h3>
          
          </a>
        </div>
      </nav>
      <?php
      // $val=$_GET['forgot'];
      ?>
      
      <div class="container mt-5  ml-3 w-75" style="background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);border-radius:10px;width:fit-content;">
      <form method="post" class="p-3 w-75 mx-4" action="">
        
        <div class="mb-3 ">
            
            <label for="exampleInputEmail1" class="form-label" style="color:cyan;">Registered Email </label>
              
            <input type="email" name="milt1" placeholder="Email" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp">
           
           
          </div>
        <!-- <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label"  style="color:cyan;">Password</label>
          <input type="password"placeholder="********" class="form-control" id="exampleInputPassword1" name="passs1">
        </div> -->
        <!-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"  style="color:cyan;">Confirm Password</label>
            <input type="password"placeholder="********" class="form-control" id="exampleInputPassword1" name="passs2">
          </div> -->
          <?php
        echo('<button type="submit" name="edtx" class="btn btn-primary">Submit</button>');
        ?>
        <!-- <button type="submit" name="cncl" class="btn btn-primary">Cancel</button> -->
<?php


if (isset($_POST['edtx'])) {
    $em=$_POST['milt1'];
    $qwerty="SELECT * FROM `reg_user` WHERE email='$em'";
    $relt=mysqli_query($con,$qwerty);
    if($relt){
    if(mysqli_num_rows($relt)>0){
      $_SESSION['mail']="$em";
      header('Location:check.php');
    }
    else{
      // $emailchk=$em+$emailchk;
      echo (
        "<script>
        alert('Email is Not Valid');
        window.location.href='forgot_settings.php';
        </script>");
    }
    
  }
    
    
    
    
  }
  
  
  
// $try="UPDATE `reg_user` SET email='$mail', password ='$pass1' WHERE user_name = '$_SESSION[username]'";
//   $check=mysqli_query($con,$try);
  
//   if ($check) {
//     if ($flag==1) {
      
//         echo (
//           "<script>
//           alert('profile edited successful password will be same as exist');
//           window.location.href='home.php';
//           </script>");
//     }
//     else {
//       echo (
//         "<script>
//         alert('profile edited successful.');
//         window.location.href='home.php';
//         </script>");
//     }
    
//   }
  
// }
// if (isset($_POST['cncl'])) {
//   echo (
//     "<script>
//     alert('you make no change in your details');
//     window.location.href='home.php';
//     </script>");
// }
?>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</body>

</html>