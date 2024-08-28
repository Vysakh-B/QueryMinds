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

<body style="background-color: grey;">
    <!-- nav bar begining -->
    <nav class="navbar navbar-expand-lg  bg-dark" >
      <div class="container-fluid" >
        <a class="navbar-brand" href="admin_home_usr.php" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color: white;">Anything</a>
        <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
           
            
            <li class="nav-item">
              <a class="nav-link" href="view_report.php" style="color: white;">View Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adminlist.php"style="color: white;">Admins</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="create_users.php"style="color: white;">Create Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="create_admin.php"style="color: white;">Create Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"style="color: white;">Logout</a>
              </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- nav bar end -->
    <!-- body -->
    <div class="container ">
        <div class="container-md w-75 col-6">

            <div class="row align-items-start">
                
                
                
                                        <table class="table table-dark table-hover mt-5">
                                            
                                                <thead>
                                                  <?php
                                                  session_start();
                                                  include "connection.php";
                                                  ?>
                                                  <tr>
                                                    <?php
                                                    echo('<th scope="col">ID</th>
                                                    <th scope="col">BATCH</th>
                                                    <th scope="col">USER</th>
                                                    <th scope="col">VIEW</th>
                                                    <th scope="col">REMOVE</th>');
                                                    
                                                    ?>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                $req="SELECT * FROM `reg_user`";
 $result=mysqli_query($con,$req);
				if($result){
					if(mysqli_num_rows($result)>0){
					while($vl = mysqli_fetch_assoc($result)){
                                                  echo('<tr>');
                                                    echo('<th scope="row">'.$vl["id"].'</th>');
                                                    echo('<td>'.$vl["batch"].'</td>');
                                                    echo('<td>'.$vl["user_name"].'</td>');
                                                    echo("<td><a href='posts_user.php?id=$vl[user_name]' class='link-underline-success'>View</a></td>");
                                                    echo('<form method="post">');
                                                    echo("<td><a href='removeuser.php?id=$vl[id]' class='link-underline-danger'>Remove</a></td>");
                                                   echo('</form>');
                                                  echo('</tr>');
                                                  
                                                  }}}
                                                  ?>
                                                  
                                                  
                                                </tbody>
                                              </table>
                                         



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