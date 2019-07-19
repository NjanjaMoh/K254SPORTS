<?php
// when upload button is pressed
/*if(isset($_POST['upload'])){
    //the storage path of uploaded image
    $target="project/" .basename($_FILES['image']['name']);
    //connect to db
    $con=mysqli_connect('localhost', 'root', '','project')
        or die("Could not establish connection");

    $image=$_FILES['image']['name'];
    $sql="INSERT INTO images(image) VALUES ('$image') ";
    mysqli_query($con,$sql);// store the submitted data into table
    

    //moving uploaded data into folder images
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image uploaded successfully"; 
    }else{
        $msg = "There was a problem uploading the image";
    }


}*/

session_start();

$con=mysqli_connect('localhost', 'root', '','project')
    or die("Could not establish connection");

if(isset($_POST{'upload'})){
    $filename= $_FILES['image']['name'];
    $filetmpname = $_FILES['image']['tmp_name'];
    $folder= 'Images';

    move_uploaded_file($filetmpname, $folder.$filename);      

    $sql= "INSERT INTO `images` (`image`) VALUES ('$filename')";

    $query= mysqli_query($con,$sql);
    if($query){
        echo "image is inserted";
    }
}




?>

<html>
    <head>
        <title>Tukutane</title>
        <link rel="shortcut icon" href="css/Images/_ico-2.png" type="image/x-icon">
        <link rel="stylesheet" href="css/upload.css" type="text/css">
    </head>
    <body>
        <div class="content">
            <?php
            $con=mysqli_connect('localhost', 'root', '','project');
            $sql="SELECT * FROM images";
            $result= mysqli_query($con,$sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div id='img_div'>";
                echo "<img src='$filename/".$row['image']."' >";
                echo "</div>";
            }
            ?>
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="image">
                </div>
                <div>
                    <input type="submit" name="upload" value="Upload image">

                </div>
            </form>
        </div>
    </body>
</html>