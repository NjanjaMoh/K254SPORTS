<?php
include("functions.php");
include("header.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="userprofile.css"/>
    
    <style>
        body{
            overflow-x: hidden;
        }
        #header input[type=text] {
  float: center;
  padding: 10px;
  border: 1px solid black;
  margin-top: 2px;
  margin-right: 20px;
  font-size: 17px;
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
        button {
  float: ;
  width: 5%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}
        .topnav a {
  float: left;
  display: block;
  color: #9c27b0;
  text-align: center;
  padding: 20px 30px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: darkcyan;
  color: deepskyblue;
}
/* Style the "active" element to highlight the current page */
.topnav a.active {
  background-color: #2196F3;
  color: white;
}
    </style>

    </head>
    <body style="overflow:scroll">
        <!--header-->
         <?php
              
             ?>
        <header id="header" style="background-color: silver">
				<div class="inner">
					<h1 style="color: #3f51b5; text-align: left; margin-top:20px">K254SPORTS</h1>
   <input type="text" placeholder="Search.." style="width: 400px; height: 30px margin:auto"> <button type="submit"><i class="fa fa-search"></i></button>
 <ul style="float:right; margin-right: 100px; margin-top: -30px; font-size: 20px;" > <li><a href="signup.php" class="button alt1">Signup</a><br>
     <a href="login.php" class="button alt" >Login</a> </li></ul>
     
					<div class="topnav" style="overflow: hidden; background-color:black;">
                        
						<a href="home.php">Home</a>
						<a href='newsfeed.php?<?php echo "u_id=$user_id";?>'>News Feed</a>
						<a href='timeline.php?<?php echo "u_id=$user_id";?>'>Timeline</a>
                        <a href='sports.html'>Sports</a>
                        <a href='sportsgllery.html'>Sports Gallery</a>
                        <a href='logout.php'>Logout</a>
                        
                        <div class="dropdown">
						<img src="images/usericon.png" style="width:40px;height:40px
" />
                        <?php
                       
                            ?>
                        </div>
                    </div>
				</div>
			</header>
        
        <!--nav-->
       <div id="wrapper">
           <!--middle column-->
    <div id="content">
         
        <div style="border-radius: 50%; float:left; height:110px;width:110px; margin-left:5%;">
<img src="cover/kababy.jpg<?php echo $profile_pic ; ?>" style="border-radius: 50%; float:left; height:110px;width:110px; margin-left:5%; margin-bottom:50%;"/>
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
  <section>
  <div id="navigation">
    <div class="navprof">
        <div class="img">
       
            <img src="cover/<?php echo $prof_pic ; ?>" style="height:90px;width:90px; border-radius:60px; z-index:2; bottom:30px; left:15px; position:relative; border:4px solid white"/>
            <strong><p style="padding-right:70px; float:right; color:white;font-size:18px;font-family: cursive;"><?php echo $first_name;?></strong><br>
            <strong><p style="padding-left:90px;color:white; bottom:40px;font-size:18px;font-family: cursive; "><?php echo "$name";?></p></strong><br><br>
            
        
            </div>
      </div>
      
      
    <ul>
        <!--defined in carol.css-->
        
      <li><img src="images/profile/communication.png"/><a href="user_profile.php">Profile</a></li>
      <li><img src="images/profile/friends.png"><a href="friends.php">Friends</a></li>
        <li><img src="images/profile/people.png"/><a href="people.php">People Nearby</a></li>
      <li><img src="images/profile/chat.png"/><a href='messages.php?<?php echo "u_id=new";?>'>Messages</a></li>
         <li><img src="images/profile/photos.png"/><a href="photos.php">Photos</a></li>
    </ul>
         
  </div>
  <aside>
  <div id="extra">
      <center><h4><strong>Who to Follow</strong></h4></center>
        
      <div>
         
               <ul>
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
        </aside>
        <!--scripts-->
        <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>'
        
        </section>
      <footer style="background-color:; text-align: center ">
                <h3>K254SPORTS<span>logo</span></h3>

                <div>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:support@gmail.com">k254sports@gmail.com</a>
                </div>

         <div class="footer-icons">

                  <p>  <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                      <a href="https://github.com/"><i class="fa fa-github"></i></a></p>

          </div>
        </footer>
    </body>
</html>