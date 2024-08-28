<?php
include "connection.php";
session_start();
$post=$_GET['cont'];
$i=$_GET['id'];

  
    $qury="INSERT INTO `reports`( `post_id`, `rprt_usr`, `content`, `dates`) VALUES ('$i','$_SESSION[username]','$post',now())";
  $d=mysqli_query($con,$qury);
  if($d){
  echo (
  "<script>
  alert('Reported successfully');
  window.location.href='home.php';
  </script>");
   }

?>