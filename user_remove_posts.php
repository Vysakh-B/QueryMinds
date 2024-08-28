<?php
include "connection.php";
$ids=$_GET['id'];
                   
                            $qurry="DELETE FROM `posts` WHERE id='$ids'";
        $d=mysqli_query($con,$qurry);
        if ($d) {
           $rest="DELETE FROM `replys` WHERE post_id='$ids'";
        $pod=mysqli_query($con,$rest);
        if($pod){
            $rprtrest="DELETE FROM `reports` WHERE post_id='$ids'";
        $rprtpod=mysqli_query($con,$rprtrest);
        if($rprtpod){
            echo (
                "<script>
                alert('Removed successful');
                window.location.href='feeds.php';
                </script>");
        }
           
        }

            
        }
                         
?>