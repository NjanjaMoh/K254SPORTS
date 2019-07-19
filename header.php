<?php
session_start();

$con=mysqli_connect('localhost', 'root', '','k254sports2')
	or die("Could not establish connection");
	
	mysqli_select_db($con,'k254sports2') or
		die ("Could not select the db");

$user=$_SESSION['email'];
$getuser="SELECT * from users where email='$user'";
$runuser=mysqli_query($con,$getuser);
$row= mysqli_fetch_array($runuser);

$userid=$row['user_id'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$sir_name=$row['sir_name'];
$username=$row['username'];
$email=$row['email'];
$team=$row['team'];
$level=$row['level'];
$number=$row['number'];
$pass=$row['password'];
$dob=$row['dob'];
$gender=$row['gender'];
$profpic=$row['prof_pic'];
$coverpic=$row['cover_pic'];
$description=$row['description'];
$reg_date=$row['user_reg_date'];

$userposts="select * from posts where user_id='$userid'";
$run=mysqli_query($con,$userposts);
$posts=mysqli_num_rows($run);

?>


