<?php
    $con=mysqli_connect("localhost","root","","classmates")or
       die("connection not established");

 global $con;
        if(isset($_GET['u_id'])){
             $u_id=$_GET['u_id'];


    $sql = "DELETE FROM posts WHERE post_id = '$u_id'";

    if ($con->query($sql) === TRUE) {
         echo "<script>alert('Successful');</script>";
         echo"<script>window.open('timeline.php?u_id=$u_id', '_self')</script>";
//header("location:timeline.php");
        }
else {
        echo "<script>alert('Error: ');</script>";
             echo"<script>window.open('timeline.php?u_id=$u_id', '_self')</script>";
    }

    $con->close();
        }
?>