<?php
session_start();
$con=mysqli_connect('localhost', 'root', '','k254sports2')
    or die("Could not establish connection");

mysqli_select_db($con,'k254sports2') or
    die ("Could not select the db");

if(isset($_POST['username']) && isset($_POST['password'])){
    
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    
   $_SESSION['username']=$username;
   $_SESSION['password']=$password;
    
    
    $sql=mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password= '$password'");
   
    
    $rows = mysqli_num_rows($sql);
   
   
    if($sql && $rows > 0){
        $arr_result = mysqli_fetch_array($sql);
     header ("location:account.php");
        
    }else{
        #echo "Login failed".mysqli_error($con);
        echo '<script> alert ("Login failed");</script>';
        header("Location:login.php");
        
    }
    

}

?>