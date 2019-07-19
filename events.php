<?php
session_start();
if(isset($_SESSION['adminname'])){

    $adminname = $_SESSION['adminname'];
    //$role = $_SESSION['role'];
}else
{
    header('location:admin/adminsign.php');
}

?>
<html>
    <head>
        <title>K-SPORTS</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="shortcut icon" href="images/_ico-2.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

        <script type="text/javascript">
            $(window).on('scroll',function() {
                if($(window).scrollTop()) {
                    $('nav').addClass('black');
                }
                else{
                    $('nav').removeClass('black');
                }
            })

        </script>
        <style>
            table {
                border-collapse: collapse;
                width: 70%;
                align-content: center;
                margin-left: 10%;
               

            }

            th, td {
                text-align: left;
                padding: 8px;
                height: 50px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color:  #dc7633;
                color: white;
            }
               tr td:hover{
                color: #dc7633;
            }
            td a{
                text-decoration: none;
                color: #151515;
                padding: 12px 30px;
                text-transform: uppercase;
                background-color:  #dc7633;
                text-align: center; 
                display: inline-block;
                line-height: 20px;
                text-decoration: none;
                text-transform: uppercase;
                transition: .3x;
                border-radius: 10px;




            }
            a:hover{
                color: white;
            }
        </style>

    </head>
    <body>
        <div class="wrapper">
            <nav>
                <div class="logo">K-SPORTS</div>
                <ul>
                    <li><a href="update.php">Update</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="greport.php">Report</a></li>
                    <li><a  class="active" href="adminlogout.php">Logout</a>

                </ul>
            </nav>
            <section class="sec1"></section>
            <section class="content">


                <?php
                $con=mysqli_connect('localhost', 'root', '','k254sports2')
                    or die("Could not establish connection");

                mysqli_select_db($con,'k254sports2') or
                    die ("Could not select the db");

                $sql="SELECT * FROM event";
                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row

                    echo "<table><tr><th>Event number</th><th>Event</th><th>Location</th><th>Category</th><th>Date</th><th>Begin Time</th><th>Finish Time</th><th>Ticket Price</th><th></th><th></th></tr>";
                    while($row = $result->fetch_assoc()) {


                        echo "<tr>
                         <td>" .$row['Event_id'] ."</td>
                        <td>" .$row['Event_name'] ."</td>
                        <td>" .$row['Location']."</td>
                        <td>".$row['Category'] ."</td>
                        <td>".$row['Date'] ."</td>
                        <td>" .$row['Begin_Time'] ."</td>
                        <td>" .$row['Finish_Time'] ."</td>
                        <td>" .$row['Ticket_Price'] ."</td>

                      
                        <td><a href=\"editupd.php?id=$row[Event_id]\">Update</a></td>


                        </tr>" ;


                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                
                ?>
                <p>Ticket table</p>
                <?php
                $sql1="SELECT * FROM tickets";
                $result = $con->query($sql1);

                if ($result->num_rows > 0) {
                    // output data of each row

                    echo "<table><tr><th>Ticket id</th><th>Event id</th><th>Event</th><th>Location</th><th>Category</th><th>Date</th><th>Ticket Price</th><th></th><th></th></tr>";
                    while($row = $result->fetch_assoc()) {


                        echo "<tr>
                        <td>" .$row['Ticket_id'] ."</td>
                         <td>" .$row['Event_id'] ."</td>
                        <td>" .$row['Event_Name'] ."</td>
                        <td>".$row['Date'] ."</td>
                        <td>" .$row['Ticket_Price'] ."</td>

                        <td><a href=\"delete.php?id=$row[Ticket_id]\">Delete</a></td>
                       


                        </tr>" ;


                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }


                $con->close();

                ?>




            </section>
        </div>
    </body>
    <footer class="footer-distributed">

            <div class="footer-left">

                <h3>K-SPORTS<span>logo</span></h3>

                <p class="footer-links">
                    <a href="homepage.php">Home</a>
                    .
                    <a href="profile.php">Profile</a>
                    .
                    <a href="search.php">Search</a>
                    .
                    <a href="#">Contact</a>
                    
                </p>

                <p class="footer-company-name">K-SPORTS &copy; 2018</p>
            </div>

            <div class="footer-center">

                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Africa Nazarene</span>Rongai, Kajiado</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+254700470627</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@company.com">Tukutane@company.com</a></p>
                </div>

            </div>

            <div class="footer-right">

                <div class="footer-icons">

                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                    <a href="https://github.com/"><i class="fa fa-github"></i></a>

                </div>

            </div>

        </footer>

</html>