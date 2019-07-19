<?php
//session_start();
include("header.php");

?>
<!doctype html>
<html lang="en">
<head>
<title>Edit Posts</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
     <link rel="stylesheet" href="assets/css/carol.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="timeline.css" />
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="userprofile.css"/>'
     <link rel="stylesheet" href="footer.css" />
  
      
</head>
    <body>
        <?php
                $user=$_SESSION['email'];
                $getusers=mysqli_query($con,"select * from users where email='$user'");
            
            $row = mysqli_fetch_array($getusers);
                
                $user_id=$row['user_id'];
                $first_name=$row['first_name'];
                $sir_name=$row['sir_name'];
                $school=$row['school'];
                $profile_pic=$row['profile_pic'];
    
             ?>
   
        <!--header-->
        <header id="header">
				<div class="inner">
                 
					<a href="home.html" class="logo">Classmates</a>
					<nav id="nav">
						 <?php
                        echo"
                        <a href='user_profile.php?u_id=$user_id'>$first_name</a>";?>
						<a href="home.php">Home</a>
						<a href='newsfeed.php?<?php echo "u_id=$user_id";?>'>News Feed</a>
						<a href='timeline.php?<?php echo "u_id=$user_id";?>'>Timeline</a>
                        
						<div class="dropdown">
						<img src="images/usericon.png" style="width:40px;height:40px
" />
                        
                       <?php
                            echo"
                        <div class='dropcontent'>
                           
                            <a href='newsfeed.php?u_id=$user_id'>My Posts<span class='badge badge-secondary'> $posts</span></a><br>
                             <a href='editprof.php?u_id=$user_id'>Edit Profile</a><br>
                            <a href='logout.php'>Logout</a>
                            </div>
                    ";
                            ?>
                        </div>
					</nav>
				</div>
			</header>
      <div class="row">
          <div class="col-sm-3">
          </div>
          <div class="col-sm-6">
              <?php
              if(isset($_GET['post_id'])){
                  $get_id=$_GET['post_id'];
                  
                  $get_post="select * from posts where post_id='$get_id'";
                  $run_post=mysqli_query($con,$get_post);
                  $row=mysqli_fetch_array($run_post);
                  
                  $post_con=$row['post_content'];
              }
           
              ?>
              <form action="" method="post" id="f">
              <center><h2>Edit Your Post:</h2></center><br>
            <textarea class="form-control" cols="83" rows="4" name="content"><?php echo $post_con ;?></textarea><br>
              <input type="submit" name="update" value="Update Post" class="btn btn-info"/>
              </form>
              <?php
              if(isset($_POST['update'])){
                  $content=$_POST['content'];
                  $update_post="update posts set post_content='$content' where post_id='$get_id'";
                  $run_update=mysqli_query($con,$update_post);
                  if($run_update){
                      echo"<script>alert('A post has been updated')</script>";
                       echo"<script>window.open('newsfeed.php','_self')</script>";
                  }
              }
              
              ?>
          </div>
          <div class="col-sm-3">
          </div>
        </div>
              
        
   
         <footer class="footer-distributed">

            <div class="footer-left">

                <h3>Classmates<span>logo</span></h3>

                <p class="footer-links">
                    <a href="homepage.php">Home</a>
                    .
                    <a href="profile.php">Profile</a>
                    .
                    <a href="search.php">Search</a>
                    .
                    <a href="#">Contact</a>
                    
                </p>

                <p class="footer-company-name">Classmates &copy; 2018</p>
            </div>

            <div class="footer-center">

                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Africa Nazarene</span>Rongai, Kajiado</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+254719428898</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@company.com">Classmates.com</a></p>
                </div>

            </div>

            <div class="footer-right">

                <p class="footer-company-about">
                    <span>About the company</span>
                    Classmates is an online platform for people 
                    to book events, and view events.
                </p>

                <div class="footer-icons">

                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                    <a href="https://github.com/"><i class="fa fa-github"></i></a>

                </div>

            </div>

        </footer>
    
    </body>
</html>