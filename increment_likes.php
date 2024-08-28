<?php
session_start();
include "connection.php";
$i=$_GET['post'];
$chk="SELECT `id` FROM `likes` WHERE user='$_SESSION[username]' AND post_id=$i";
       $com=mysqli_query($con,$chk);  
       if($com){
if(mysqli_num_rows($com)>0){
    
        header('Location:home.php');
    
}
else {
    $quy="INSERT INTO `likes`( `post_id`, `user`) VALUES ('$i','$_SESSION[username]')";
    $d=mysqli_query($con,$quy);
    if ($d) {
        
    header('Location:home.php');
}
}
       }          
                           
                         
?>