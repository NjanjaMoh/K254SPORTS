<?php
//session_start();
include("functions.php");
include("header.php");

if(!isset($_SESSION['email'])){
 header("location:account.php");
} else{
    echo "<script>window.location.assign('login.php');</script>";
}

?>
<?php

$con=mysqli_connect("localhost","root","","k254sports2")or
       die("connection not established")
   ?>
<!doctype html>
<html lang="en">
<head>
<title>My Account</title>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/main.css" />
    <link rel="stylesheet" href="carol.css" />
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon" style="geight: 70px; width: 70px">
   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="userprofile.css"/>
    
    <style>
        body{
            overflow-x: hidden;
        }
        input[type="file"]{
            display: none;
            background-image: url(images/add%20img.png);
        }

        #posts{
            border: 5px solid #e6e6e6;
            padding: 40px 50px;
        }
        #posts-img{
            padding-top: 5px;
            padding-right: 10px;
            min-width: 102%;
            max-width: 50%;
        }
        #single_posts{
            border: 5px solid #e6e6e6;
            padding: 40px 50px;
        }
    </style>

    </head>
    <body>
        <!--header-->
         <?php
              
             ?>
        <header id="header">
				<div class="inner">
					<a href="home.php" class="logo">K254SPORTS</a>
					<nav id="nav" style="overflow: hidden; background-color:black">
                        
						<a href="home.php">Home</a>
						<a href='newsfeed.php?<?php echo "u_id=$user_id";?>'>News Feed</a>
						<a href='timeline.php?<?php echo "u_id=$user_id";?>'>Timeline</a>
                        <a href='sports.php'>Sports</a>
                        <a href='sportsgllery.html'>Sports Gallery</a>
                        <a href='logout.php'>Logout</a>
                        
                        <div class="dropdown">
						<img src="images/usericon.png" style="width:40px;height:40px
" />
                        <?php
                       
                            ?>
                        </div>
					</nav>
				</div>
			</header>
        
        <!--nav-->
       <div id="wrapper">
           <!--middle column-->
    <div id="content">
         
        <div style="border-radius: 50%; float:left; height:110px;width:110px; margin-left:5%;">
<img src="cover/<?php echo $profile_pic ; ?>" style="border-radius: 50%; float:left; height:110px;width:110px; margin-left:5%; margin-bottom:50%;"/>
           </div>
       
        <form method="post" action=".php?id=<?php echo $user_id; ?>" enctype="multipart/form-data" style="float: right; margin-right:15% ;">
            <textarea name="post_txt" rows="4" cols="40" style=" border-radius: 10px" placeholder="Write what you wish..."></textarea><br>
            <label><img src="images/add%20img.png" style="width: 35px;height:30px; padding-right: 10px;"/>
            <input type="file" name="upload_img" size="30"/>
            <img src="images/addvideo.png" style="width: 35px;height:30px; padding-right: 10px"/></label>
                
            <input type="submit" value="Post" name="post" class="w3-btn w3-gray w3-round-xxlarge" style="border-radius: 40px;float:right;margin-top:5px; ">
            <!--<button class="w3-btn w3-gray w3-round-xxlarge"
            name="post">Post</button>-->
            <hr><br>
        </form>
        <br><br>
        <!--function for inserting posts-->
        <?php
        insertPost(); ?>
        
    <?php echo get_posts(); ?>
    <!-- End Middle Column -->
    </div>
  </div>
  <div id="navigation">
    <div class="navprof">
        <div class="img">
       
            <img src="cover/<?php echo $profile_pic ; ?>" style="height:90px;width:90px; border-radius:60px; z-index:2; bottom:30px; left:15px; position:relative; border:4px solid white"/>
            <strong><p style="padding-right:70px; float:right; color:white;font-size:18px;font-family: cursive;"><?php echo $first_name;?></strong><br>
            <strong><p style="padding-left:90px;color:white; bottom:40px;font-size:18px;font-family: cursive; "><?php echo "$team";?></p></strong><br><br>
            
        
            </div>
      </div>
      
      
    <ul>
        <!--defined in carol.css-->
        
      <li><img src="images/profile/communication.png"/><a href="userprofile.php">Profile</a></li>
      <li><img src="images/profile/friends.png"><a href="friends.php">Friends</a></li>
        <li><img src="images/profile/people.png"/><a href="people.php">People Nearby</a></li>
      <li><img src="images/profile/chat.png"/><a href='messages.php?<?php echo "u_id=new";?>'>Messages</a></li>
         <li><img src="images/profile/photos.png"/><a href="photos.php">Photos</a></li>
    </ul>
         
  </div>
  <div id="extra">
      <center><h4><strong>Who to Follow</strong></h4></center>
        
      <div>
         
               <ul>
               <li><img src="images/userpic.gif"/><a href="newsfeed.html">Harriet Soita</a></li>
   <li><img src="images/userpic.gif"/><a href="newsfeed.html">Carol Muthoni</a></li>
      <li><img src="images/userpic.gif"/><a href="newsfeed.html">Maureen Njanja</a></li>
         <li><img src="images/userpic.gif"/><a href="newsfeed.html">William Omollo</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Catherine Wangui</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Simon Njanja</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Anne Wanjiru</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Lawrence Muema</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Mary Njanja</a></li>
      </ul>
      </div>
  </div>
        
        <!--scripts-->
        <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>'
        <section>
        </section>
    </body>
      <footer class="footer-distributed">

            <div class="footer-left">

                <h3>K254SPORTS<span>logo</span></h3>

                <p class="footer-links">
                    <a href="home.php">Home</a>
                    .
                    <a href="newsfeed.php">Newsfeed</a>
                    .
                    <a href="timeline.php">Timeline</a>
                    .
                    <a href="#">Contact</a>
                    
                </p>

                <p class="footer-company-name">K254SPORTS &copy; 2019</p>
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
                    <p><a href="mailto:support@gmail.com">k25sports@gmail.com</a></p>
                </div>

            </div>

            <div class="footer-right">

                <p class="footer-company-about">
                    <span>About the company</span>
K254SPORTS is an online platform for connecting players and fans in Kenya.
                </p>

                <div class="footer-icons">

                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                    <a href="https://github.com/"><i class="fa fa-github"></i></a>

                </div>

            </div>

        </footer>
</html>
