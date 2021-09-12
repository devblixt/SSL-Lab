<html>
<link rel="stylesheet" href="style.css">
<form action="upload.php" method="POST">
<input type="submit" value="Go to the Previous Page" name="previous" style="height: 50px; font-size: 2em;">
</form>

</html>

<?php 
session_start();
if(!isset($_SESSION["loggedIn"])) header("Location: index.php");
@$upload=$_POST["upload"];
@$delete=$_POST["delete"];
@$album=$_POST["album"];
@$previous=$_POST["previous"];
@$next = $_POST["imgup"];

if($upload){
$count = count($_FILES["myfile"]["name"]);
$valid_types = array("image/jpeg");

if($count > 10){
    echo "<h2>Maximum file upload limit exceeded!</h2> <br>";
}
else{
foreach ($_FILES['myfile']['tmp_name'] as $key => $value) {
    if (!in_array($_FILES['myfile']['type'][$key], $valid_types)){
        echo "<h2>Upload only jpeg files!</h2> <br>";
    }
    $name=$_FILES['myfile']['name'][$key];
    if($_FILES["myfile"]["size"][$key] > 200000){
        echo "<h2>Your file $name has exceeded the file upload limit! (200KB)</h2> <br>";
    }
    else{
    $error = $_FILES["myfile"]["error"][$key];
    if($error > 0)
    {
        die("<h2>Error uploading file! Code $error.</h2> <br>");
    }
    else{
        move_uploaded_file($_FILES['myfile']['tmp_name'][$key],"images/".$_FILES['myfile']['name'][$key]);
        echo "<h2>$name Uploaded Successfully!</h2> <br>";
    }
    }
}}}

if($delete){
    $name = $_POST['DeleteTB'];
    $location = "images/".$name;
    if(file_exists($location)){
        unlink($location);
        echo "<h2>File $name is deleted</h2> <br>";
    }
    else{
        echo "<h2>File $name does not exist</h2> <br>";
    }
}

if($previous){
    header("Location: newupload.php");
}

if($next){
  header("Location: newupload.php");
}

if($album){
    header("Location: album.php");
  }


?>