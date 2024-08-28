<?php
 include "connection.php";
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>reply</title>
</head>

<body style="background-color:rgb(13, 82, 135);">
    <nav class="navbar bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php" style="color:white">
                <h3 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: white;">CoNVo</h3>
            </a>
        </div>
    </nav>
    <?php

// $usern=$_SESSION['user_name'];
// $user=$_GET['user'];
// echo($user);

$post_id=$_GET['post_id'];
$q="SELECT * FROM posts WHERE id = $post_id";
// echo($qury);
$result=mysqli_query($con,$q);
// echo(mysqli_num_rows($result));
if($result){
    // if(mysqli_num_rows($result)>0){
       
        $indiv = mysqli_fetch_assoc($result);
            
        }
        else{
            echo (
                "<script>
                alert('id error');
                </script>");
        }
        // }
        
    ?>
    <div class="container p-3">
        
            <div class="card" style="background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);">
                <?php
                echo('<h5 class="card-header" style="color:white;">'.$indiv["user"].'</h5>');
                ?>
                <div class="card-body">
                    <?php
                    echo('<h5 class="card-title" style="color:orange;">'.$indiv["head"].'</h5>');
                    echo('<p class="card-text" style="color:cyan;">'.$indiv["content"].'</p>');
                    ?>
                    <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="color:yellow;">Your reply</label>
                        <input type="text" name="rply" placeholder="reply" class="form-control" require>
                        <div id="emailHelp" class="form-text" style="color:red;">All users can see it.</div>
                    </div>
             
                     <button type="submit" name="reply_sub"class="btn btn-primary">Add reply</button>
                    <?php

if(isset($_POST['reply_sub'])){
    $rply=$_POST['rply'];
    if((empty($rply))){
        echo (
            "<script>
            alert('please provide reply');
            window.location.href='feeds.php';
            </script>");
    }
    else{
        
        
    $reg="INSERT INTO `replys`(`post_id`,`user_name`, `reply`,`date`) VALUES ('$post_id','$_SESSION[username]','$rply',now())";
    $result=mysqli_query($con,$reg);
    if (!$result) {
        echo (
            "<script>
            alert('error');
            </script>");
     
    } 
    else{
        header('Location:feeds.php');
    }
    

}
}
                    ?>
                </div>
            </div>

        </form>
    </div>
    <div class="container ">
        <div class="container-md w-75 col-6">
        <?php
 
// echo($user);
$q="SELECT * FROM replys WHERE post_id = $post_id ORDER BY id DESC";
// echo($qury);
$result=mysqli_query($con,$q);
// echo(mysqli_num_rows($result));
if($result){
    if(mysqli_num_rows($result)>0){
        while($alls = mysqli_fetch_assoc($result)){
        // }
        
    ?>

            <div class="row align-items-start">
                <div class="col p-2">
                    <div class="card  mt-3 mb-3" style="background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);">
                        <div class="card-body">
                            <?php

                            echo('<h5 class="card-title" style="color:orange;"> '.$alls["user_name"].'</h5>');
                            echo('<p class="card-subtitle mb-2 " style="color:white;">'.$alls["date"].'</p>');
                            echo('<h6 class="card-text" style="color:cyan;">'.$alls["reply"].'</h6>');
                            ?>
                        </div>
                    </div>
                </div>
                
                
                

            </div>
            <?php
        }}}
                ?>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>