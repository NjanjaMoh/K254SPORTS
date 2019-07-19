<?php
session_start();

if(!isset($_SESSION['first_name']) && !isset($_SESSION['password'])){
	
 echo "Login first";
    echo header("location:login.php");

}
else{

	//establish connection
	$con=mysqli_connect('localhost', 'root', '','k254sports2')
	or die("Could not establish connection");
	
	mysqli_select_db($con,'k254sports2') or
		die ("Could not select the db");
		
		//create table
	

	//receive form data 
	$first_name=$_POST['first_name'];
	$sir_name=$_POST['sir_name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $pass=$_POST['password'];
	$password=md5($pass);
	
	
	
	//execute query
	$sql="INSERT INTO userprofile(first_name, sir_name, email, number, password) VALUES('$first_name', '$sir_name', '$email', '$number', '$password')";

	if($con->query($sql))
	{
	echo "success";
	header("location:user_profile.php");
}
else{
	echo "<script>alert('error creating account');</script>";
	echo "<script>window.location.assign('signup.php');</script>";

}	
		
	
}
	//close connection
	mysqli_close($con);
	//$con.mysqli_close();
?>