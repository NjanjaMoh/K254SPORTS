<?php
session_start();

 if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
    $email= $_SESSION['email'];
	
 echo "Login first to reserve a flight";;

}
else{

?>
<!doctype html>
<html lang="en">
<head>
<title>News Feed</title>
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
    <link type="text/css" rel="stylesheet" href="timeline.css" />
    </head>
    <body>
       
        <!--header-->
        <header id="header">
				<div class="inner">
					<a href="home.html" class="logo">Classmates</a>
					<nav id="nav">
						<a href="home.php">Home</a>
						<a href="newsfeed.php">News Feed</a>
						<a href="timeline.php">Timeline</a>
                        <a href='sports.php'>Sports</a>
                        <a href='yogaservice.php'>Yoga & services</a>
                        <a href='sportsgllery.php'>Sports Gallery</a>
					</nav>
				</div>
			</header>
        
        <!--cover photo and links-->
        <!--css in carol.css-->
        <div class="coverphoto">
       
</div>
<div class="coverpadx"><img src="/images/banner.jpg" width="850px"/>
</div>



<div class="profilepic">
</div>
<div class="profilepicx"><img src="/images/3friends.jpg" height="140px"/>
</div>
<div class="username">
    <a href="newsfeed.html">Timeline</a>
         <a href="newsfeed.html">About</a>
          <a href="newsfeed.html">Friends</a>
          <a href="newsfeed.html">Photos</a>
</div>

          
          
        <!--nav-->
       <div id="wrapper">
           <!--middle column-->
    <div id="content">
           </div>
            <!-- End Middle Column -->
  </div>
    
        <!--right side-->
  <div id="extra">
    <p><strong>Who To Follow</strong></p>
      <ul>
   <li><img src="images/userpic.gif"/><a href="newsfeed.html">Carol Njanja</a></li>
      <li><img src="images/userpic.gif"/><a href="newsfeed.html">Maureen Njanja</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Catherine Wangui</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Simon Njanja</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Anne Njanja</a></li>
          <li><img src="images/userpic.gif"/><a href="newsfeed.html">Mary Njanja</a></li>
      </ul>
  </div>
  <div id="footer">
    <p>Footer</p>
  </div>
    
        
        <!--scripts-->
        <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
    </body>
</html>
<?php } ?>