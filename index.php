
                                       <?php
if(isset($_SESSION['email'])){
     $user=$_SESSION['email'];
    $con=mysqli_connect('localhost', 'root', '','')
	or die("Could not establish connection");
	
	mysqli_select_db($con,'k254sports2') or
		die ("Could not select the db");
                $getusers=mysqli_query($con,"select * from users where email='$user'");
            
            $row = mysqli_fetch_array($getusers);
                
                $user_id=$row['user_id'];
                $first_name=$row['first_name'];
                $sir_name=$row['sir_name'];
                $team=$row['team'];
                $profile_pic=$row['profile_pic'];
    
       
                        echo"
                        <a href='user_profile.php?u_id=$user_id'>$first_name</a>
						<a href='home.php'>Home</a>
						<a href='newsfeed.php?u_id=$user_id'>News Feed</a>
						<a href='timeline.php?u_id=$user_id'>Timeline</a>
                        <a href='sports.php'>Sports</a>
                        <a href='yogaservice.php'>Yoga & services</a>
                        <a href='sportsgllery.php'>Sports Gallery</a>
                        <a href='logout.php'>Logout</a>
                     ";
                    
}

    else{
    echo"
        <a href='login.php'>Login</a>
        <a href='signup.php'>Sign Up</a>
        
        ";
        }
    

                        ?>
                    