<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<!-- jquery code  -->
<!-- <script>
  $(document).ready(function(){
    var feedcount=4;
    $("buttonmore").click(function(){
      feedcount=feedcount+3;
      $(".row align-items-start").load("load-feeds.php",{
        feednewcount:feedcount
      });
    });
  });
</script> -->
      </head>
<title>index</title>
</head>

<body style="background-color:rgb(13, 82, 135);">
    <!-- nav bar begining -->
    <nav class="navbar navbar-expand-lg  bg-dark" >
      <div class="container-fluid" >
        <a class="navbar-brand" href="home.php" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: white;">CoNVo</a>
        <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="feeds.php"style="color: white;">Feeds</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php"style="color: white;">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addblog.php" style="color: white;">Add</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                Account
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php" >Profile</a></li>
                <li><a class="dropdown-item" href="logout.php" >Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- nav bar end -->
    <!-- body -->
    <div class="container ">
        <div class="container-md w-75 col-6">

            <div class="row align-items-start" id="feedbox">
                
            <?php
                include "connection.php";
               


        $qurry="SELECT * FROM `posts` ORDER BY id DESC";
        $d=mysqli_query($con,$qurry);
        if($d){
			if(mysqli_num_rows($d)>0){
				while($all = mysqli_fetch_assoc($d)){
						//destination card
						?>
                <div class="col p-2">
                    <div class="card  mt-3 mx-4 mb-3" style="width: 18rem;background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);">
                        <div class="card-body">
                          <?php
                          echo('
                            <h5 class="card-title"style="color:orange;" >'.$all["head"].'</h5>');
                            echo('
                            <h6 class="card-subtitle mb-2 " style="color:rgb(190, 86, 86);">'.$all["user"].'</h6>');
                            echo('<p class="card-subtitle mb-2 "style="color:rgb(255, 255, 255);">'.$all["date"].'</p>');

                            echo('<h6 class="card-text" style="color:rgb(102, 230, 247);">'.$all["content"].'</h6>');
                            
                            
                           
                            echo('<button type="button" class="btn btn-outline-danger me-2" data-mdb-toggle="tooltip" data-mdb-placement="top" title="'.$all["likes"].'">
                            Like
                           </button>');

                            echo("<button type='button' class='btn btn-outline-primary me-2'><a href='reply.php?post_id=$all[id]'>reply</a></button>");
                            echo("<button type='submit' name='dlt' class='btn btn-outline-success me-2 mx-2'> 
                            <a href='insert_report.php?id=$all[id]&cont=$all[content]'>Report</a></button>");
                           
                           
                           
        
                            ?>
                            
                        </div>
               
                    </div>
                </div>
                
                
                <?php
                
                
        }
        }
        else{
          echo('<div class="container w-100 p-2 mt-2"style="text-align:center; font-family:Impact, Haettenschweiler, Arial Narrow Bold, sans-serif;font-size: 40px;color:cyan;">
          No Feeds
                              </div>');
      }}
      
        ?>


            </div>
            <div class="container p-3">
              <!-- <form action="" method="post">
            <button type="button" id="buttonmore" name="buttonmore" class="btn btn-outline-primary">Load More</button>
            </form>   -->
            
          </div>
        </div>

    </div>
    <?php

    ?>
    <!-- body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <!-- <script src="load-feeds.js"></script> -->
</body>
</body>

      </html>