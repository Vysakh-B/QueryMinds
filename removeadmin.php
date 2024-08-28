<?php
include "connection.php";
$ida=$_GET['adminid'];
 
           $qurry="DELETE FROM `admin` WHERE id='$ida'";
           $d=mysqli_query($con,$qurry);
            if ($d) {
              echo (
                   "<script>
               alert('Admin Removed successful');
                 window.location.href='admin_home_usr.php';
                 </script>");
                  }
                 
                                

                 ?>