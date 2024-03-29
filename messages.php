<?php
//session_start();
include("header.php");
include("functions.php");

if(!isset($_SESSION['email'])){
    header("location:home.php");
}

$con=mysqli_connect("localhost","root","","classmates")or
       die("connection not established");
?>
<!doctype html>
<html lang="en">
<head>
<title>Messages</title>
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
    <link rel="stylesheet" href="userprofile.css"/>
    
    </head>
    <style>
        #scroll_messages{
            max-height: 500px;
            overflow: scroll;
        }
        #btn-msg{
            width: 20%;
            height: 28px;
            border-radius: 5px;
            margin: 5px;
            border: none;
            color: #fff;
            float: right;
            background-color: #2ecc71;
        }
        #select_user{
            max-height: 500px;
            overflow: scroll;
        }
        #green{
            background-color: #2ecc71;
            border-color: #27aa60;
            width: 45%;
            padding: 5px;
            font-size: 16px;
            border-radius: 4px;
            float: left;
            margin-bottom: 5px;
            
        }
        #blue{
            background-color: #3498db;
            border-color: #2980b9;
            width: 45%;
            padding: 5px;
            font-size: 16px;
            border-radius: 4px;
            float: right;
            margin-bottom: 5px;
            
        }
    </style>
    <body>
        <!--header-->
        <?php
        include("nav.php");
        ?>
        <div class="row">
        <?php
            if(isset($_GET['u_id'])){
                global $con;
                $get_id=$_GET['u_id'];
                $get_user="select * from users where user_id='$get_id'";
                $run_user=mysqli_query($con,$get_user);
                $row_user=mysqli_fetch_array($run_user);
                $user_to_msg=$row_user['user_id'];
                $user_to_name=$row_user['user_name'];
            }
            $user=$_SESSION['email'];
            $get_user="select * from users where email='$user'";
            $run_user=mysqli_query($con,$get_user);
                $row_user=mysqli_fetch_array($run_user);
             $user_from_msg=$row_user['user_id'];
                $user_from_name=$row_user['user_name'];
            ?>
            <div class="col-sm-3" id="select-user">
            <?php
                $user="select * from users";
                $run_user=mysqli_query($con,$user);
                while($row_user=mysqli_fetch_array($run_user)){
                    $user_id=$row_user['user_id'];
                    $user_name=$row_user['user_name'];
                    $first_name=$row_user['first_name'];
                    $sir_name=$row_user['sir_name'];
                    $user_image=$row_user['profile_pic'];
                    echo"
                    <div class='container-fluid'>
                    <a style='text-decoration:none;cursor:pointer;color:#3897F0;' href='messages.php?u_id=$user_id'>
                    <img class='img-circle' src='cover/$user_image' style='width:90px; height:80px;' title='$user_name'><strong>&nbsp $first_name $sir_name</strong><br><br>
                    </a>
                    </div>                
                    <hr>
                    ";
                }
             ?>
               </div>
            <div class="col-sm-6">
            <div class="load-msg" id="scroll_messages">
                <?php
                $sel_msg="select * from messages where(user_to='$user_to_msg' AND user_from='$user_from_msg') OR (user_from='$user_to_msg' AND user_to='$user_from_msg') ORDER by 1 ASC";
                $run_msg=mysqli_query($con,$sel_msg);
                while($row_msg=mysqli_fetch_array($run_msg)){
                    $user_to=$row_msg['user_to'];
                    $user_from=$row_msg['user_from'];
                    $msg_body=$row_msg['message_body'];
                    $msg_date=$row_msg['date'];
                    ?>
                <div id="loaded_msg">
                <p><?php if($user_to == $user_to_msg AND $user_from ==$user_from_msg){echo"<div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br><br>";}else if($user_from == $user_to_msg AND $user_to == $user_from_msg){echo"<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br><br><br>";}?></p>
                
                </div>
<?php
                }
                ?>
                </div>
            <?php
                if(isset($_GET['u_id'])){
                    $u_id=$_GET['u_id'];
                    if($u_id == "new"){
                        echo"
                        <form>
                        <center><h3>Select someone to start a conversation</h3></center>
                        <textarea disabled class='form-control' placeholder='Enter your message'></textarea>
                        <input type='submit' class='btn btn-default' disabled value='Send'>
                        </form><br><br>
                        
                        
                        ";
                        
                    }
                    else{
                        echo'
                        <form action="" method="POST">
                            <textarea class="form-control" placeholder="Enter your message" name="msg_box" id="message-textarea"></textarea>
                            <input type="submit" name="send_msg" id="btn_msg" value="Send">
                            ';
                    }
                }
                ?>
                <?php 
                if(isset($_POST['send_msg'])){
                    $msg=htmlentities($_POST['msg_box']);
                    if($msg == ""){
                        echo"<h4 style='color:red;text-align:center;'>Message was unable to send!</h4>";
                    }else if(strlen($msg) > 37){
                       echo"<h4 style='color:red;text-align:center;'>Message is too long! Use only 37 characters</h4>";
                    }else{
                        $insert="insert into messages(user_to,user_from,message_body,date,message_seen) values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";
                        $run_insert=mysqli_query($con,$insert);
                        
                    }
                    }
        ?>
            </div>
            <div class="col-sm-3">
            <?php
                if(isset($_GET['u_id'])){
                    global $con;
                    $get_id=$_GET['u_id'];
                    $get_user="select * from users where user_id='$get_id'";
                    $run_user=mysqli_query($con, $get_user);
                    $row=mysqli_fetch_array($run_user);
                    
                    $userid=$row['user_id'];
$username=$row['user_name'];
$first_name=$row['first_name'];
$sir_name=$row['sir_name'];
$school=$row['school'];
$gradyear=$row['gradyear'];
$email=$row['email'];
$number=$row['number'];
$pass=$row['password'];
$dob=$row['dob'];
$gender=$row['gender'];
$country=$row['country'];
$profpic=$row['profile_pic'];
$coverpic=$row['cover_pic'];
$description=$row['description'];
                
                }
                if($get_id == "new"){
                
                }else{
                echo"
                <div class='row'>
                <div class='col-sm-2'>
                    </div>
                <center>
                    <div style='background-color:#e6e6e6;' class='col-sm-9'>
                        <h2>Information about</h2>
                        <img class='img-circle' src='cover/$profpic' style='width:150px;height:150px;'>
                        <br><br>
                        <ul class='list-group'>
                        <li class='list-group-item' title='Username'><strong>$first_name $sir_name</strong></li>
                        <li class='list-group-item' title='User Status'><strong style='color:grey;'>$description</strong></li>
                        <li class='list-group-item' title='School'><strong>$school</strong></li>
                        <li class='list-group-item' title='Graduation Year'><strong>$gradyear</strong></li>
                        <li class='list-group-item' title='Gender'>$gender</li>
                        <li class='list-group-item' title='Country'>$country</li>
                        <li class='list-group-item' title='User Registration Date'>$reg_date</li>
                        </ul>
                    </div>
                    </center>
                    <div class='col-sm-1'></div>
                </div>
                
                
                
                ";
                }
                
                
               ?>
            </div>
         </div>
        
        <script>
        var div=document.getElementById("scroll_messages");
            div.scrollTop=div.scrollHeight;
        </script>
        
         
        
    </body>
</html>
