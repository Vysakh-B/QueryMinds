<?php
include "connection.php";
$ids=$_GET['id'];
                   
                            $qurry="DELETE FROM `posts` WHERE id='$ids'";
        $d=mysqli_query($con,$qurry);
        if ($d) {
            $rest="DELETE FROM `replys` WHERE post_id='$ids'";
            $pod=mysqli_query($con,$rest);
            if($pod){
                $prtrest="DELETE FROM `reports` WHERE post_id='$ids'";
            $prtpod=mysqli_query($con,$prtrest);
            if($prtpod){
                echo (
                    "<script>
                    alert('Removed successful');
                    window.location.href='admin_home_usr.php';
                    </script>");
            }
               
            }
        }
                         
?>