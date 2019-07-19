<?php
//session_start();
//if(isset($_SESSION['username']) && isset($_SESSION['password'])){
//   header("location:home.php");
//}
//else{
//    
//}
?>
<html>
    <head>
        <title>K254SPORTS</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <script type="text/javascript" href="js/text.js"></script>
        <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    </head>
    <body >
       <img src="images/banner1.jpg" alt="people" style="width:100%; height: 100% ;background-size: cover;">
        <div class="loginbox" style="top: 40%">
            <h1>Login</h1>
            <form method="POST" action="loginverify.php" >
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter username" required pattern="[a-z]{1,15}"title="Username should only contain lowercase letters. ">
                <p>Password</p>
                <input type="password" name="password" placeholder="Enter password" 
                       required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="pwd1" 
                       onchange="form.pwd2.pattern = RegExp.escape(this.value);" 
                       title="Password should contain Capital letter, small letter and a minimum of six characters"
                       required>
                <input type="submit" name=""  value="Login">
                <a href="forgotpassword.php">Lost your password?</a><br/>
                <a href="signup.php">Dont have an account?</a><br/>

            </form>
        </div>
    </body>
</html>
