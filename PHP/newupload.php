<html>
<link rel="stylesheet" href="style.css">
<h1 style="text-align:center;  color: white; font-size: 4em;">Upload your image !</h1>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<div style="text-align:center; ">
    <input type="file" name="myfile[]" style="height: 50px; font-size: 2em;" multiple><br><br>
    <input type="submit" value="Upload" name="upload" style="height: 50px; font-size: 2em;"><br><br><br><br>
    <input type="submit" value="Delete" name="delete" style="height: 50px; font-size: 2em; background-color:red;">
    <input type="text" name="DeleteTB" id="DeleteTB" style="height: 40px; font-size: 25px;"><br>
    <p style="font-size: 2em;"><b>Only JPEG Format Supported !</b> </p>  <br><br>
    <input type="submit" value="Album" name="album" style="height: 50px; font-size: 2em;"><br>
</div>
</form>
</html>