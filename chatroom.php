<?php
//session_start();
include("header.php");
include("functions.php");
?>
<!doctype html>
<html lang="en">
<head>
<title>Timeline</title>
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
   
    <style>
        body{
            overflow-x: hidden;
        }
        label{
            padding: 7px;
            display: table;
            color: #fff;
        }
        input[type="file"]{
            display: none;
        }
        #cover-img{
            height: 400px;
            width: 100%;
        }
        #profile-img{
            position: absolute;
            top:160px;
            left: 40px;
        }
        #update-prof{
            position: relative;
            top: -30px;
            cursor: pointer;
            left: 93px;
            border-radius: 4px;
            background-color: rgba(0,0,0,0.2);
            transform: translate(-50%, -50%);
        }
        #btn-prof{
            position: absolute;
            top: 83%;
            left: 50%;
            cursor: pointer;
            transform: translate(-50%, -50%);
        }
        #own-posts{
            border: 5px solid #e6e6e6;
            padding: 40px 50px;
            width: 500px;
        }
        #post-img{
            height: 300px;
            width: 100%;
        }
    </style>
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
    <?php
      //delete posts
      if(isset($_GET['post_id'])){
      	$deleteid =$_GET['post_id'];
        $query = "DELETE FROM posts WHERE post_id = $deleteid";
        $result = mysqli_query($con, $query);
        header("Location: timeline.php?u_id=$user_id");

      }
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
        <!--cover photo and links-->
        <!--cover photo and links-->
         <?php
                $user=$_SESSION['email'];
                $getusers=mysqli_query($con,"select * from users where email='$user'");
            
            $row = mysqli_fetch_array($getusers);

                $first_name=$row['first_name'];
                $sir_name=$row['sir_name'];
               $user_id=$row['user_id']; $profile_pic=$row['profile_pic'];
                $cover_photo=$row['cover_pic'];
    
             ?>

    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-10">
        <?php
            echo"
            <div>
            <div><img id='cover-img' class='img-rounded' src='cover/$cover_photo' alt='cover'></div>
            <form action=timeline.php?u_id='$user_id' method='post' enctype='multipart/form-data'>
            <ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
            <li class='dropdown'>
            <button class='dropdown-toggle btn btn-default' data-toggle='dropdown' style='background-color:grey;'>Change cover</button>
            <div class='dropdown-menu'>
            <center>
            <p>Click <strong>Select Cover </strong> and then click the <br> <strong> Update Cover</strong></p>
            <label class='btn btn-info' style='background-color:grey;'>Select Cover<input type='file' name='u_cover' size='60'/>
            </label><br><br>
            <button name='submit' class='btn btn-info' style='background-color:grey;'>Update Cover</button>
            </center>
            </div>
            </li>
            </ul>
            </form>
            </div>
            <div id='profile-img'>
            <img src='cover/$profile_pic' alt='Profile' class='img-circle' width='180px' height='185px'>
            <form action='timeline.php?u_id='$user_id' method='post' enctype='multipart/form-data'>
             <label id='update-prof'>Select Profile<input type='file' name='u_image' size='60'/>
            </label><br><br>
            <button id='btn-prof' name='update' class='btn btn-info' style='background-color:grey;'>Update Profile</button>
            </form>
            </div><br>
            ";
           ?>
            <?php
            if(isset($_POST['submit'])){
                $cover=$_FILES['u_cover']['name'];
                $image_tmp=$_FILES['u_cover']['tmp_name'];
                $rand_number=rand(1,100);
                if($cover==''){
                    echo "<script>alert('please select cover image');</script>";
                    echo "<script>window.open('timeline.php?u_id=$user_id', '_self')</script>";
                    exit();
                }else{
                    move_uploaded_file($image_tmp,"cover/$u_image.$rand_number");
                    $update="update users set cover_pic='$u_cover.$rand_number' where user_id='$user_id'";
                    
                    $run=mysqli_query($con,$update);
                    if($run){
                         echo "<script>alert('Your cover updated');</script>";
                    echo "<script>window.open('timeline.php?u_id=$user_id', '_self')</script>";
                    }
                }
            }
            ?>
        </div>
         <?php
            if(isset($_POST['update'])){
                $cover=$_FILES['u_image']['name'];
                $image_tmp=$_FILES['u_image']['tmp_name'];
                $rand_number=rand(1,100);
                if($cover==''){
                    echo "<script>alert('please select profile image');</script>";
                    echo "<script>window.open('timeline.php?u_id=$user_id', '_self')</script>";
                    exit();
                }else{
                    move_uploaded_file($image_tmp,"cover/$u_image.$rand_number");
                    $update="update users set profile_pic='$u_image.$rand_number' where user_id='$user_id'";
                    
                    $run=mysqli_query($con,$update);
                    if($run){
                         echo "<script>alert('Your profile image updated');</script>";
                    echo "<script>window.open('timeline.php?u_id=$user_id', '_self')</script>";
                    }
                }
            }
        ?>
        </div>
         
        <!--nav-->
       <div id="wrapper">
           <!--middle column-->
    <div id="content">
        <div class="col-sm-8">
        <?php
        global $con;
        if(isset($_GET['u_id'])){
            $u_id=$_GET['u_id'];
        }
        $get_posts="select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";
        $run_posts=mysqli_query($con,$get_posts);
        while($row_posts=mysqli_fetch_array($run_posts)){
            $post_id=$row_posts['post_id'];
            $user_id=$row_posts['user_id'];
            $content=$row_posts['post_content'];
       $upload_image=$row_posts['upload_image'];
            $post_date=$row_posts['post_date'];
            
            $user="select * from users where user_id='$user_id' AND posts='yes'";
            
            $run_user=mysqli_query($con, $user);
            $row_user=mysqli_fetch_array($run_user);
            $user_name=$row_user['user_name'];
            $user_image=$row_user['profile_pic'];
            
            if($content=="No" && strlen($upload_image) >= 1){
                echo"
                <div id='own-posts'>
                <div class='row'>
                <div class='col-sm-12'>
                <p><img src='cover/$user_image' class='img-circle' width='100px' height='100px'></p>  
                </div>
                <div class='col-sm-6'>
                <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;text-transform:lowercase;' href='user_profile.php?u_id=$user_id'>$first_name $sir_name</a></h3>
                <h4><small style='color:black;text-transform:lowercase;'>Updated a post on <strong>$post_date</strong></small></h4>
                </div>
                <div class='col-sm-4'>
                </div>
                </div>
                <div class='row'>
                <div class='col-sm-12'>
                <img id='posts-img' src='cover/$upload_image' style='height:350px;'>
                </div>
                </div><br>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn success'>View</button></a>
                
                <a href='timeline.php?post_id=$post_id' style='float:right;' onclick='return confirm('Delete?');'><button class='btn btn-danger'>Delete</button></a><br>
                </div><br><br>
                ";
            }
            
                else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
                echo"
                <div id='own-posts'>
                <div class='row'>
                <div class='col-sm-12'>
                <p><img src='cover/$user_image' class='img-circle' width='100px' height='100px'></p>  
                </div>
                <div class='col-sm-12'>
                <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;text-transform:lowercase;' href='user_profile.php?u_id=$user_id'>$first_name $sir_name</a></h3>
                <h4><small style='color:black;text-transform:lowercase;'>Updated a post on <strong>$post_date</strong></small></h4>
                </div>
                <div class='col-sm-4'>
                </div>
                </div>
                <div class='row'>
                <div class='col-sm-12'>
                <p>$content</p>
                <img id='posts-img' src='cover/$upload_image' style='height:350px;'>
                </div>
                </div><br>
               
                </div><br><br>
                ";
            }
                 else{
                echo"
                <div id='own-posts'>
                <div class='row'>
                <div class='col-sm-12'>
                <p><img src='cover/$user_image' class='img-circle' width='100px' height='100px'></p>  
                </div>
                <div class='col-sm-6'>
                <h3><a style='text-decoration:none;cursor:pointer;color:#3897f0;text-transform:lowercase;' href='user_profile.php?u_id=$user_id'>$first_name $sir_name</a></h3>
                <h4><small style='color:black;text-transform:lowercase;'>Updated a post on <strong>$post_date</strong></small></h4>
                </div>
                <div class='col-sm-4'>
                </div>
                </div>
                <div class='row'>
                <div class='col-sm-12'>
                </div>
                <div class='col-sm-6'>
                <h3 style='text-transform:lowercase;'><p>$content</p></h3>
                </div>
                <div class='col-sm-4'>
                </div>
    
                </div>
            
                ";
                     
                     global $con;
                     if(isset($_GET['u_id'])){
                         $u_id=$_GET['u_id'];
                     }
                     $get_posts="select email from users where user_id='$u_id'";
                     $run_user=mysqli_query($con,$get_posts);
                     $row=mysqli_fetch_array($run_user);
                     $user_email=$row['email'];
                     
                     $user=$_SESSION['email'];
                     $get_user="select * from users where email='$user'";
                     $run_user=mysqli_query($con,$get_posts);
                     $row=mysqli_fetch_array($run_user);
                     
//                     $user_id=$row['user_id'];
                     $u_email=$row['email'];
                     
                     if($u_email != $user_email){
                         echo"<script>window.open('newsfeed.php?u_id=$user_id','_self')</script>";
                     }else{
                         echo"
                          <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn success'>View</button></a>
                           <a href='edit_posts.php?post_id=$post_id' style='float:right;'><button class='btn info'>Edit</button></a>
                <a href='timeline.php?post_id=$post_id' style='float:right;' onclick='return confirm('Delete?');'><button class='btn btn-danger'>Delete</button></a><br>
                </div><br><br>
                ";
                     }
            }
//include("delete_posts.php");
        }
        
        
        
        
    ?>
        </div>
        <div class="col-sm-2">
        
        </div>
    </div>
            <!-- End Middle Column -->
  </div>
    
        <!--right side-->
  <div id="extra">
     <center><h4 style="text-transform:lowercase;">Fellow Classmates</h4></center>
       <div>
          <?php foreach($school_array as $cm_key=>$cm_value) { ?>
          <div class="container-fluid">
              <a style='text-decoration:none;cursor:pointer;color:#3897F0;' href='user_profile.php?u_id=<?php echo $cm_value['user_id']; ?>'>
                  <img class="img-circle" src="cover/<?php echo $cm_value['profile_pic']; ?>" style='width:70px;height:70px;' title='$user_name'>
                  <strong>&nbsp <?php echo $cm_value['first_name']/*." ".$cm_value['sir_name']*/; ?></strong>
                    <hr>
              </a>
          </div>
            <?php } ?>
      </div>

  </div>
        
  
        <!--scripts-->
        <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
        <script  src="/js/js/index.js"></script>
         <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        
        <section>
            <p> 
                .
            </p>
        </section>

    </body>
    <footer>
    
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
    
    </footer>
        
</html>