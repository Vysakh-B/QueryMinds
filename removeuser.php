<?php
include "connection.php";
$ids=$_GET['id'];
 
           $qurry="DELETE FROM `reg_user` WHERE id='$ids'";
           $d=mysqli_query($con,$qurry);
            if ($d) {
              echo (
                   "<script>
               alert('User Removed successful');
                 window.location.href='admin_home_usr.php';
                 </script>");
                  }
                 
                                

                 ?>