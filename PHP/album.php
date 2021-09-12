<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>


<h2 style="text-align:center; font-size: 80px;  color: white;">Welcome to your Album !</h2>
<h3 style="text-align:center;">
  Check out your gallery !
</h3>
<div class="row">
<?php 
session_start();
if(!isset($_SESSION["loggedIn"])) header("Location: index.php");
$dir = "images/";

if ($opendir = opendir($dir)) 
{
  $slide=0;
    while (($file = readdir($opendir)) !==FALSE)
{
    if ($file!="."&&$file!="..")
    {
      $slide+=1;
      echo "<div class='column'>
    <img src='images/$file' style='width:100%' onclick='openModal();currentSlide($slide)' class='hover-shadow cursor'>
    </div>";
    }
}
} ?>
</div>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

  <?php 
$dir = "images/";

if ($opendir = opendir($dir)) 
{
  $slide = 0;
  $allfiles = glob( $dir ."*" ); 
  
  if( $allfiles ) 
  { 
    $total = count($allfiles); 
  }
    while (($file = readdir($opendir)) !==FALSE)
{
    if ($file!="."&&$file!="..")
    {
      $slide+=1;
      echo "<div class='mySlides'>
      <div class='numbertext'> $slide / $total </div>
      <img src='images/$file' style='width:100%'>
    </div>";
    }
}
} ?>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;<br>PREV</a>
    <a class="next" onclick="plusSlides(1)">&#10095;<br>NEXT</a>
    <?php 
$dir = "images/";

if ($opendir = opendir($dir)) 
{
  $allfiles = glob( $dir ."*" ); 
  
  if( $allfiles ) 
  { 
    $total = count($allfiles); 
  }
  echo "<a class='begin' onclick='currentSlide(1)' style='font-size: 2em; background-color:gray; cursor:pointer;'>FIRST</a>
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
  <a class='end' onclick='currentSlide($total)' style='font-size: 2em; background-color:gray; cursor:pointer;'>LAST</a>";
} ?>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <?php 
$dir = "images/";

if ($opendir = opendir($dir)) 
{
  $slide = 0;
  $allfiles = glob( $dir ."*" ); 
  
  if( $allfiles ) 
  { 
    $total = count($allfiles); 
  }
    while (($file = readdir($opendir)) !==FALSE)
{
    if ($file!="."&&$file!="..")
    {
      $slide+=1;
      echo "<div class='column'>
      <img class='demo cursor' src='images/$file' style='width:100%' onclick='currentSlide($slide)' alt='$file'>
    </div>";
    }
}
} ?>

  </div>
</div>
<br><br>
<form action="upload.php" method="POST">
  <div style="text-align: center; ">
  <br><br><input type="submit" value="Click here to upload images!" name="imgup" style="height: 50px; font-size: 2em;"><br><br>
  </div>
</form>

</body>
</html>
