<?php
//session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['email'])){
    header("location:home.php");
}
   ?>
<!doctype html>
<html lang="en">
<head>
<title>User Profile</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="carol.css" />
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon" style="geight: 70px; width: 70px">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <style>
        body{
            overflow-x: hidden;
        }
        #own-posts{
            border: 5px solid #e6e6e6;
            padding: 40px 50px;
            width: 80%;
            float: right;
            
            
        }
        #posts-img{
            height: 300px;
            width: 100%;
        }
        #row{
            
        }
    </style>
        <!--header-->
        <?php
    //include("nav.php");
    ?>
     <?php
                $user=$_SESSION['email'];
                $getusers=mysqli_query($con,"select * from users where email='$user'");
            
            $row = mysqli_fetch_array($getusers);
                
                $user_id=$row['user_id'];
                $first_name=$row['first_name'];
                $sir_name=$row['sir_name'];
                $team=$row['team'];
                $profile_pic=$row['prof_pic'];
    
             ?>
        <header id="header">
				<div class="inner">
					<a href="myaccount.php" class="logo">K254SPORTS</a>
					<nav id="nav">
                        <?php
                        echo"
                        <a href='user_profile.php?u_id=$user_id'>$first_name</a>";?>
						<a href="home.php">Home</a>
						<a href='newsfeed.php?<?php echo "u_id=$user_id";?>'>News Feed</a>
						<a href='timeline.php?<?php echo "u_id=$user_id";?>'>Timeline</a>
 
					</nav>
				</div>
			</header>
        
    <body>
    <div class="row">
        <?php
        if(isset($_GET['u_id'])){
            $u_id=$_GET['u_id'];
        //}
        //if($u_id < 0 || $u_id == ""){
          //  echo"<script>windoow.open('account.php','_self')</script>";
        }else{
            
        ?>
        <div class="col-sm-12" id="row">
        <?php
            if(isset($_GET['u_id'])){
                global $con;
                $user_id=$_GET['u_id'];
                $select="select * from users where user_id='$user_id'";
                $run=mysqli_query($con, $select);
                $row=mysqli_fetch_array($run);
                
                $username=$row['username'];
            }
            
            ?>
            <?php
            if(isset($_GET['u_id'])){
                global $con;
                $user_id=$_GET['u_id'];
                $select="select * from users where user_id='$user_id'";
                $run=mysqli_query($con, $select);
                $row=mysqli_fetch_array($run);
                
                $id=$row['user_id'];
                $image=$row['profile_pic'];
                $username=$row['username'];
                $first_name=$row['first_name'];
                $last_name=$row['sir_name'];
                $team=$row['team'];
                $gender=$row['gender'];
                $description=$row['description'];
                $regdate=$row['user_reg_date'];
                $school=$row['school'];
                $level=$row['level'];
                
                echo"
                <div class='row'>
                <div class='col-sm-1'>
                </div>
                <center>
                <div style='background-color:#e6e6e6;' class='col-sm-3'>
                <h2>Information about</h2>
                <img class='img-circle' src='cover/$image' width='150px' height='150px'>
                <br><br>
                <ul class='list-group'>
                <li class='list-group-item' title='Username'><strong>$first_name $last_name</strong><li>
                
                <li class='list-group-item' title='User status'><strong style='color:gray;'>$description</strong><li>
                
                 <li class='list-group-item' title='team'><strong>$team</strong><li>
                 
                  <li class='list-group-item' title='level'><strong>$level</strong><li>
                
                <li class='list-group-item' title='Gender'><strong>$gender</strong><li>
                
                <li class='list-group-item' title='User registration date'><strong>$regdate</strong><li>
                </ul>
   </div>
                
                </div>
                ";
                 
                $user=$_SESSION['email'];
                $get_user="select * from users where email='$user'";
                $run_user=mysqli_query($con, $get_user);
                $row=mysqli_fetch_array($run_user);
                
                $userownid=$row['user_id'];
                if($user_id == $userownid){
                    if($user_id == $userownid){
                        echo"<a href='editprof.php?u_id=$userownid' class='btn btn-success' style='margin-left:10%;'/>Edit Profile</a><br><br><br>";
                    }
                    echo"
                   
                    </div>
                    </center>
                    ";
                }
//            }
            
            ?>
            <div class="col-sm-8">
            <center><h1 style="text-transform:lowercase;"><strong><?php echo "$first_name $last_name"; ?></strong> Posts</h1></center>
                <?php
                global $con;
                if(isset($_GET['u_id'])){
                    $u_id=$_GET['u_id'];
            
                $get_posts="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
                $run_posts=mysqli_query($con,$get_posts);
                while($row_posts=mysqli_fetch_array($run_posts)){
                    $postid=$row_posts['post_id'];
                    $userid=$row_posts['user_id'];
                    $content=$row_posts['post_content'];
                    $uploadimage=$row_posts['upload_image'];
                    $postdate=$row_posts['post_date'];
                    
                    $user="select * from users where user_id='$userid' AND posts='yes'";
                    
                    $run_user=mysqli_query($con, $user);
                    $row_user=mysqli_fetch_array($run_user);
                    
                    $image=$row_user['prof_pic'];
                $username=$row_user['username'];
                $first_name=$row_user['first_name'];
                $last_name=$row_user['sir_name'];
                }
                    if($content=='No' && strlen($uploadimage) >= 1){
                        echo"
                        <div id='own-posts'>
                        <div class='row'>
                        <div class='col-sm-2'>
                        <p><img src='cover/$image' class='img-circle' width='100px' height='100px'></p>
                        </div>
                        <div class='col-sm-6'>
                        <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;' href='user_profile.php?u_id=$user_id'>$first_name $last_name</a></h3>
                        <h4><small style='color:black;'>Updated post on <strong>$postdate</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        
                        </div>
                        </div>
                        <div class='row'>
                        <div class='col-sm-12'>
                        <img id='posts-img' src='cover/$uploadimage' style='height:350px'>
                        </div>
                        </div><br>
                        <a href='single.php?post_id=$postid' style='float:right;'><button class='btn btn-success'>View</button></a>
                        
                         <a href='delete_post.php?post_id=$postid' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                        </div><br><br>
                        ";
                        
                    }
                     else if(strlen($content) >= 1 && strlen($uploadimage) >= 1){
                echo"
                <div id='own-posts'>
                <div class='row'>
                <div class='col-sm-2'>
                <p><img src='cover/$userimage' class='img-circle' width='100px' height='100px'></p>  
                </div>
                <div class='col-sm-6'>
                <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;text-transform:lowercase;' href='timeline.php?u_id=$user_id'>$first_name $last_name</a></h3>
                <h4><small style='color:black;text-transform:lowercase;'>Updated a post on <strong>$post_date</strong></small></h4>
                </div>
                <div class='col-sm-4'>
                </div>
                </div>
                <div class='row'>
                <div class='col-sm-12'>
                <p>$content</p>
                <img id='posts-img' src='cover/$uploadimage' style='height:350px;'>
                </div>
                </div><br>
                <a href='single.php?post_id=$postid' style='float:right;'><button class='btn success'>View</button></a><br>
                <a href='deletepost.php?post_id=$postid' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br>
                </div><br><br>
                ";
            }
                    
                     else{
                echo"
                <div id='own-posts'>
                <div class='row'>
                <div class='col-sm-2'>
                <p><img src='cover/$image' class='img-circle' width='100px' height='100px'></p>  
                </div>
                <div class='col-sm-6'>
                <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;text-transform:lowercase;' href='timeline.php?u_id=$user_id'>$first_name $last_name</a></h3>
                <h4><small style='color:black;text-transform:lowercase;'>Updated a post on <strong>$postdate</strong></small></h4>
                </div>
                <div class='col-sm-4'>
                </div>
                </div>
                <div class='row'>
                <div class='col-sm-12'>
                <p>$content</p>
                </div>
                </div><br>
                <a href='single.php?post_id=$postid' style='float:right;'><button class=''>Comment</button></a><br>
               </div><br><br>
                ";
            }
                }
            }
            ?>
            </div>
        </div>
        </div> 
        
        <?php
        }
        ?>
      <footer class="footer-distributed">

            <div class="footer-left">

                <p class="footer-company-name">K254SPORTS &copy; 2019</p>
            </div>

            <div class="footer-center">

                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Africa Nazarene</span>Rongai, Kajiado</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+254700470627</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@gmail.com">k254sports@gmail.com</a></p>
                </div>

            </div>
               <div class="footer-center">
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