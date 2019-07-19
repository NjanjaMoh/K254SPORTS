<?php
session_start();
//include("header.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon" style="geight: 70px; width: 70px">
<title>Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
    height: 100%;
}
    .banner{
        background-image: url(images/k254images/image%209.jpg);
        height: 100%;
    }
/* Style the header */
.header {
  background-color: ;
  padding: -3.5px;
  text-align:center;
    height: 85px;
}
    /* Style the search box inside the navigation bar */
.header input[type=text] {
  float: center;
  padding: 10px;
  border: none;
  margin-top: 2px;
  margin-right: 20px;
  font-size: 17px;
}
    .h1{
        font-weight: 900;
    }

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color:black;
}

/* Style the topnav links */
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


/* create columns*/
nav {
    float:left; 
    width: 20%;
    height: 650px;
    background-color: ;
    border-radius: 2px;
    padding: 20px;
}
section{
    float: left;
    width: 100%;
    height: 650px;
    background-color: ;
    }
    article{
        float:left;
        width: 80%;
        height:650px;
    }
    .img{
        background-image:url(images/Bball.jpg), url(images/netball.jpg), url(images/pic5.jpg);
    }
    .container {
  position: relative;
  max-width: 100%;
  margin: 0 auto;
}
    
.container img {vertical-align: right;}

.container .content {
  position: absolute;
  bottom: 0;
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
  width: 100%;
  padding: 100px;
    }
        
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 10px;
  text-align: center;
  background-color:;
  margin-top: 10px;
    clear: both;
    height; 10px;
}
  .footer-icons{
    margin-top: 25px;
}
.footer-icons a{
    display: inline-block;
    width: 35px;
    height: 35px;
    cursor: pointer;
    background-color:  #33383b;
    border-radius: 2px;

    font-size: 20px;
    color: #ffffff;
    text-align: center;
    line-height: 35px;

    margin-right: 3px;
    margin-bottom: 5px;
}

/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 800px) {

    .footer-distributed{
        font: bold 14px sans-serif;
    }

    .footer-distributed .footer-left,
    .footer-distributed .footer-center,
    .footer-distributed .footer-right{
        display: block;
        width: 100%;
        margin-bottom: 40px;
        text-align: center;
    }

    .footer-distributed .footer-center i{
        margin-left: 0;
    }

}


/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  nav, article {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>
 
<!--banner -->
<div class="banner">
<div class="container">
<img src="images/background.jpg">
<div class="content">
<div class="header">

  <h1 style="color: #3f51b5; text-align: left; margin-top:-20px">K254SPORTS</h1>
   <input type="text" placeholder="Search.." style="width: 400px; height: 30px">
 <ul style="float:right; margin-right: 100px; margin-top: -50px; font-size: 20px;" > <li><a href="signup.php" class="button alt1">Signup</a><br>
     <a href="login.php" class="button alt" >Login</a> </li></ul>
</div>

<div class="topnav">
 <a href="index.php"></a>
  <a href="home.php">Home</a>
  <a href="newsfeed.php">Newsfeed</a>
    <a href="sports.html">Sports</a>
   <a href="chatroom.php">Chatroom</a>
   <a href="sportsgallery.html">Sportsgallery</a>
   <a href="myaccount.php">My Account</a>  
  
</div>


  <section>
    <nav>
      
      <h2>About Us</h2>
      <ul>
         <li><a href="#">About Us</a></li>
            <p>Our Mission</p>
            <p>Terms and onditions</p>
            <p>Policies</p>
          <li><a href="#">Our Services</a></li>
            <p>Yoga Classes</p>
          <p>Booking Events</p>
          <p> Betting links</p>
          <li><a href="#">Our Contacts</a></li>
             <p> Email address:<a href="mailto:support@gmail.com">K254sports@gmail.com</a></p>
             <p> Phone Number:+254700470627</p>
             <p> Location: <a href= " https://www.google.com/maps/@-1.3968888,36.7927115,15z">Ongata Rongai, Kenya</a></p>
             <li><a href="#">Send us Feedback</a> 
                 <textarea rows="4" cols="32">How do you like K254Sports?
             </textarea>
             </li>
      </ul>
      
</nav>
<article>
   <div class="section:after">
   <h4 style = "font-weight: bold"> <p>Welcome to K254SPORTS where all Kenyan sports are made available to you in one platter. </p>
     <p>Are you a player, a sponsor or a fan? There is a spot for everyone one of you. 
     <p>Here you can have conversations about your favorite teams and get latest spicy news in the world of sports.</p></h4>
      </div>
     </article>
     </section>
  <footer>   
<div class="footer">
  <div class="footer-icons">

                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
          
  <h2>Copyright &copy; 2019</h2>
    </div>
</div>
</footer> 
    </div>
    </div>
    </div>
</body>
</html>
