<?php
session_start();
if(isset($_SESSION['admin_name'])){

    $admin_name = $_SESSION['admin_name'];
    //$role = $_SESSION['role'];
}else
{
    header('location:admin/adminsign.php');
}
?>

<html>
    <head>
        <title>K-SPORTS</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        <link rel="shortcut icon" href="css/Images/_ico-2.png" type="image/x-icon">
        </head>
        <body>
            <div class="loginbox">
                <form>
                <img src="images/avatar.png" class="avatar">
              
                   <input type="submit" name="" formaction="events.php" value="View events">
                  <input type="submit" name="" formaction="addevent.php" value="Add events">
                     <input type="submit" name="" formaction="greport.php" value="View reports">
                   
                    
                    
                </form>
            </div>
        </body>
</html>