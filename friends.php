<?php
//session_start();
//include("header.php");
include("functions.php");



?>
<!doctype html>
<html lang="en">
<head>
<title>Find People</title>
       <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/carol.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
     <link rel="shortcut icon" href="logo.jpg" type="image/x-icon" style="geight: 70px; width: 70px">
    <link rel="stylesheet" href="userprofile.css"/> 
   
    </head>
     <?php
               if(!isset($_SESSION['email'])){
                $user=$_SESSION['email'];
                $getusers=mysqli_query($con,"select * from users where email='$user'");
            
            $row = mysqli_fetch_array($getusers);
                
                $user_id=$row['user_id'];
                $first_name=$row['first_name'];
                $sir_name=$row['sir_name'];
                $team=$row['team'];
                $profile_pic=$row['profile_pic'];
               }
             ?>
    <header id="header">
				<div class="inner">
					<a href="home.html" class="logo">K254SPORTS</a>
					<nav id="nav">
						<a href="home.php">Home</a>
						<a href='newsfeed.php?<?php echo "u_id=$user_id";?>'>News Feed</a>
						<a href='timeline.php?<?php echo "u_id=$user_id";?>'>Timeline</a>
                        <a href="settings.php">Settings</a>
                        <div class="dropdown">
						<img src="images/usericon.png" style="width:40px;height:40px
" />
                        <?php
                            echo"
                        <div class='dropcontent'>
                           
                            <a href='account.php?u_id=$user_id'>My Posts<span class='badge badge-secondary'> $posts</span></a><br>
                             <a href='editprof.php?u_id=$user_id'>Edit Profile</a><br>
                            <a href='logout.php'>Logout</a>
                            </div>
                    ";
                            ?>
                        </div>
					</nav>
				</div>
			</header>
    <style>
         #find_people{
            border: 5px solid #e6e6e6;
            padding: 20px 50px;
        }
        #result_posts{
            border: 5px solid #e6e6e6;
            padding: 20px 50px;
        }
        form.search-form input[type=text]{
            padding: 10px;
            font-size: 17px;
            border-radius: 4px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }
        form.search-form button{
            float: left;
            width: 20%;
            padding: 10px;
            font-size: 17px;
            border-left: none;
            cursor: pointer;
            background-color: dimgray;
            
        }
        form.search-form button:hover{
            background-color: gray;
        }
        form.search-form:after{
            content: "";
            clear: both;
            display: table;
        }
    </style>
        
    <body>
    <div class="row">
        <div class="col-sm-12">
        <center><h2>People from same team</h2></center><br><br>
            <div class="row">
            <div class="col-sm-4">
                </div>
                 <div class="col-sm-4">
                     <form class="search-form" action="">
                     <input type="text" placeholder="Search friend" name="search_user">
                         <button class="btn btn-info" type="submit" name="search_user_btn">Search</button> 
                     </form>
                </div>
                <div class="col-sm-4">
                </div>
            </div><br><br>
            
            <?php 

//            search_user();
            
           foreach($team_array as $cm_key=>$cm_value) {
                 $user_id= $cm_value['user_id']; ;
        $username= $cm_value['username']; ;
        $user_image= $cm_value['profile_pic']; 
        $first_name= $cm_value['first_name']; 
        $sir_name= $cm_value['sir_name']; 
            
          echo "
        <div class='row'>
        <div class='col-sm-3'>
        </div>
        <div class='col-sm-6'>
        <div class='row' id='find_people'>
        <div class='col-sm-4'>
        <a href='user_profile.php?u_id=$user_id'>
        <img src='cover/$user_image' width='150px' height='140px' title='$username' style='float:left; margin:1px;' />
        </a>
    
        </div><br><br>
        <div class='col-sm-6'>
        <a style='text-decoration:none; cursor:pointer;color=#3897f0' href='user_profile.php?u_id=$user_id'>
        <strong><h2 style='text-transform:lowercase'>$first_name $sir_name</h2></strong>
        </a>
        </div>
        <div class='col-sm-3'></div>
        </div>
        </div>
        <div class='col-sm-4'>
        </div>
        </div><br>
     ";
            
            }
            ?>
        
        </div>
        </div>    
        
        
        
        
        
    </body>
</html>