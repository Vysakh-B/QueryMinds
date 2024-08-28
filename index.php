<?php
session_start();
include "connection.php";
$_SESSION['logged_in']=false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<title>index</title>
</head>

<body style="background-color:rgb(13, 82, 135);">
    <!-- nav bar begining -->
    <nav class="navbar bg-dark shadow-lg p-3 mb-5 bg-dark rounded" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">CoNVo</a>
            <div class="box">
                
                <button class="btn btn-outline-success me-2" type="button"><a style="text-decoration:none" href="signin.php">Sign in</a></button>
            </div>
        </div>
    </nav>
    <!-- nav bar end -->
    <!-- body -->
    <div class="container " >
        <div class="container-md w-75 col-6" >

            <div class="row align-items-start">
                <div class="container w-100 p-2 mt-2"style="text-align:center; font-family:Impact, Haettenschweiler,'Arial Narrow Bold', sans-serif;font-size: 40px;color:cyan;">
                    Top Topics
                                        </div>
                <?php
                include "connection.php";
               


        $qurry="SELECT * FROM `posts` ORDER BY id DESC limit 3";
        $d=mysqli_query($con,$qurry);
        if($d){
			if(mysqli_num_rows($d)>0){
				while($all = mysqli_fetch_assoc($d)){
						//destination card
						?>
                <div class="col p-2">
                    <form method="post">
                    <div class="card  mt-3 mx-4 mb-3" style="width: 18rem;background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);">
                        <div class="card-body">
                          <?php
                          echo('
                            <h5 class="card-title" style="color:orange;" >'.$all["head"].'</h5>');
                            echo('
                            <h6 class="card-subtitle mb-2 " style="color:rgb(190, 86, 86);">'.$all["user"].'</h6>');
                            echo('<p class="card-subtitle mb-2 " style="color:rgb(255, 255, 255);" >'.$all["date"].'</p>');

                            echo('<h6 class="card-text" style="color:rgb(102, 230, 247);">'.$all["content"].'</h6>');
                            
                           
                           
                            if ($_SESSION['logged_in']==true)
                             {
                                echo('<button type="submit" name="like" class="btn btn-outline-danger me-5" data-mdb-toggle="tooltip" data-mdb-placement="top" title="'.$all["likes"].'">
                            Like
                           </button>');
                           echo("<button  type='submit' name='reply' class='btn btn-outline-primary'><a href='reply.php?post_id=$all[id]'>reply</a></button>");
                            }
                            else{
                                echo('<button type="submit" name="like" class="btn btn-outline-danger me-5" data-mdb-toggle="tooltip" data-mdb-placement="top" title="'.$all["likes"].'">
                            Like
                           </button>');
                           
                           echo("<button  type='submit' name='reply' class='btn btn-outline-primary'>reply</button>");
                           if(isset($_POST['like'])||isset($_POST['reply'])){
                                 header("Location:signin.php");



                           }
                            }
                           
                          
                            
                           

                           
        
                            ?>
                        </div>
               
                    </div>
                </form>
                </div>
                
                
                <?php
        }}}
        ?>


            </div>
        </div>

    </div>
    <!-- body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</body>

</html>