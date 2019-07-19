<?php
session_start();
//include("header.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" href="logo.jpg" type="image/x-icon" style="geight: 70px; width: 70px">
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
    .hero-image {
  /* Use "linear-gradient" to add a darken background effect to the image  */
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/original.jpg");
  height: 50%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.hero-text {
  text-align: center;
  position: absolute;
  top: 25%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}
}
       .img{
        background-image:url(images/banner.jpg);
    }
    .container {
  position: relative;
  max-width: 100%;
 height: 100%;
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
  padding: 20px;
    } 
  
/* Style the header */
.header {
  background-color: black;
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
           button {
  float: ;
  width: 5%;
  padding: 8px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
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
    background-color: black;
    border-radius: 2px;
    padding: 20px;
    box-sizing: border-box;
    border: 2px solid red;
}
section{
    float: left;
    width: 100%;
    height: 450px;
    background-color: ;
    }
    article{
        float:left;
        width: 80%;
        height:550px;
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
 
<div class="header">

  <h1 style="color: #3f51b5; text-align: left; margin-top:20px; padding: 20px;">K-SPORTS</h1>
</div>

<div class="topnav">
 <a href="index.php"></a>
  <a href="home.php">Home</a>
  <a href="newsfeed.php">Newsfeed</a>
    <a href="sports.html">Sports</a>
   <a href="chatroom.php">Chatroom</a>
   <a href="events.php">Events</a>
   <a href="sportsgallery.html">Sportsgallery</a>
   <a href="myaccount.php">My Account</a> 
   <input type="text" placeholder="Search.." style="width: 150px; height: 35px"><button type="submit"><i class="fa fa-search"></i></button> 
  
</div>

  <section>
   
    <nav style="height: 100%">
      
      <h2 style="color: #3f51b5">K254SPORTS</h2>
      <ul>
         <p><a href="#">About Us</a></p>
            
         <p><a href="sportsgallery.html">Sports Gallery</a></p>
          
          <p><a href="#">Our Contacts</a></p>
             <p style = "font-weight: bold; color:slateblue"> Email address:<a href="mailto:support@gmail.com"> K254sports@gmail.com</a></p>
             <p style = "font-weight: bold; color:slateblue"> Phone Number: +254700470627</p>
             <p style = "font-weight: bold; color:slateblue"> Location: <a href= " https://www.google.com/maps/@-1.3968888,36.7927115,15z"> Ongata Rongai, Kenya
             <i class="fa fa-map-marker"></i></a></p>
      </ul>   
</nav>
<article>
   <div class="section:after">
   <div class="hero-image">
   <img src="images/original.jpg" style="height:450px; width: 1050px">
   <div class="hero-text">
   <h2 style = "font-weight: bold; color:blue"> <p>Welcome to K254SPORTS where all Kenyan sports are made available to you in one platter. </p>
    </h2>
    <p> ...</p>
     <h3 style = "font-weight: bold; color:slateblue"><p>Want to chat with other people?
       <button style="width: 17%" type="submit"><a href="login.php">Login</a></button> OR
         <button style="width: 17%" type="submit"><a href="signup.php">Signup</a></button></p></h3>
      </div>
    </div>
    </div>
     </article>
     </section>
  <footer>   
<div class="footer" style="background-color:black ">
  <div class="footer-icons">

                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
          
  <h2 style="color:slateblue">Copyright &copy; 2019</h2>
    </div>
</div>
</footer> 
    
</body>
</html>
