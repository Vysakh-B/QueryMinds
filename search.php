<?php
session_start();
include "connection.php";
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
    <nav class="navbar bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color:white;">CoNVo</a>
          <form method="post" class="d-flex" role="search" >
            <input type="text" class="form-control me-2" name="input"  placeholder="Search" aria-label="Search">
            <button  type="submit" class="btn btn-outline-success" name="search" >Search</button>
          </form>
        </div>
      </nav>
    <!-- nav bar end -->
    <!-- body -->
    <div class="container ">
    
        <div class="container-md w-75 col-6">

            <div class="row align-items-start">
            <?php
        if (isset($_POST['search'])) {
          $str=$_POST['input'];
          $q = "SELECT * FROM `posts` where head like '%$str%' or content like '%$str%' ORDER BY id DESC";
          $result = mysqli_query($con, $q);
          if ($result) {
            if(mysqli_num_rows($result)>0){
				while($all = mysqli_fetch_assoc($result)){
						//destination card
						?>
                <div class="col p-2">
                    <div class="card  mt-3 mx-4 mb-3" style="width: 18rem;background-color:rgb(8, 27, 55);box-shadow: 0 8px 32px 0 rgb(8, 27, 55);">
                        <div class="card-body">
                          <?php
                          echo('
                            <h5 class="card-title" style="color:orange;"  >'.$all["head"].'</h5>');
                            echo('
                            <h6 class="card-subtitle mb-2 " style="color:rgb(190, 86, 86);">'.$all["user"].'</h6>');
                            echo('<p class="card-subtitle mb-2 " style="color:rgb(255, 255, 255);">'.$all["date"].'</p>');

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
                
                
        }}}
        }
        
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