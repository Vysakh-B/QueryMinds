<?php
include "connection.php";
session_start();
$catch1=$_SESSION['mail'];
// echo($catch1);
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
      
      <div class="container mt-5  ml-3 w-75" style="background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);border-radius:10px;width:fit-content;">
      <form method="post" class="p-3 w-75 mx-4">
        
        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label"  style="color:cyan;">Password</label>
          <input type="password"placeholder="new password" class="form-control" id="exampleInputPassword1" name="pasw">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"  style="color:cyan;">Confirm Password</label>
            <input type="password" placeholder="confirm password" class="form-control" id="exampleInputPassword1" name="pasw1">
          </div>
        <button type="submit" name="check" class="btn btn-primary">Submit</button>
        <!-- <button type="submit" name="cncl" class="btn btn-primary">Cancel</button> -->

        <?php
      if (isset($_POST['check'])) {
      
        
  $password1=$_POST['pasw'];
  $password2=$_POST['pasw1'];
  if($password1==$password2){
    
      $try="UPDATE `reg_user` SET password ='$password1' WHERE email = '$catch1'";
$re=mysqli_query($con,$try);
if($re){
  echo (
    "<script>
    alert('password reset successful');
    window.location.href='signin.php';
    </script>");
}
      }
      
      
     
    
    else {
      echo (
        "<script>
        alert('different password ');
        window.location.href='signin.php';
        </script>");
    }
      }
  
  
      ?>
  
      </form>
      <?php
// if (isset($_POST['check'])) {
//   $password1=$_POST['pasw'];
//   $password2=$_POST['pasw1'];
//   if($password1==$password2){
//     if($phn1==0){
      
//       function remove_prefix($text, $prefix)
// {
//     if (strpos($text, $prefix) === 0) {
//         return substr($text, strlen($prefix));
//     }
//     return $text;
// }
 

// $prefix = "123";
 
// $result = remove_prefix($catch1, $prefix);
// $try="UPDATE `reg_user` SET 'password'='$password1' WHERE 'email' = '$catch1'";
// $re=mysqli_query($con,$try);
// if($re){
//   echo (
//     "<script>
//     alert('password reset successful');
//     window.location.href='signin.php';
//     </script>");
// }

//     }
//     else{
      // function remove_prefixs($text, $prefix)
      // {
      //     if (strpos($text, $prefix) === 0) {
      //         return substr($text, strlen($prefix));
      //     }
      //     return $text;
      // }
       
      
      // $prefix = "248";
       
      // $result = remove_prefixs($catch1, $prefix);
//       $try="UPDATE `reg_user` SET 'password'='$password1' WHERE 'password' = '$catch1'";
// $re=mysqli_query($con,$try);
// if($re){
//   echo (
//     "<script>
//     alert('password changed successfully');
//     window.location.href='signin.php';
//     </script>");
// }

//     }
//   }
//   else{
//     echo (
//       "<script>
//       alert('passwords are different');
//       window.location.href='signin.php';
//       </script>");
//   }

// }
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</body>

</html>