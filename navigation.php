 <?php
                $user=$_SESSION['email'];
                $getusers=mysqli_query($con,"select * from users where email='$user'");
            
            $row = mysqli_fetch_array($getusers);
                
                $user_id=$row['user_id'];
                $first_name=$row['first_name'];
                $sur_name=$row['sur_name'];
                $team=$row['team'];
                $profile_pic=$row['profile_pic'];
    
             ?>
        <header id="header">
				<div class="inner">
					<a href="home.php" class="logo">K254SPORTS</a>
					<nav id="nav">
                        <?php
                        echo"
                        <a href='user_profile.php?u_id=$user_id'>$first_name</a>";?>
						<a href="home.php">Home</a>
						<a href='newsfeed.php?<?php echo "u_id=$user_id";?>'>News Feed</a>
						<a href='timeline.php?<?php echo "u_id=$user_id";?>'>Timeline</a>
                        
                        <div class="dropdown">
						<img src="images/usericon.png" style="width:40px;height:40px
" />
                        <?php
                            echo"
                        <div class='dropcontent'>
                           
                            <a href='newsfeed.php?u_id=$user_id'>My Posts<span class='badge badge-secondary'> $posts</span></a><br>
                             <a href='editprof.php?u_id=$user_id'>Edit Profile</a><br>
                            <a href='logout.php'>Logout</a>
                            </div>
                    ";
                            ?>
                        </div>
					</nav>
				</div>
			</header>