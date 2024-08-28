<?php
include "connection.php";
$idss=$_GET['id'];
$ridss=$_GET['rprt'];

 
           $qurry="DELETE FROM `posts` WHERE id='$idss'";
           $qurry1="DELETE FROM `reports` WHERE id='$ridss'";
           $d=mysqli_query($con,$qurry);
           $d3=mysqli_query($con,$qurry1);

            if ($d && $d3) {
              echo (
                   "<script>
               alert('post Removed successful');
                 window.location.href='admin_home_usr.php';
                 </script>");
                  }
                 
                                

                 ?>