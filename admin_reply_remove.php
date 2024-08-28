<?php
include "connection.php";
$idr=$_GET['reply_id'];
                   
                            $qurrry="DELETE FROM `replys` WHERE id='$idr'";
        $d=mysqli_query($con,$qurrry);
        if ($d) {
            
                echo (
                    "<script>
                    alert('Removed successful');
                    window.location.href='admin_home_usr.php';
                    </script>");
            
               
            
        }
                         
?>