<?php 
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','k254sports2');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"k254sports2");
$sql="SELECT * FROM team WHERE type = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<option value=". $row['name'] .">" . $row['name'] . "</option>";
    
}

mysqli_close($con);