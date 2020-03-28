<?php
error_reporting(E_ALL ^ E_DEPRECATED);

//echo "<script>alert('".$_GET['mid']."');</script>";


$link = mysqli_connect("localhost", "root", "", "moviesdeneme1");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

session_start();
$username = $_SESSION['username'];
/*echo "<script>alert('".$username."');</script>";*/
for($i=1;;$i++)
{
  if (isset($_POST['submit'.strval($i)])) {
    $mid = $i;
    break;
  }
}

/*echo "<script>alert('".$mid."');</script>";*/

mysqli_query($link," DELETE FROM movie_list WHERE mid = '$mid' and username LIKE '$username' ");

$check = mysqli_query($link, "SELECT * FROM watched_movie_list WHERE username = '$username' and mid = '$mid' ");

$myarr2=array();

while($row = mysqli_fetch_array($check))
{
  array_push($myarr2, $row);
}

if (count($myarr2) != 0) { // add this check.
    echo "<script>alert('That movie is already in your watched movie list');</script>";

    echo"<script>location.assign('sessionMovieList.php')</script>";  // go back to the elcome page
}
else
{
  // insert that movie to movieslist
  mysqli_query($link," INSERT INTO watched_movie_list (username, mid) VALUES ('$username', '$mid')");
}

$_SESSION['mid'] = -1;
echo"<script>location.assign('watched_list.php')</script>";
?>